<?php
/**
 * Class that operate on table 'turma_disciplina'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class TurmaDisciplinaMySqlDAO implements TurmaDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TurmaDisciplinaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM turma_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM turma_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM turma_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param turmaDisciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM turma_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TurmaDisciplinaMySql turmaDisciplina
 	 */
	public function insert($turmaDisciplina){
		$sql = 'INSERT INTO turma_disciplina (turma_idturma, disciplina_iddisciplina) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($turmaDisciplina->turmaIdturma);
		$sqlQuery->setNumber($turmaDisciplina->disciplinaIddisciplina);

		$id = $this->executeInsert($sqlQuery);	
		$turmaDisciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TurmaDisciplinaMySql turmaDisciplina
 	 */
	public function update($turmaDisciplina){
		$sql = 'UPDATE turma_disciplina SET turma_idturma = ?, disciplina_iddisciplina = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($turmaDisciplina->turmaIdturma);
		$sqlQuery->setNumber($turmaDisciplina->disciplinaIddisciplina);

		$sqlQuery->setNumber($turmaDisciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM turma_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTurmaIdturma($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE turma_idturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaIddisciplina($value){
		$sql = 'SELECT * FROM turma_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTurmaIdturma($value){
		$sql = 'DELETE FROM turma_disciplina WHERE turma_idturma = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaIddisciplina($value){
		$sql = 'DELETE FROM turma_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TurmaDisciplinaMySql 
	 */
	protected function readRow($row){
		$turmaDisciplina = new TurmaDisciplina();
		
		$turmaDisciplina->id = $row['id'];
		$turmaDisciplina->turmaIdturma = $row['turma_idturma'];
		$turmaDisciplina->disciplinaIddisciplina = $row['disciplina_iddisciplina'];

		return $turmaDisciplina;
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
	 * @return TurmaDisciplinaMySql 
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