<?php 

/*Conecta com  o MYSQL usando PDO*/
	function db_connect(){
		$PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
		return $PDO;
	}

	/*Cria o hash da senha usando md5 e sha-1*/
	function make_hash($str){
		return sha1(md5($str));
	}

	/*Verifica se o Usuario esta Logado*/
	function isLooggedIn(){
		if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
		{
			return false;
		}
		return true;
	}

 ?>