<? defined('SYSPATH') or die('No direct script access.');

/** This file is part of KCFinder project
  *
  *      @desc Path helper class
  *   @package KCFinder
  *   @version 2.51
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

class path {

  /** Get the absolute URL path of the given one. Returns FALSE if the URL
    * is not valid or the current directory cannot be resolved (getcwd())
    * @param string $path
    * @return string */

    static function rel2abs_url($path) {
        if (substr($path, 0, 1) == "/") return $path;
        $dir = @getcwd();

        if (!isset($_SERVER['DOCUMENT_ROOT']) || ($dir === false))
            return false;

        $dir = self::normalize($dir);
        $doc_root = self::normalize($_SERVER['DOCUMENT_ROOT']);

        if (substr($dir, 0, strlen($doc_root)) != $doc_root)
            return false;

        $return = self::normalize(substr($dir, strlen($doc_root)) . "/$path");
        if (substr($return, 0, 1) !== "/")
            $return = "/$return";

        return $return;
    }

  /** Resolve full filesystem path of given URL. Returns FALSE if the URL
    * cannot be resolved
    * @param string $url
    * @return string */

    static function url2fullPath($url) {
        $url = self::normalize($url);

        $uri = isset($_SERVER['SCRIPT_NAME'])
            ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['PHP_SELF'])
            ? $_SERVER['PHP_SELF']
            : false);

        $uri = self::normalize($uri);

        if (substr($url, 0, 1) !== "/") {
            if ($uri === false) return false;
            $url = dirname($uri) . "/$url";
        }

        if (isset($_SERVER['DOCUMENT_ROOT'])) {
            return self::normalize($_SERVER['DOCUMENT_ROOT'] . "/$url");

        } else {
            if ($uri === false) return false;

            if (isset($_SERVER['SCRIPT_FILENAME'])) {
                $scr_filename = self::normalize($_SERVER['SCRIPT_FILENAME']);
                return self::normalize(substr($scr_filename, 0, -strlen($uri)) . "/$url");
            }

            $count = count(explode('/', $uri)) - 1;
            for ($i = 0, $chdir = ""; $i < $count; $i++)
                $chdir .= "../";
            $chdir = self::normalize($chdir);

            $dir = getcwd();
            if (($dir === false) || !@chdir($chdir))
                return false;
            $rdir = getcwd();
            chdir($dir);
            return ($rdir !== false) ? self::normalize($rdir . "/$url") : false;
        }
    }

  /** Normalize the given path. On Windows servers backslash will be replaced
    * with slash. Remobes unnecessary doble slashes and double dots. Removes
    * last slash if it exists. Examples:
    * path::normalize("C:\\any\\path\\") returns "C:/any/path"
    * path::normalize("/your/path/..//home/") returns "/your/home"
    * @param string $path
    * @return string */

    static function normalize($path) {
        if (strtoupper(substr(PHP_OS, 0, 3)) == "WIN") {
            $path = preg_replace('/([^\\\])\\\([^\\\])/', "$1/$2", $path);
            if (substr($path, -1) == "\\") $path = substr($path, 0, -1);
            if (substr($path, 0, 1) == "\\") $path = "/" . substr($path, 1);
        }

        $path = preg_replace('/\/+/s', "/", $path);

        $path = "/$path";
        if (substr($path, -1) != "/")
            $path .= "/";

        $expr = '/\/([^\/]{1}|[^\.\/]{2}|[^\/]{3,})\/\.\.\//s';
        while (preg_match($expr, $path))
            $path = preg_replace($expr, "/", $path);

        $path = substr($path, 0, -1);
        $path = substr($path, 1);
        return $path;
    }

  /** Encode URL Path
    * @param string $path
    * @return string */

    static function urlPathEncode($path) {
        $path = self::normalize($path);
        $encoded = "";
        foreach (explode("/", $path) as $dir)
            $encoded .= rawurlencode($dir) . "/";
        $encoded = substr($encoded, 0, -1);
        return $encoded;
    }

  /** Decode URL Path
    * @param string $path
    * @return string */

    static function urlPathDecode($path) {
        $path = self::normalize($path);
        $decoded = "";
        foreach (explode("/", $path) as $dir)
            $decoded .= rawurldecode($dir) . "/";
        $decoded = substr($decoded, 0, -1);
        return $decoded;
    }
}

