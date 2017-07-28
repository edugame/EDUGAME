<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');



$app->get('/queryAll/','queryAll');

$app->run();

	
	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $ranking = DAOFactory::getRankingDAO()->queryAll();
	        echo json_encode($ranking);
	    }
        }
	
		
	
	

?>
