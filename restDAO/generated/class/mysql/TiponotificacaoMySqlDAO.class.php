<?php
/**
 * Class that operate on table 'tiponotificacao'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class TiponotificacaoMySqlDAO implements TiponotificacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TiponotificacaoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tiponotificacao WHERE idtiponotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tiponotificacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tiponotificacao ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tiponotificacao primary key
 	 */
	public function delete($idtiponotificacao){
		$sql = 'DELETE FROM tiponotificacao WHERE idtiponotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idtiponotificacao);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TiponotificacaoMySql tiponotificacao
 	 */
	public function insert($tiponotificacao){
		$sql = 'INSERT INTO tiponotificacao (descricaonotificacao) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tiponotificacao->descricaonotificacao);

		$id = $this->executeInsert($sqlQuery);	
		$tiponotificacao->idtiponotificacao = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TiponotificacaoMySql tiponotificacao
 	 */
	public function update($tiponotificacao){
		$sql = 'UPDATE tiponotificacao SET descricaonotificacao = ? WHERE idtiponotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tiponotificacao->descricaonotificacao);

		$sqlQuery->setNumber($tiponotificacao->idtiponotificacao);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tiponotificacao';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricaonotificacao($value){
		$sql = 'SELECT * FROM tiponotificacao WHERE descricaonotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricaonotificacao($value){
		$sql = 'DELETE FROM tiponotificacao WHERE descricaonotificacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TiponotificacaoMySql 
	 */
	protected function readRow($row){
		$tiponotificacao = new Tiponotificacao();
		
		$tiponotificacao->idtiponotificacao = $row['idtiponotificacao'];
		$tiponotificacao->descricaonotificacao = $row['descricaonotificacao'];

		return $tiponotificacao;
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
	 * @return TiponotificacaoMySql 
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