/** This file is part of KCFinder project
  *
  *      @desc GD extension class
  *   @package KCFinder
  *   @version 2.51
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

class gd {

  /** GD resource
    * @var resource */
    protected $image;

  /** Image width
    * @var integer */
    protected $width;

  /** Image height
    * @var integer */
    protected $height;

  /** Init error
    * @var bool */
    public $init_error = false;

  /** Last builded image type constant (IMAGETYPE_XXX)
    * @var integer */
    public $type;

  /** Returns an array. Element 0 - GD resource. Element 1 - width. Element 2 - height.
    * Returns FALSE on failure. The only one parameter $image can be an instance of this class,
    * a GD resource, an array(width, height) or path to image file.
    * @param mixed $image
    * @return array */

    protected function build_image($image) {
        if ($image instanceof gd) {
            $width = $image->get_width();
            $height = $image->get_height();
            $image = $image->get_image();

        } elseif (is_resource($image) && (get_resource_type($image) == "gd")) {
            $width = @imagesx($image);
            $height = @imagesy($image);

        } elseif (is_array($image)) {
            list($key, $width) = each($image);
            list($key, $height) = each($image);
            $image = imagecreatetruecolor($width, $height);

        } elseif (false !== (list($width, $height, $type) = @getimagesize($image))) {
            $image =
                ($type == IMAGETYPE_GIF)      ? @imagecreatefromgif($image)  : (
                ($type == IMAGETYPE_WBMP)     ? @imagecreatefromwbmp($image) : (
                ($type == IMAGETYPE_JPEG)     ? @imagecreatefromjpeg($image) : (
                ($type == IMAGETYPE_JPEG2000) ? @imagecreatefromjpeg($image) : (
                ($type == IMAGETYPE_PNG)      ? imagecreatefrompng($image)  : (
                ($type == IMAGETYPE_XBM)      ? @imagecreatefromxbm($image)  : false
            )))));

            if ($type == IMAGETYPE_PNG)
                imagealphablending($image, false);
        }

        $return = (
            is_resource($image) &&
            (get_resource_type($image) == "gd") &&
            isset($width) &&
            isset($height) &&
            (preg_match('/^[1-9][0-9]*$/', $width) !== false) &&
            (preg_match('/^[1-9][0-9]*$/', $height) !== false)
        )
            ? array($image, $width, $height)
            : false;

        if (($return !== false) && isset($type))
            $this->type = $type;

        return $return;
    }

  /** Parameter $image can be:
    *   1. An instance of this class (copy instance).
    *   2. A GD resource.
    *   3. An array with two elements. First - width, second - height. Create a blank image.
    *   4. A filename string. Get image form file.
    * The non-required parameter $bigger_size is the bigger dimension (width or height) the image
    * will be resized to. The other dimension (height or width) will be calculated autamaticaly
    * @param mixed $image
    * @param integer $bigger_size
    * @return gd */

    public function __construct($image, $bigger_size=null) {
        $this->image = $this->width = $this->height = null;

        $image_details = $this->build_image($image);

        if ($image_details !== false)
            list($this->image, $this->width, $this->height) = $image_details;
        else
            $this->init_error = true;

        if (!is_null($this->image) &&
            !is_null($bigger_size) &&
            (preg_match('/^[1-9][0-9]*$/', $bigger_size) !== false)
        ) {
            $image = $this->image;
            list($width, $height) = $this->get_prop_size($bigger_size);
            $this->image = imagecreatetruecolor($width, $height);
            if ($this->type == IMAGETYPE_PNG) {
                imagealphablending($this->image, false);
                imagesavealpha($this->image, true);
            }
            $this->width = $width;
            $this->height = $height;
            $this->imagecopyresampled($image);
        }
    }

  /** Returns the GD resource
    * @return resource */

    public function get_image() {
        return $this->image;
    }

  /** Returns the image width
    * @return integer */

    public function get_width() {
        return $this->width;
    }

  /** Returns the image height
    * @return integer */

    public function get_height() {
        return $this->height;
    }

  /** Returns calculated proportional width from the given height
    * @param integer $resized_height
    * @return integer */

    public function get_prop_width($resized_height) {
        $width = intval(($this->width * $resized_height) / $this->height);
        if (!$width) $width = 1;
        return $width;
    }

  /** Returns calculated proportional height from the given width
    * @param integer $resized_width
    * @return integer */

    public function get_prop_height($resized_width) {
        $height = intval(($this->height * $resized_width) / $this->width);
        if (!$height) $height = 1;
        return $height;
    }

  /** Returns an array with calculated proportional width & height.
    * The parameter $bigger_size is the bigger dimension (width or height) of calculated sizes.
    * The other dimension (height or width) will be calculated autamaticaly
    * @param integer $bigger_size
    * @return array */

    public function get_prop_size($bigger_size) {

        if ($this->width > $this->height) {
            $width = $bigger_size;
            $height = $this->get_prop_height($width);

        } elseif ($this->height > $this->width) {
            $height = $bigger_size;
            $width = $this->get_prop_width($height);

        } else
            $width = $height = $bigger_size;

        return array($width, $height);
    }

  /** Resize image. Returns TRUE on success or FALSE on failure
    * @param integer $width
    * @param integer $height
    * @return bool */

    public function resize($width, $height) {
        if (!$width) $width = 1;
        if (!$height) $height = 1;
        return (
            (false !== ($img = new gd(array($width, $height)))) &&
            $img->imagecopyresampled($this) &&
            (false !== ($this->image = $img->get_image())) &&
            (false !== ($this->width = $img->get_width())) &&
            (false !== ($this->height = $img->get_height()))
        );
    }

  /** Resize the given image source (GD, gd object or image file path) to fit in the own image.
    * The outside ares will be cropped out. Returns TRUE on success or FALSE on failure
    * @param mixed $src
    * @return bool */

    public function resize_crop($src) {
        $image_details = $this->build_image($src);

        if ($image_details !== false) {
            list($src, $src_width, $src_height) = $image_details;

            if (($src_width / $src_height) > ($this->width / $this->height)) {
                $src_w = $this->get_prop_width($src_height);
                $src_h = $src_height;
                $src_x = intval(($src_width - $src_w) / 2);
                $src_y = 0;

            } else {
                $src_w = $src_width;
                $src_h = $this->get_prop_height($src_width);
                $src_x = 0;
                $src_y = intval(($src_height - $src_h) / 2);
            }

            return imagecopyresampled($this->image, $src, 0, 0, $src_x, $src_y, $this->width, $this->height, $src_w, $src_h);

        } else
            return false;
    }

  /** Resize image to fit in given resolution. Returns TRUE on success or FALSE on failure
    * @param integer $width
    * @param integer $height
    * @return bool */

    public function resize_fit($width, $height) {
        if ((!$width && !$height) || (($width == $this->width) && ($height == $this->height)))
            return true;
        if (!$width || (($height / $width) < ($this->height / $this->width)))
            $width = intval(($this->width * $height) / $this->height);
        elseif (!$height || (($width / $height) < ($this->width / $this->height)))
            $height = intval(($this->height * $width) / $this->width);
        if (!$width) $width = 1;
        if (!$height) $height = 1;
        return $this->resize($width, $height);
    }

  /** Neka si predstavim vyobrazhaem pravoygylnik s razmeri $width i $height.
    * Izobrazhenieto shte se preorazmeri taka che to shte izliza ot tozi pravoygylnik,
    * no samo po edno (x ili y) izmerenie
    * @param integer $width
    * @param integer $height
    * @return bool */

    public function resize_overflow($width, $height) {

        $big = (($this->width / $this->height) > ($width / $height))
            ? ($this->width * $height) / $this->height
            : ($this->height * $width) / $this->width;
        $big = intval($big);

        $return = ($img = new gd($this->image, $big));

        if ($return) {
            $this->image = $img->get_image();
            $this->width = $img->get_width();
            $this->height = $img->get_height();
        }

        return $return;
    }

    public function gd_color() {
        $args = func_get_args();

        $expr_rgb = '/^rgb\(\s*(\d{1,3})\s*\,\s*(\d{1,3})\s*\,\s*(\d{1,3})\s*\)$/i';
        $expr_hex1 = '/^\#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i';
        $expr_hex2 = '/^\#?([0-9a-f])([0-9a-f])([0-9a-f])$/i';
        $expr_byte = '/^([01]?\d?\d|2[0-4]\d|25[0-5])$/';

        if (!isset($args[0]))
            return false;

        if (count($args[0]) == 3) {
            list($r, $g, $b) = $args[0];

        } elseif (preg_match($expr_rgb, $args[0])) {
            list($r, $g, $b) = explode(" ", preg_replace($expr_rgb, "$1 $2 $3", $args[0]));

        } elseif (preg_match($expr_hex1, $args[0])) {
            list($r, $g, $b) = explode(" ", preg_replace($expr_hex1, "$1 $2 $3", $args[0]));
            $r = hexdec($r);
            $g = hexdec($g);
            $b = hexdec($b);

        } elseif (preg_match($expr_hex2, $args[0])) {
            list($r, $g, $b) = explode(" ", preg_replace($expr_hex2, "$1$1 $2$2 $3$3", $args[0]));
            $r = hexdec($r);
            $g = hexdec($g);
            $b = hexdec($b);

        } elseif ((count($args) == 3) &&
            preg_match($expr_byte, $args[0]) &&
            preg_match($expr_byte, $args[1]) &&
            preg_match($expr_byte, $args[2])
        ) {
            list($r, $g, $b) = $args;

        } else
            return false;

        return imagecolorallocate($this->image, $r, $g, $b);
    }

    public function fill_color($color) {
        return $this->imagefilledrectangle(0, 0, $this->width - 1, $this->height - 1, $color);
    }


