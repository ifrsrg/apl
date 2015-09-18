<?php
class Share {

	public static function bar()
	{
		$html  = '<script type="text/javascript">var switchTo5x=true;</script>
				  <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
				  <script type="text/javascript">stLight.options({publisher: "cc88c68a-48f8-47c4-8876-36c96022bc5d"});</script>';

		$html .= "<ul id=\"shared\">
					  <li class='st_email_large' displayText='Email'></li>
					  <li class='st_facebook_large' displayText='Facebook'></li>
					  <li class='st_twitter_large' displayText='Tweet'></li>
					  <li class='st_pinterest_large' displayText='Pinterest'></li>
					  <li class='st_googleplus_large' displayText='Google +'></li>
				  </ul>";

		return $html;
	}

}