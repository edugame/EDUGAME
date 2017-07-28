<?php

include '../generated/include_dao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/load/:id','load');

$app->run();

	 /**
	 * LISTA OS DADOS DE ACORDO COM O ID INFORMADO
	 */
        function load($id){
		    
           
                $fp = fopen('token.txt', 'w');
                fwrite($fp, $id);
                fclose($fp);
       
           }
	

	
        
	 
	
	


	
	
	

?>