/*   G D   M E T H O D S   */

    public function imagecopy(
        $src,
        $dst_x=0, $dst_y=0,
        $src_x=0, $src_y=0,
        $dst_w=null, $dst_h=null,
        $src_w=null, $src_h=null
    ) {
        $image_details = $this->build_image($src);

        if ($image_details !== false) {
            list($src, $src_width, $src_height) = $image_details;

            if (is_null($dst_w)) $dst_w = $this->width - $dst_x;
            if (is_null($dst_h)) $dst_h = $this->height - $dst_y;
            if (is_null($src_w)) $src_w = $src_width - $src_x;
            if (is_null($src_h)) $src_h = $src_height - $src_y;
            return imagecopy($this->image, $src, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);

        } else
            return false;
    }

    public function imagecopyresampled(
        $src,
        $dst_x=0, $dst_y=0,
        $src_x=0, $src_y=0,
        $dst_w=null, $dst_h=null,
        $src_w=null, $src_h=null
    ) {
        $image_details = $this->build_image($src);

        if ($image_details !== false) {
            list($src, $src_width, $src_height) = $image_details;

            if (is_null($dst_w)) $dst_w = $this->width - $dst_x;
            if (is_null($dst_h)) $dst_h = $this->height - $dst_y;
            if (is_null($src_w)) $src_w = $src_width - $src_x;
            if (is_null($src_h)) $src_h = $src_height - $src_y;
            return imagecopyresampled($this->image, $src, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);

        } else
            return false;
    }

    public function imagefilledrectangle($x1, $y1, $x2, $y2, $color) {
        $color = $this->gd_color($color);
        if ($color === false) return false;
        return imagefilledrectangle($this->image, $x1, $y1, $x2, $y2, $color);
    }

    public function imagepng($filename=null, $quality=null, $filters=null) {
        if (is_null($filename) && !headers_sent())
            header("Content-Type: image/png");
        @imagesavealpha($this->image, true);
        return imagepng($this->image, $filename, $quality, $filters);
    }

    public function imagejpeg($filename=null, $quality=75) {
        if (is_null($filename) && !headers_sent())
            header("Content-Type: image/jpeg");
        return imagejpeg($this->image, $filename, $quality);
    }

    public function imagegif($filename=null) {
        if (is_null($filename) && !headers_sent())
            header("Content-Type: image/gif");
        return imagegif($this->image, $filename);
    }
}



