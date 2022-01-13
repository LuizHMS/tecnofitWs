<?php
/**
 * Classe padrão de modelos
 */
class Model extends PDO 
{
	
	function __construct(string $database)
	{
		/*
		* configurar de acordo com os dados do banco
		*/
		$link = "mysql:dbname={$database};host=127.0.0.1;port=3306";
		$user = "root";
		$pass = "";
		parent::__construct($link, $user,$pass);
	}
}