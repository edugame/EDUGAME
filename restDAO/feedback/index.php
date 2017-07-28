<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/load/:id','load');
$app->get('/loadUsuario/:id','loadUsuario');
$app->get('/queryAll/','queryAll');
$app->get('/queryAllOrderBy/:orderColumn','queryAllOrderBy');
$app->post('/insert/','insert');
$app->post('/update/','update');
$app->delete('/delete/:id','delete');

$app->run();

	 /**
	 * LISTA OS DADOS DE ACORDO COM O ID INFORMADO
	 */
        function load($id){
		    
           if(!autenticacao::autenticar()){
                echo json_encode("error");
           }else{
                $notificacao = DAOFactory::getFeedbackDAO()->load($id);
                echo json_encode($notificacao);
       
           }
	}

	 
        function loadUsuario($id){
		    
           if(!autenticacao::autenticar()){
                echo json_encode("error");
           }else{
                $feedback= DAOFactory::getFeedbackDAO()->loadUsuario($id);
                echo json_encode($feedback);
       
           }
	}


	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $notificacao = DAOFactory::getNotificacaoDAO()->queryAll();
	        echo json_encode($notificacao);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $notificacao = DAOFactory::getNotificacaoDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($notificacao);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $notificacao = DAOFactory::getNotificacaoDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $notificacao = json_decode($request->getBody());
                $notificacao = DAOFactory::getNotificacaoDAO()->insert($notificacao);
                echo json_encode($notificacao);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $notificacao = json_decode($request->getBody());
                $notificacao = DAOFactory::getNotificacaoDAO()->update($notificacao);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
