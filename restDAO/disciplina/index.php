<?php

include '../generated/include_dao.php';
include '../autenticacao.php';
require '../Slim/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');


$app->get('/load/:id','load');
$app->get('/loadDisciplinaAluno/:id','loadDisciplinaAluno');
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
                $disciplina = DAOFactory::getDisciplinaDAO()->load($id);
                echo json_encode($disciplina);
       
           }
	}

/**
	 * LISTA OS DADOS DE ACORDO COM O ID INFORMADO
	 */
        function loadDisciplinaAluno($id){
		    
           if(!autenticacao::autenticar()){
                echo json_encode("error");
           }else{
                $disciplina = DAOFactory::getDisciplinaDAO()->loadDisciplinaAluno($id);
                echo json_encode($disciplina);
       
           }
	}


	
        /**
	 * LISTA TODOS OS DADOS DA TABELA
	 */
	function queryAll(){
	    if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{	
                $disciplina = DAOFactory::getDisciplinaDAO()->queryAll();
	        echo json_encode($disciplina);
	    }
        }
	
	
	function queryAllOrderBy($orderColumn){
	 
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $disciplina = DAOFactory::getDisciplinaDAO()->queryAllOrderBy($orderColumn);
	        echo json_encode($disciplina);	
            }    
	}
	
	
	function delete($id){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $disciplina = DAOFactory::getDisciplinaDAO()->delete($id);
	        echo utf8_encode("{'registro excluído com sucesso'}");
            }
	}
	
	
	function insert(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $disciplina = json_decode($request->getBody());
                $disciplina = DAOFactory::getDisciplinaDAO()->insert($disciplina);
                echo json_encode($disciplina);
             }
	}
	
	
	function update(){
            if(!autenticacao::autenticar()){
                echo json_encode("error");
            }else{
                $request = \Slim\Slim::getInstance()->request();
                $disciplina = json_decode($request->getBody());
                $disciplina = DAOFactory::getDisciplinaDAO()->update($disciplina);
                echo utf8_encode("{'registro alterado com sucesso'}");	
            }
	}

	
	


	
	
	

?>
