<?php
/**
 * Class that operate on table 'projeto'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-13 14:32
 */
class ProjetoMySqlDAO implements ProjetoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProjetoMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM projeto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM projeto';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM projeto ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param projeto primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM projeto WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProjetoMySql projeto
 	 */
	public function insert($projeto){
		$sql = 'INSERT INTO projeto (titulo, data_inicio, data_fim, ehfomento, nota, status, area_codigo) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projeto->titulo);
		$sqlQuery->set($projeto->dataInicio);
		$sqlQuery->set($projeto->dataFim);
		$sqlQuery->set($projeto->ehfomento);
		$sqlQuery->set($projeto->nota);
		$sqlQuery->set($projeto->status);
		$sqlQuery->set($projeto->areaCodigo);

		$id = $this->executeInsert($sqlQuery);	
		$projeto->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProjetoMySql projeto
 	 */
	public function update($projeto){
		$sql = 'UPDATE projeto SET titulo = ?, data_inicio = ?, data_fim = ?, ehfomento = ?, nota = ?, status = ?, area_codigo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($projeto->titulo);
		$sqlQuery->set($projeto->dataInicio);
		$sqlQuery->set($projeto->dataFim);
		$sqlQuery->set($projeto->ehfomento);
		$sqlQuery->set($projeto->nota);
		$sqlQuery->set($projeto->status);
		$sqlQuery->set($projeto->areaCodigo);

		$sqlQuery->setNumber($projeto->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM projeto';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM projeto WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataInicio($value){
		$sql = 'SELECT * FROM projeto WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDataFim($value){
		$sql = 'SELECT * FROM projeto WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEhfomento($value){
		$sql = 'SELECT * FROM projeto WHERE ehfomento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNota($value){
		$sql = 'SELECT * FROM projeto WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByStatus($value){
		$sql = 'SELECT * FROM projeto WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAreaCodigo($value){
		$sql = 'SELECT * FROM projeto WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTitulo($value){
		$sql = 'DELETE FROM projeto WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataInicio($value){
		$sql = 'DELETE FROM projeto WHERE data_inicio = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDataFim($value){
		$sql = 'DELETE FROM projeto WHERE data_fim = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEhfomento($value){
		$sql = 'DELETE FROM projeto WHERE ehfomento = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNota($value){
		$sql = 'DELETE FROM projeto WHERE nota = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByStatus($value){
		$sql = 'DELETE FROM projeto WHERE status = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAreaCodigo($value){
		$sql = 'DELETE FROM projeto WHERE area_codigo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProjetoMySql 
	 */
	protected function readRow($row){
		$projeto = new Projeto();
		
		$projeto->id = $row['id'];
		$projeto->titulo = $row['titulo'];
		$projeto->dataInicio = $row['data_inicio'];
		$projeto->dataFim = $row['data_fim'];
		$projeto->ehfomento = $row['ehfomento'];
		$projeto->nota = $row['nota'];
		$projeto->status = $row['status'];
		$projeto->areaCodigo = $row['area_codigo'];

		return $projeto;
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
	 * @return ProjetoMySql 
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