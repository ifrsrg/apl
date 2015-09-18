<?php
/**
 * Mecanismo de Template para PHP5
 * 
 * Mecanismos de Template permitem manter o código HTML em arquivos externos
 * que ficam completamente livres de código PHP. Dessa forma, consegue-se manter 
 * a lógica de programação (PHP) separada da estrutura visual (HTML ou XML, CSS, etc).
 *
 * Se você já é familiar ao uso de mecanismos de template PHP, esta classe inclui 
 * algumas melhorias: automaticamente detecta blocos, mantém uma lista interna das 
 * variáveis que existem, limpa automaticamente blocos "filhos", avisando quando 
 * tentamos chamar blocos ou variáveis que são existem, avisando quando criamos 
 * blocos "mal formados", e outras pequenas ajudas.
 * 
 * @author Rael G.C. (rael.gc@gmail.com)
 * @version 1.4
 */
class Template {

	/**
	 * A hash with template vars and their values.
	 *
	 * @var       array
	 */
	private $varValues = array();
	
	/**
	 * A list of all automatic recognized variables.
	 *
	 * @var       array
	 */
	private $varList = array();
	
	/**
	 * A list of all automatic recognized blocks.
	 *
	 * @var       array
	 */
	private $blockList = array();
	
	/**
	 * A list of all blocks that contains at least a "child" block.
	 *
	 * @var       array
	 */
	private $blockParents = array();
	
	/**
	 * Describes the replace method for blocks. See the constructor 
	 * method for more details.
	 *
	 * @var       boolean
	 */
	private $accurate;
	
	/**
	 * Regular expression to find var and block names. 
	 * Only alfa-numeric chars and the underscore char are allowed.
	 *
	 * @var		string
	 */
	private static $REG_NAME = "([[:alnum:]]|_)+";
	
	/**
	 * Cria um novo template, usando $filename como arquivo principal
	 * 
	 * Quando o parâmetro $accurate é true, a substituição dos blocos no arquivo   
	 * final será perfeitamente fiel ao arquivo original, isto é, todas as tabulações 
	 * serão removidas. Isso vai ter um pequeno prejuízo na performance, que pode variar 
	 * de acordo com a versão do PHP em uso. Mas é útil quando estamos usando tags HTML 
	 * como &lt;pre&gt; ou &lt;code&gt;. Em outros casos, ou melhor, quase sempre, 
	 * nunca se mexe no valor de $accurate.
	 *
	 * @param     string $filename		caminho do arquivo que será lido
	 * @param     booelan $accurate		true para fazer substituição fiel das tabulações
	 */
	public function __construct($filename="", $accurate = false){
		$this->accurate = $accurate;
		if($filename){
			$this->loadfile(".", $filename);
		}
	}
	
	/**
	 * Adiciona o conteúdo do arquivo identificado por $filename na variável de template 
	 * identificada por $varname
	 *
	 * @param     string $varname		uma variável de template existente
	 * @param     string $filename		arquivo a ser carregado
	 */
	public function addFile($varname, $filename){
		if(!in_array($varname, $this->varList)) throw new Exception("addFile: var $varname não existe");
		$this->loadfile($varname, $filename);
	}
	
	/**
	 * Não use este método, ele serve apenas para podemos acessar as variáveis 
	 * de template diretamente.
	 *
	 * @param	string	$varname	template var name
	 * @param	mixed	$value		template var value
	 */
	public function __set($varname, $value){
		if(!in_array($varname, $this->varList)) return false;//throw new Exception("var $varname não existe");
		$this->setValue($varname, $value);
		return $value;
	}
	
	/**
	 * Não use este método, ele serve apenas para podemos acessar as variáveis 
	 * de template diretamente.
	 *
	 * @param	string	$varname	template var name
	 */
	public function __get($varname){
		return $this->getVar($varname);
	}

	/**
	 * Loads a file identified by $filename.
	 * 
	 * The file will be loaded and the file's contents will be assigned as the 
	 * variable's value.
	 * Additionally, this method call Template::recognize() that identifies 
	 * all blocks and variables automatically.
	 *
	 * @param     string $varname		contains the name of a variable to load
	 * @param     string $filename		file name to be loaded
	 * 
	 * @return    void
	 */
	private function loadfile($varname, $filename) {
		if (!file_exists($filename)) throw new Exception("arquivo $filename não existe");
		$file_array = @file($filename);
		$blocks = $this->recognize($file_array, $varname);
		$str = implode("", $file_array);
		if (empty($str)) throw new Exception("arquivo $filename está vazio");
		$this->setValue($varname, $str);
		$this->createBlocks($blocks);
	}
	
