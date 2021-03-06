<?php
/**
 * Class that operate on table 'notificacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class NotificacaoMySqlDAO implements NotificacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NotificacaoMySql 
	 */
	public function load($id){
		$sql = 'SELECT n.idnotificacao,n.descricao,n.urlimagem,d.descricaodisciplina, d.iddisciplina,n.titulonotificacao,n.linknotificacao,u.nomereduzido usuario_idusuario, date_format( n.data , "%d/%m/%Y %h:%i %p" )as data,u.urlimage urlusuario,na.visualizada,na.opiniao FROM notificacao n, notificacao_aluno na,usuario u,disciplina d WHERE na.notificacao_idnotificacao = n.idnotificacao AND u.idusuario = n.usuario_idusuario and n.iddisciplina = d.iddisciplina and n.idnotificacao =? and n.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1) semestre)) ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getList($sqlQuery);
	}



        public function loadUsuario($id){
		$sql = 'SELECT n.idnotificacao,n.descricao,n.urlimagem,d.descricaodisciplina,d.iddisciplina,n.titulonotificacao,n.linknotificacao,u.nomereduzido usuario_idusuario, date_format( n.data , "%d/%m/%Y %h:%i %p" )as data,concat(substring(n.data,1,4),substring(n.data,6,2),substring(n.data,9,2)) as data2 ,u.urlimage urlusuario,na.visualizada,na.opiniao FROM notificacao n, notificacao_aluno na,usuario u,disciplina d WHERE na.notificacao_idnotificacao = n.idnotificacao AND u.idusuario = n.usuario_idusuario and n.iddisciplina = d.iddisciplina and na.aluno_idaluno = ? and n.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1) semestre)) order by data2 desc ';
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
		$notificacao = new Notificacao();
		
		$notificacao->idnotificacao = $row['idnotificacao'];
                $notificacao->iddisciplina = $row['iddisciplina'];
                $notificacao->descricaodisciplina= $row['descricaodisciplina'];
		$notificacao->usuarioIdusuario = $row['usuario_idusuario'];
		//$notificacao->tiponotificacaoIdtiponotificacao = $row['tiponotificacao_idtiponotificacao'];
		$notificacao->descricao = $row['descricao'];
		$notificacao->urlimagem = $row['urlimagem'];
		$notificacao->linknotificacao = $row['linknotificacao'];
		$notificacao->titulonotificacao = $row['titulonotificacao'];
                $notificacao->data= $row['data'];
                $notificacao->urlusuario= $row['urlusuario'];
                $notificacao->visualizada= $row['visualizada'];
                 $notificacao->opiniao= $row['opiniao'];


		return $notificacao;
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