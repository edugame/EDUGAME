<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/load/:id','load');
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
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->load($id);
                echo json_encode($usuarioDisciplina);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->queryAll();
	        echo json_encode($usuarioDisciplina);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($usuarioDisciplina);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $usuarioDisciplina = json_decode($request->getBody());
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->insert($usuarioDisciplina);
                echo json_encode($usuarioDisciplina);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $usuarioDisciplina = json_decode($request->getBody());
                $usuarioDisciplina = DAOFactory::getUsuarioDisciplinaDAO()->update($usuarioDisciplina);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
