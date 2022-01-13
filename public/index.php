<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


require __DIR__ . '/../vendor/autoload.php';

require __DIR__.'/../app/controllers/Controller.php';

//Carrega as classes de controller
load_all_controllers();

$app = AppFactory::create();

//Definindo a Rota do APP

//rota para a funcao de buscar Movimento
//endpoint http://localhost:8888/movimentos ou http://localhost:8888/movimentos/NOME_MOVIMENTO
$app->get('/movimentos[/{nome}]',CMovimento::class.':buscarMovimento');

$app->run();