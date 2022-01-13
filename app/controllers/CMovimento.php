<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require(__DIR__.'/../models/MMovimento.php');
require(__DIR__.'/../classes/Movimento.php');

/**
 * Classe para ser o Controller dos movimentos
 */
class CMovimento
{
	/*
	* controller para o endpoint:
	* - http://localhost:8888/movimentos[/{nome}]
	* @Return: objeto JSON com os dados dos movimentos {movimento:{nomeMovimento, usuarios:{nome, recorde, posicao}}}
	*/
	public static function buscarMovimento (Request $request, Response $response, $args) {
		try {
			$data = Movimento::buscarRecordesMovimento($args);	
		} catch (Exception $e) {
			$data = array("error"=> $e->getMessage());
		}
		$ret = json_encode($data);
		$response->getBody()->write($ret);
		return $response->withHeader('Content-Type', 'application/json');
		

	}
	
}