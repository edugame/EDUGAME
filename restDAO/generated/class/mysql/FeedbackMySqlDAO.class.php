<?php
/**
 * Class that operate on table 'notificacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class FeedbackMySqlDAO implements FeedbackDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NotificacaoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM notificacao WHERE idnotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}



        public function loadUsuario($id){
		$sql = 'SELECT f.idfeedback,f.descricao,f.urlimagem,f.titulo,f.urlimagem,f.urllink,f.visualizada,a.nomealuno,d.descricaodisciplina nomedisciplina,u.nomereduzido nomeusuario,u.urlimage urlusuario, date_format( f.data , "%d/%m/%Y %h:%i" )as data FROM feedback f, disciplina d,usuario u , aluno a WHERE f.idusuario =  u.idusuario  and f.iddisciplina = d.iddisciplina and f.idaluno = a.idaluno and f.idaluno =? and f.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1) semestre)) order by data desc'; 
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getList($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM notificacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM notificacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param notificacao primary key
 	 */
	public function delete($idnotificacao){
		$sql = 'DELETE FROM notificacao WHERE idnotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idnotificacao);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NotificacaoMySql notificacao
 	 */
	public function insert($notificacao){
		$sql = 'INSERT INTO notificacao (usuario_idusuario, tiponotificacao_idtiponotificacao, descricao, urlimagem, linknotificacao, titulonotificacao) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notificacao->usuarioIdusuario);
		$sqlQuery->setNumber($notificacao->tiponotificacaoIdtiponotificacao);
		$sqlQuery->set($notificacao->descricao);
		$sqlQuery->set($notificacao->urlimagem);
		$sqlQuery->set($notificacao->linknotificacao);
		$sqlQuery->set($notificacao->titulonotificacao);

		$id = $this->executeInsert($sqlQuery);	
		$notificacao->idnotificacao = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NotificacaoMySql notificacao
 	 */
	public function update($notificacao){
		$sql = 'UPDATE notificacao SET usuario_idusuario = ?, tiponotificacao_idtiponotificacao = ?, descricao = ?, urlimagem = ?, linknotificacao = ?, titulonotificacao = ? WHERE idnotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notificacao->usuarioIdusuario);
		$sqlQuery->setNumber($notificacao->tiponotificacaoIdtiponotificacao);
		$sqlQuery->set($notificacao->descricao);
		$sqlQuery->set($notificacao->urlimagem);
		$sqlQuery->set($notificacao->linknotificacao);
		$sqlQuery->set($notificacao->titulonotificacao);

		$sqlQuery->setNumber($notificacao->idnotificacao);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM notificacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsuarioIdusuario($value){
		$sql = 'SELECT * FROM notificacao WHERE usuario_idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTiponotificacaoIdtiponotificacao($value){
		$sql = 'SELECT * FROM notificacao WHERE tiponotificacao_idtiponotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDescricao($value){
		$sql = 'SELECT * FROM notificacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUrlimagem($value){
		$sql = 'SELECT * FROM notificacao WHERE urlimagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLinknotificacao($value){
		$sql = 'SELECT * FROM notificacao WHERE linknotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulonotificacao($value){
		$sql = 'SELECT * FROM notificacao WHERE titulonotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsuarioIdusuario($value){
		$sql = 'DELETE FROM notificacao WHERE usuario_idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTiponotificacaoIdtiponotificacao($value){
		$sql = 'DELETE FROM notificacao WHERE tiponotificacao_idtiponotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDescricao($value){
		$sql = 'DELETE FROM notificacao WHERE descricao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUrlimagem($value){
		$sql = 'DELETE FROM notificacao WHERE urlimagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLinknotificacao($value){
		$sql = 'DELETE FROM notificacao WHERE linknotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulonotificacao($value){
		$sql = 'DELETE FROM notificacao WHERE titulonotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NotificacaoMySql 
	 */
	protected function readRow($row){
		$feedback= new Feedback();
		
		$feedback->idfeedback= $row['idfeedback'];
                $feedback->nomedisicplina= $row['nomedisciplina'];
		$feedback->nomealuno= $row['nomealuno'];
		$feedback->nomeusuario= $row['nomeusuario'];
		$feedback->descricao = $row['descricao'];
		$feedback->urlimagem = $row['urlimagem'];
		$feedback->urllink= $row['urllink'];
		$feedback->titulo= $row['titulo'];
                $feedback->data= $row['data'];
                $feedback->visualizada= $row['visualizada'];
                $feedback->urlusuario= $row['urlusuario'];

		return $feedback;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return NotificacaoMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>