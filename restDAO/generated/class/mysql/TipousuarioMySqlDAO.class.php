<?php
/**
 * Class that operate on table 'tipousuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class TipousuarioMySqlDAO implements TipousuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TipousuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tipousuario WHERE idtipousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tipousuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tipousuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tipousuario primary key
 	 */
	public function delete($idtipousuario){
		$sql = 'DELETE FROM tipousuario WHERE idtipousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idtipousuario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TipousuarioMySql tipousuario
 	 */
	public function insert($tipousuario){
		$sql = 'INSERT INTO tipousuario (descricaousuario) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipousuario->descricaousuario);

		$id = $this->executeInsert($sqlQuery);	
		$tipousuario->idtipousuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TipousuarioMySql tipousuario
 	 */
	public function update($tipousuario){
		$sql = 'UPDATE tipousuario SET descricaousuario = ? WHERE idtipousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tipousuario->descricaousuario);

		$sqlQuery->setNumber($tipousuario->idtipousuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tipousuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricaousuario($value){
		$sql = 'SELECT * FROM tipousuario WHERE descricaousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricaousuario($value){
		$sql = 'DELETE FROM tipousuario WHERE descricaousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TipousuarioMySql 
	 */
	protected function readRow($row){
		$tipousuario = new Tipousuario();
		
		$tipousuario->idtipousuario = $row['idtipousuario'];
		$tipousuario->descricaousuario = $row['descricaousuario'];

		return $tipousuario;
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
	 * @return TipousuarioMySql 
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