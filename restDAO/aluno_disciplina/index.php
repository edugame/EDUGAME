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
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->load($id);
                echo json_encode($alunoDisciplina);
       
           }
	}

	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->queryAll();
	        echo json_encode($alunoDisciplina);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($alunoDisciplina);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $alunoDisciplina = json_decode($request->getBody());
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->insert($alunoDisciplina);
                echo json_encode($alunoDisciplina);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $alunoDisciplina = json_decode($request->getBody());
                $alunoDisciplina = DAOFactory::getAlunoDisciplinaDAO()->update($alunoDisciplina);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
