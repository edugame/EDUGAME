<?php
/**
 * Class that operate on table 'aluno_disciplina'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class AlunoDisciplinaMySqlDAO implements AlunoDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AlunoDisciplinaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno_disciplina WHERE idalunodisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM aluno_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM aluno_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param alunoDisciplina primary key
 	 */
	public function delete($idalunodisciplina){
		$sql = 'DELETE FROM aluno_disciplina WHERE idalunodisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idalunodisciplina);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoDisciplinaMySql alunoDisciplina
 	 */
	public function insert($alunoDisciplina){
		$sql = 'INSERT INTO aluno_disciplina (disciplina_iddisciplina, aluno_idaluno, disciplinaativo) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($alunoDisciplina->disciplinaIddisciplina);
		$sqlQuery->setNumber($alunoDisciplina->alunoIdaluno);
		$sqlQuery->setNumber($alunoDisciplina->disciplinaativo);

		$id = $this->executeInsert($sqlQuery);	
		$alunoDisciplina->idalunodisciplina = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoDisciplinaMySql alunoDisciplina
 	 */
	public function update($alunoDisciplina){
		$sql = 'UPDATE aluno_disciplina SET disciplina_iddisciplina = ?, aluno_idaluno = ?, disciplinaativo = ? WHERE idalunodisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($alunoDisciplina->disciplinaIddisciplina);
		$sqlQuery->setNumber($alunoDisciplina->alunoIdaluno);
		$sqlQuery->setNumber($alunoDisciplina->disciplinaativo);

		$sqlQuery->setNumber($alunoDisciplina->idalunodisciplina);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDisciplinaIddisciplina($value){
		$sql = 'SELECT * FROM aluno_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoIdaluno($value){
		$sql = 'SELECT * FROM aluno_disciplina WHERE aluno_idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaativo($value){
		$sql = 'SELECT * FROM aluno_disciplina WHERE disciplinaativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDisciplinaIddisciplina($value){
		$sql = 'DELETE FROM aluno_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoIdaluno($value){
		$sql = 'DELETE FROM aluno_disciplina WHERE aluno_idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaativo($value){
		$sql = 'DELETE FROM aluno_disciplina WHERE disciplinaativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AlunoDisciplinaMySql 
	 */
	protected function readRow($row){
		$alunoDisciplina = new AlunoDisciplina();
		
		$alunoDisciplina->disciplinaIddisciplina = $row['disciplina_iddisciplina'];
		$alunoDisciplina->alunoIdaluno = $row['aluno_idaluno'];
		$alunoDisciplina->idalunodisciplina = $row['idalunodisciplina'];
		$alunoDisciplina->disciplinaativo = $row['disciplinaativo'];

		return $alunoDisciplina;
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
	 * @return AlunoDisciplinaMySql 
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