	/**
	 * Loads a String identified by $filename.
	 * 
	 * The file will be loaded and the file's contents will be assigned as the 
	 * variable's value.
	 * Additionally, this method call Template::recognize() that identifies 
	 * all blocks and variables automatically.
	 *
	 * @param     string $str		contains the name of a variable to load
	 * 
	 * @return    void
	 */
	public function loadstr($str) {
		$varname = ".";
		$file_array = explode("\n",$str);
		$blocks = $this->recognize($file_array, $varname);
		$str = implode("", $file_array);
		if (empty($str)) throw new Exception("arquivo $filename está vazio");
		$this->setValue($varname, $str);
		$this->createBlocks($blocks);
	}
	
	/**
	 * Identify all blocks and variables automatically and return them.
	 * 
	 * All variables and blocks are already identified at the moment when 
	 * user calls Template::setFile(). This method calls Template::identifyVars() 
	 * and Template::identifyBlocks() methods to do the job.
	 *
	 * @param     array		$file_array		contains all lines from the content file
	 * @param     string	$varname		contains the variable name of the file
	 * 
	 * @return    array		an array where the key is the block name and the value is an 
	 * 						array with the children block names.
	 */
	private function recognize(&$file_array, $varname){
		$blocks = array();
		$queued_blocks = array();
		foreach ($file_array as $line) {
			if (strpos($line, "{")!==false) $this->identifyVars($line);
			if (strpos($line, "<!--")!==false) $this->identifyBlocks($line, $varname, $queued_blocks, $blocks);
		}
		return $blocks;
	}

	/**
	 * Identify all user defined blocks automatically.
	 *
	 * @param     string $line				contains one line of the content file
	 * @param     string $varname			contains the filename variable identifier
	 * @param     string $queued_blocks		contains a list of the current queued blocks
	 * @param     string $blocks			contains a list of all identified blocks in the current file
	 * 
	 * @return    void
	 */
	private function identifyBlocks(&$line, $varname, &$queued_blocks, &$blocks){
		$reg = "/<!--\s*BEGIN\s+(".self::$REG_NAME.")\s*-->/sm";
		preg_match($reg, $line, $m);
		if (1==preg_match($reg, $line, $m)){
			if (0==sizeof($queued_blocks)) $parent = $varname;
			else $parent = end($queued_blocks);
			if (!isset($blocks[$parent])){
				$blocks[$parent] = array();
			}
			$blocks[$parent][] = $m[1];
			$queued_blocks[] = $m[1];
		}
		$reg = "/<!--\s*END\s+(".self::$REG_NAME.")\s*-->/sm";
		if (1==preg_match($reg, $line)) array_pop($queued_blocks);
	}
	
	/**
	 * Identify all user defined vars automatically.
	 *
	 * @param     string $line				contains one line of the content file
	 * @return    void
	 */
	private function identifyVars(&$line){
		$reg = "/{(".self::$REG_NAME.")}/";
		$r = preg_match_all($reg, $line, $m);
		if ($r>0){
			for($i=0; $i<$r; $i++){
				$this->varList[] = $m[1][$i];
			}
		}
	}
	
	/**
	 * Create all identified blocks given by Template::identifyBlocks().
	 *
	 * @param     array $blocks		contains all identified block names
	 * @return    void
	 */
	private function createBlocks(&$blocks){
		$this->blockParents = array_merge($this->blockParents, $blocks);
		foreach($blocks as $parent => $block){
			foreach($block as $chield){
				//if(in_array($chield, $this->blockList)) {throw new Exception("bloco duplicado: $chield");
				$this->blockList[] = $chield;
				$this->setBlock($parent, $chield);
			}
		}
	}
		
	
	/**
	 * A variable $parent may contain a variable block defined by:
	 * &lt;!-- BEGIN $varname --&gt; content &lt;!-- END $varname --&gt;. 
	 * 
	 * This method removes that block from $parent and replaces it with a variable 
	 * reference named $block. The block is inserted into the varValues hash.
	 * Blocks may be nested.
	 *
	 * @param     string $parent	contains the name of the parent variable
	 * @param     string $block		contains the name of the block to be replaced
	 * @return    void
	 */
	private function setBlock($parent, $block) {
		$name = "B_".$block;
		$str = $this->getVar($parent);
		if($this->accurate){
			$str = str_replace("\r\n", "\n", $str);
			$reg = "/\t*<!--\s*BEGIN\s+$block\s+-->\n*(\s*.*?\n?)\t*<!--\s*END\s+$block\s*-->\n?/sm";
		} 
		else $reg = "/<!--\s*BEGIN\s+$block\s+-->\n*(\s*.*?\n?)<!--\s*END\s+$block\s*-->\n?/sm";
		if(1!==preg_match($reg, $str, $m)) throw new Exception("bloco $block está mal formado");
		$this->setValue($block, $m[1]);
		$this->setValue($parent, preg_replace($reg, "{".$name."}", $str));
	}

