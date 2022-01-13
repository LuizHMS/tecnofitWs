<?php

/*
*Função para carregar os arquivos de todas as classes da pasta app/controllers excluindo o loader(Controller.php);
*/
function load_all_controllers(){
	$files = scandir(__DIR__);

	foreach ($files as $file ) {
		$class_name = pathinfo($file,PATHINFO_FILENAME);
		if ($class_name !== "." && (strtoupper($class_name) !== "CONTROLLER")) {
			load_controller($class_name);
		}
	}
	
}
/*
* Função para carregar uma classe
*/
function load_controller($class_name)
{
	$path_to_file = __DIR__.'/' . $class_name . '.php';

	if (file_exists($path_to_file)) {
		require $path_to_file;
	}
}