<?php
/**
 * Class that operate on table 'notificacao_aluno'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class NotificacaoAlunoMySqlDAO implements NotificacaoAlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return NotificacaoAlunoMySql 
	 */
	public function load($alunoIdaluno){
		$sql = 'SELECT * FROM notificacao n,notificacao_aluno na WHERE na.notificacao_idnotificacao = n.idnotificacao  AND na.aluno_idaluno = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($alunoIdaluno);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM notificacao_aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM notificacao_aluno ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param notificacaoAluno primary key
 	 */
	public function delete($notificacaoIdnotificacao, $alunoIdaluno){
		$sql = 'DELETE FROM notificacao_aluno WHERE notificacao_idnotificacao = ?  AND aluno_idaluno = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($notificacaoIdnotificacao);
		$sqlQuery->setNumber($alunoIdaluno);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NotificacaoAlunoMySql notificacaoAluno
 	 */
	public function insert($notificacaoAluno){
		$sql = 'INSERT INTO notificacao_aluno (visualizada, notificacao_idnotificacao, aluno_idaluno) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notificacaoAluno->visualizada);

		
		$sqlQuery->setNumber($notificacaoAluno->notificacaoIdnotificacao);

		$sqlQuery->setNumber($notificacaoAluno->alunoIdaluno);

		$this->executeInsert($sqlQuery);	
		//$notificacaoAluno->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param NotificacaoAlunoMySql notificacaoAluno
 	 */
	public function update($notificacaoAluno){
		$sql = 'UPDATE notificacao_aluno SET visualizada = ? WHERE notificacao_idnotificacao = ?  AND aluno_idaluno = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($notificacaoAluno->visualizada);

		
		$sqlQuery->setNumber($notificacaoAluno->notificacaoIdnotificacao);

		$sqlQuery->setNumber($notificacaoAluno->alunoIdaluno);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM notificacao_aluno';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByVisualizada($value){
		$sql = 'SELECT * FROM notificacao_aluno WHERE visualizada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByVisualizada($value){
		$sql = 'DELETE FROM notificacao_aluno WHERE visualizada = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return NotificacaoAlunoMySql 
	 */
	protected function readRow($row){
		$notificacaoAluno = new NotificacaoAluno();
		
		$notificacaoAluno->notificacaoIdnotificacao = $row['notificacao_idnotificacao'];
		$notificacaoAluno->alunoIdaluno = $row['aluno_idaluno'];
		$notificacaoAluno->visualizada = $row['visualizada'];

		return $notificacaoAluno;
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
	 * @return NotificacaoAlunoMySql 
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