	/**
	 * Internal setValue() method.
	 *
	 * The main difference between this and Template::__set() method is this 
	 * method cannot be called by the user, and can be called using variables or 
	 * blocks as parameters.
	 *
	 * @param     string $varname		constains a varname
	 * @param     string $value        constains the new value for the variable
	 * @return    void
	 */
	private function setValue($varname, $value) {
		$this->varValues["{".$varname."}"] = $value;
	}
	
	/**
	 * Returns the value of the variable identified by $varname.
	 *
	 * @param     string	$varname	the name of the variable to get the value of
	 * @return    string	the value of the variable passed as argument
	 */
	private function getVar($varname) {
		$varname = "{".$varname."}";
		if (isset($this->varValues[$varname])) return $this->varValues[$varname];
		return "";
	}
	
	/**
	 * Limpa o valor de uma variável
	 * 
 	 * O mesmo que $this->setValue($varname, "");
	 *
	 * @param     string $varname	nome da variável
	 */
	public function clearVar($varname) {
		$this->setValue($varname, "");
	}
	
	/**
	 * Fill in all the variables contained within the variable named
	 * $varname. The resulting value is returned as the function result and the
	 * original value of the variable varname is not changed. The resulting string
	 * is not "finished", that is, the unresolved variable name policy has not been
	 * applied yet.
	 *
	 * @param     string 	$varname      the name of the variable within which variables are to be substituted
	 * @return    string	the value of the variable $varname with all variables substituted.
	 */
	private function subst($varname) {
		return str_replace(array_keys($this->varValues), $this->varValues, $this->getVar($varname));
	}
	
	/**
	 * Clear all child blocks of a given block.
	 *
	 * @param     string $block	a block with chield blocks.
	 */
	private function clearBlocks($block) {
		if (isset($this->blockParents[$block])){
			$chields = $this->blockParents[$block];
			foreach($chields as $chield){
				$this->clearVar("B_".$chield);
			}
		}
	}
	
	/**
	 * Mostra um bloco.
	 * 
	 * Esse método deve ser chamado quando um bloco deve ser mostrado.
	 * Sem isso, o bloco não irá aparecer no conteúdo final.
	 *
	 * Se o parâmetro $append for true, o conteúdo do bloco será 
	 * adicionado ao conteúdo que já existia antes. Ou seja, use true 
	 * quando quiser que o bloco seja duplicado.
	 *
	 * @param     string $block		nome do bloco que deve ser mostrado
	 * @param     boolean $append		true se o conteúdo anterior deve ser mantido (ou seja, para duplicar o bloco)
	 */
	public function parseBlock($block, $append = true){
		//if(!in_array($block, $this->blockList)) throw new Exception("bloco $block não existe");
      if(!in_array($block, $this->blockList)) return false;
		if ($append) $this->setValue("B_".$block, $this->getVar("B_".$block) . $this->subst($block));
		else $this->setValue("B_".$block, $this->subst($block));
		$this->clearBlocks($block);
	}
	
	/**
	* Retorna o conteúdo final, sem mostrá-lo na tela. 
	* Se você quer mostrá-lo na tela, use o método Template::show().
	* 
	* @return    string	
	*/
	public function getContent() {
	   $this->setDefaultMarks();
		return preg_replace("/{".self::$REG_NAME."}/", "", $this->subst("."));
	}
	
	public function setDefaultMarks() {	   
	   /*
	   $v["path_img"] = "pathImg";
	   $v["path_css"] = "pathCss";
	   $v["path_js"] =  "pathJs";      
	   foreach ($v as $mark => $value) {
        $this->setValue($mark, call_user_func($value));
	   }
	   */
	}
	
	public function bind($vMark) {
            foreach ($vMark as $mark => $value) {
                if ($mark[0]!="_") {
                    $this->$mark = $value;   
                }
            }
            
	}
	
	public function setArray($block, $vBlock) {
	   
	   if (is_array($vBlock)) {
   	   foreach ($vBlock as $mask) {
      	   foreach ($mask as $mark => $value) {
      	      $this->$mark = $value;
      	   }
      	   $this->parseBlock($block, true);
   	   }   
	   }
	}
	
	/**
	 * Mostra na tela o conteúdo final.
	 */
	public function show() {
	   marcacoesPadrao($this);
           
		echo $this->getContent();
	}
	
}
?>