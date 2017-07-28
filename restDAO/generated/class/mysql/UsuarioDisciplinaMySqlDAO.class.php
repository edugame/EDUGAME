<?php
/**
 * Class that operate on table 'usuario_disciplina'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class UsuarioDisciplinaMySqlDAO implements UsuarioDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioDisciplinaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario_disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuarioDisciplina primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM usuario_disciplina WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioDisciplinaMySql usuarioDisciplina
 	 */
	public function insert($usuarioDisciplina){
		$sql = 'INSERT INTO usuario_disciplina (usuario_idusuario, disciplina_iddisciplina) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuarioDisciplina->usuarioIdusuario);
		$sqlQuery->setNumber($usuarioDisciplina->disciplinaIddisciplina);

		$id = $this->executeInsert($sqlQuery);	
		$usuarioDisciplina->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioDisciplinaMySql usuarioDisciplina
 	 */
	public function update($usuarioDisciplina){
		$sql = 'UPDATE usuario_disciplina SET usuario_idusuario = ?, disciplina_iddisciplina = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($usuarioDisciplina->usuarioIdusuario);
		$sqlQuery->setNumber($usuarioDisciplina->disciplinaIddisciplina);

		$sqlQuery->setNumber($usuarioDisciplina->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario_disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUsuarioIdusuario($value){
		$sql = 'SELECT * FROM usuario_disciplina WHERE usuario_idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDisciplinaIddisciplina($value){
		$sql = 'SELECT * FROM usuario_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUsuarioIdusuario($value){
		$sql = 'DELETE FROM usuario_disciplina WHERE usuario_idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDisciplinaIddisciplina($value){
		$sql = 'DELETE FROM usuario_disciplina WHERE disciplina_iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioDisciplinaMySql 
	 */
	protected function readRow($row){
		$usuarioDisciplina = new UsuarioDisciplina();
		
		$usuarioDisciplina->id = $row['id'];
		$usuarioDisciplina->usuarioIdusuario = $row['usuario_idusuario'];
		$usuarioDisciplina->disciplinaIddisciplina = $row['disciplina_iddisciplina'];

		return $usuarioDisciplina;
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
	 * @return UsuarioDisciplinaMySql 
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