class Utils {
	public static function generateScaled($pathFrom, $modelName, $itemId, $width, $height, $shrinkOnly = false) {
		$dir = APPDIR;
		if(APPDIR != '/') {
			$dir .= '/';
		}
		$pathFrom = str_replace('%20',' ',$pathFrom);
		$gd = new gd(path::url2fullPath($pathFrom));
		
        // Drop files which are not GD handled images
        if ($gd->init_error)
            return true;
            
        $thumb = $itemId.'.jpg';
        $thumb = path::normalize($thumb);
        $thumbDir = path::url2fullPath($dir."media/upload/.scaled/".$modelName."/");
        
        if (!is_dir($thumbDir) && !@mkdir($thumbDir, 0777, true))
            return false;
            
        // Images with smaller resolutions than thumbnails
        
        $w = $width;
        $h = $height;
           
        if($shrinkOnly) {
        	if($w > $gd->get_width()) $w = $gd->get_width();
        	if($h > $gd->get_height()) $h = $gd->get_height();
        }
        
        if (!$gd->resize_fit($w, $h))
            return false;
            
        // Save thumbnail
        return $gd->imagejpeg(path::url2fullPath($dir."media/upload/.scaled/".$modelName."/".$itemId.'.jpg'), 90);
	}
	
	public static function getScaledPath($modelName, $itemId) {
		return URL::base("http").'/media/upload/.scaled/'.$modelName.'/' . $itemId . '.jpg';
	}
}