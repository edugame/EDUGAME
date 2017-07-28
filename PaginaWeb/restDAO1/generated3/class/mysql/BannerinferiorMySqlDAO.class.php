<?php
/**
 * Class that operate on table 'bannerinferior'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2016-01-11 14:45
 */
class BannerinferiorMySqlDAO implements BannerinferiorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return BannerinferiorMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM bannerinferior WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM bannerinferior';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM bannerinferior ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param bannerinferior primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM bannerinferior WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param BannerinferiorMySql bannerinferior
 	 */
	public function insert($bannerinferior){
		$sql = 'INSERT INTO bannerinferior (imagem, link, datacriacao, datainicial, datafinal) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannerinferior->imagem);
		$sqlQuery->set($bannerinferior->link);
		$sqlQuery->set($bannerinferior->datacriacao);
		$sqlQuery->set($bannerinferior->datainicial);
		$sqlQuery->set($bannerinferior->datafinal);

		$id = $this->executeInsert($sqlQuery);	
		$bannerinferior->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param BannerinferiorMySql bannerinferior
 	 */
	public function update($bannerinferior){
		$sql = 'UPDATE bannerinferior SET imagem = ?, link = ?, datacriacao = ?, datainicial = ?, datafinal = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($bannerinferior->imagem);
		$sqlQuery->set($bannerinferior->link);
		$sqlQuery->set($bannerinferior->datacriacao);
		$sqlQuery->set($bannerinferior->datainicial);
		$sqlQuery->set($bannerinferior->datafinal);

		$sqlQuery->setNumber($bannerinferior->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM bannerinferior';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByImagem($value){
		$sql = 'SELECT * FROM bannerinferior WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLink($value){
		$sql = 'SELECT * FROM bannerinferior WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatacriacao($value){
		$sql = 'SELECT * FROM bannerinferior WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatainicial($value){
		$sql = 'SELECT * FROM bannerinferior WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDatafinal($value){
		$sql = 'SELECT * FROM bannerinferior WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByImagem($value){
		$sql = 'DELETE FROM bannerinferior WHERE imagem = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLink($value){
		$sql = 'DELETE FROM bannerinferior WHERE link = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatacriacao($value){
		$sql = 'DELETE FROM bannerinferior WHERE datacriacao = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatainicial($value){
		$sql = 'DELETE FROM bannerinferior WHERE datainicial = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDatafinal($value){
		$sql = 'DELETE FROM bannerinferior WHERE datafinal = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return BannerinferiorMySql 
	 */
	protected function readRow($row){
		$bannerinferior = new Bannerinferior();
		
		$bannerinferior->id = $row['id'];
		$bannerinferior->imagem = $row['imagem'];
		$bannerinferior->link = $row['link'];
		$bannerinferior->datacriacao = $row['datacriacao'];
		$bannerinferior->datainicial = $row['datainicial'];
		$bannerinferior->datafinal = $row['datafinal'];

		return $bannerinferior;
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
	 * @return BannerinferiorMySql 
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