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
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->load($id);
                echo json_encode($${table_nameMin});
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->queryAll();
	        echo json_encode($${table_nameMin});
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($${table_nameMin});	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $${table_nameMin} = json_decode($request->getBody());
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->insert($${table_nameMin});
                echo json_encode($${table_nameMin});
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $${table_nameMin} = json_decode($request->getBody());
                $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->update($${table_nameMin});
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
