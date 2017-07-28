<?php
/**
 * Class that operate on table 'aluno'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class AlunoMySqlDAO implements AlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return AlunoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM aluno WHERE idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM aluno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param aluno primary key
 	 */
	public function delete($idaluno){
		$sql = 'DELETE FROM aluno WHERE idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idaluno);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoMySql aluno
 	 */
	public function insert($aluno){
		$sql = 'INSERT INTO aluno (matricula, token, nomealuno, senha, alunoativo) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aluno->matricula);
		$sqlQuery->set($aluno->token);
		$sqlQuery->set($aluno->nomealuno);
		$sqlQuery->set($aluno->senha);
		$sqlQuery->setNumber($aluno->alunoativo);

		$id = $this->executeInsert($sqlQuery);	
		$aluno->idaluno = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoMySql aluno
 	 */
	public function update($aluno){
		$sql = 'UPDATE aluno SET matricula = ?, token = ?, nomealuno = ?, senha = ?, alunoativo = ? WHERE idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($aluno->matricula);
		$sqlQuery->set($aluno->token);
		$sqlQuery->set($aluno->nomealuno);
		$sqlQuery->set($aluno->senha);
		$sqlQuery->setNumber($aluno->alunoativo);

		$sqlQuery->setNumber($aluno->idaluno);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByMatricula($value){
		$sql = 'SELECT * FROM aluno WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByToken($value){
		$sql = 'SELECT * FROM aluno WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomealuno($value){
		$sql = 'SELECT * FROM aluno WHERE nomealuno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM aluno WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAlunoativo($value){
		$sql = 'SELECT * FROM aluno WHERE alunoativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByMatricula($value){
		$sql = 'DELETE FROM aluno WHERE matricula = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByToken($value){
		$sql = 'DELETE FROM aluno WHERE token = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomealuno($value){
		$sql = 'DELETE FROM aluno WHERE nomealuno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM aluno WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAlunoativo($value){
		$sql = 'DELETE FROM aluno WHERE alunoativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return AlunoMySql 
	 */
	protected function readRow($row){
		$aluno = new Aluno();
		
		$aluno->idaluno = trim($row['idaluno']);
		$aluno->matricula = trim($row['matricula']);
		$aluno->token = trim($row['token']);
		$aluno->nomealuno = ((trim($row['nomealuno'])));
		$aluno->senha = trim($row['senha']);
		$aluno->alunoativo = trim($row['alunoativo']);

		return $aluno;
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
	 * @return AlunoMySql 
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