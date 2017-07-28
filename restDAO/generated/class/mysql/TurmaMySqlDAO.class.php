<?php
/**
 * Class that operate on table 'turma'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class TurmaMySqlDAO implements TurmaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TurmaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM turma WHERE idturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM turma';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM turma ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param turma primary key
 	 */
	public function delete($idturma){
		$sql = 'DELETE FROM turma WHERE idturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idturma);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TurmaMySql turma
 	 */
	public function insert($turma){
		$sql = 'INSERT INTO turma (nometurma, turnoturma) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($turma->nometurma);
		$sqlQuery->set($turma->turnoturma);

		$id = $this->executeInsert($sqlQuery);	
		$turma->idturma = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TurmaMySql turma
 	 */
	public function update($turma){
		$sql = 'UPDATE turma SET nometurma = ?, turnoturma = ? WHERE idturma = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($turma->nometurma);
		$sqlQuery->set($turma->turnoturma);

		$sqlQuery->setNumber($turma->idturma);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM turma';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByNometurma($value){
		$sql = 'SELECT * FROM turma WHERE nometurma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTurnoturma($value){
		$sql = 'SELECT * FROM turma WHERE turnoturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByNometurma($value){
		$sql = 'DELETE FROM turma WHERE nometurma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTurnoturma($value){
		$sql = 'DELETE FROM turma WHERE turnoturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TurmaMySql 
	 */
	protected function readRow($row){
		$turma = new Turma();
		
		$turma->idturma = $row['idturma'];
		$turma->nometurma = $row['nometurma'];
		$turma->turnoturma = $row['turnoturma'];

		return $turma;
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
	 * @return TurmaMySql 
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