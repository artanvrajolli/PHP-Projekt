<?php

// for session
session_start();

class PDOdatabaseconfig{
	private $servername;
	private $username;
	private $password;
	private $databasename;
	private $conn;
	public $error = 0;
	private $errormsg = "";
	public $getException;
	public $errorCode;
	function __construct($servername,$username,$password,$databasename){
		$this->servername = $servername;
		$this->username = $username;
		$this->password = $password;
		$this->databasename = $databasename;
		$this->connect($servername,$username,$password,$databasename);
	}
	function __destruct(){
		$this->conn = null;
	}
	
	function connect($servername,$username,$password,$databasename){
	try {
		$this->conn = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
		// set the PDO error mode to exception
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		$this->error = 1;
		$this->errormsg = $e->getMessage();
		$this->getException = $e;
		$this->errorCode = $e->getCode();
		// getRows(select schema_name from information_schema.schemata where schema_name = 'database_prophp');
	}
	//$this->conn = $conn;
	}


	
	// show error on database
	function getMessage(){
		return $this->errormsg;
	}


	function serverQuery($sql){
		$this->conn = new PDO("mysql:host=$this->servername;",$this->username,$this->password);
		$this->conn->query($sql);
	}
	function QueryFetchArrayAll($sql){
		$stm = $this->conn->query($sql);
		$rows = $stm->fetchAll(PDO::FETCH_ASSOC);
		return $rows;
	}
	function QueryFetchArray($sql){
		$stm = $this->conn->query($sql);
		$rows = $stm->fetch(PDO::FETCH_ASSOC);
		return $rows;
	}
	function executeQuery($sql,$params){
		$stm = $this->conn->prepare($sql);
		if(!is_assoc($params)){
			foreach($params as $param){
				$stm->execute($param);
			}
		}else{
			$stm->execute($params);
		}
	}
	
	function queryFetch($sql,$params){
		$stm = $this->conn->prepare($sql);
		if(!is_assoc($params)){
			foreach($params as $param){
				$stm->execute($param);
			}
		}else{
			$stm->execute($params);
		}
		return $stm->fetch(PDO::FETCH_ASSOC);
	}

	function queryFetchAll($sql,$params){
		$stm = $this->conn->prepare($sql);
		
		if(!is_assoc($params)){
			foreach($params as $param){
				$stm->execute($param);
			}
		}else{
			$stm->execute($params);
		}

		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}


	
	function getRows($sql){
		return $this->conn->query($sql)->rowCount();
	}
	function getRowsWithParma($sql,$params){
		$stm = $this->conn->prepare($sql);
		if(!is_assoc($params)){
			foreach($params as $param){
				$stm->execute($param);
			}
		}else{
			$stm->execute($params);
		}
		return $stm->rowCount();
	}
	
	
}
function is_assoc($arr){
return array_keys($arr) !== range(0, count($arr) - 1);
}



// for main 

include("config/database.php");
if(isset($_SESSION['isonline'])){
	$is_online = 1;
}else{
	$is_online = 0;
}
function load_get_or_post($name,$needtobeonline = 0,$load_header_footer = 1){
	global $msg;
	global $dbpdo;
	global $is_online;
	global $partpage;
	$name = htmlspecialchars($name);
	if($load_header_footer == 1){
	include_once('config/header.php');
	}
	if($needtobeonline == 1 && $is_online == 0){
		header("location: /login");
		exit();
	}else{
		
	if($_SERVER['REQUEST_METHOD'] == "GET"){
        include('views/html/'.$name.'.php');
    }else if($_SERVER['REQUEST_METHOD'] == "POST"){
		include('controllers/'.$name.'.php');
		if($load_header_footer == 1){
		include('views/html/'.$name.'.php');
		}
	}
		
	}
	if($load_header_footer == 1){
	include_once('config/footer.php');
	}
}


function limit_string($string,$limit = 10,$extra = "..."){
	$output = "";
	for($i=0;$i<$limit && $i < strlen($string);$i++){
		$output .= $string[$i];
	}
	if(strlen($string) > $limit){
		$output .= $extra;
	}
	return $output;
}



function BBCode($string){
	$search = array(
		'/(\[b\])(.*?)(\[\/b\])/',
		'/(\[i\])(.*?)(\[\/i\])/',
		'/(\[u\])(.*?)(\[\/u\])/',
		'/(\[ul\])(.*?)(\[\/ul\])/',
		'/(\[li\])(.*?)(\[\/li\])/',
		'/(\[center\])(.*?)(\[\/center\])/',
		'/(\[img\])(.*?)(\[\/img\])/',
		'/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
		'/(\[url\])(.*?)(\[\/url\])/',
		'/(\[color=)(.*?)(\])(.*?)(\[\/color\])/',
		'/(\[size=)(.*?)(\])(.*?)(\[\/size\])/',
		'/\n?(\[table\])(.*?)(\[\/table\])\n?/s',
		'/\n?(\[tr\])(.*?)(\[\/tr\])\n?/s',
		'/\n?(\[td\])(.*?)(\[\/td\])\n?/s',
		'/(\[code\])(.*?)(\[\/code\])/s'
);
$replace = array(
		'<b>$2</b>',
		'<em>$2</em>',
		'<u>$2</u>',
		'<ul>$2</ul>',
		'<li>$2</li>',
		'<center>$2</center>',
		'<img style="max-width: -webkit-fill-available;" src="$2" alt="" />',
		'<a href="$2" target="_blank">$4</a>',
		'<a href="$2" target="_blank">$2</a>',
		'<font color=$2>$4</font>',
		'<span style="font-size: $2px">$4</span>',
		'<table>$2</table>',
		'<tr>$2</tr>',
		'<td>$2</td>',
		'<pre style="background-color: #ddd6d6;">$2</pre>'
);
return (preg_replace($search, $replace, $string));
}

function BBCode_safe($string){
	$search = array(
		'/(\[b\])(.*?)(\[\/b\])/',
		'/(\[i\])(.*?)(\[\/i\])/',
		'/(\[u\])(.*?)(\[\/u\])/',
		'/(\[ul\])(.*?)(\[\/ul\])/',
		'/(\[li\])(.*?)(\[\/li\])/',
		'/(\[center\])(.*?)(\[\/center\])/',
		'/(\[img\])(.*?)(\[\/img\])/',
		'/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
		'/(\[url\])(.*?)(\[\/url\])/',
		'/(\[color=)(.*?)(\])(.*?)(\[\/color\])/',
		'/(\[size=)(.*?)(\])(.*?)(\[\/size\])/',
		'/\n?(\[table\])(.*?)(\[\/table\])\n?/s',
		'/\n?(\[tr\])(.*?)(\[\/tr\])\n?/s',
		'/\n?(\[td\])(.*?)(\[\/td\])\n?/s',
		'/(\[code\])(.*?)(\[\/code\])/s'
);
$replace = array(
		'<b>$2</b>',
		'<em>$2</em>',
		'<u>$2</u>',
		'$2',
		'$2',
		'$2',
		'(IMAGE)',
		'<a href="$2" target="_blank">$4</a>',
		'<a href="$2" target="_blank">$2</a>',
		'$4',
		'$4',
		'$2',
		'$2',
		'$2',
		'(CODE)'
);
return (preg_replace($search, $replace, $string));
}


function random_gen_color(){
	$randomcolors = ["back","red","blue","yellow","green","purple"];
	return $randomcolors[rand(0,count($randomcolors)-1)];
}