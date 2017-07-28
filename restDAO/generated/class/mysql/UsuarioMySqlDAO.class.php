<?php
/**
 * Class that operate on table 'usuario'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class UsuarioMySqlDAO implements UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UsuarioMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM usuario ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($idusuario){
		$sql = 'DELETE FROM usuario WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idusuario);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function insert($usuario){
		$sql = 'INSERT INTO usuario (tokenusuario, tipousuario_idtipousuario, cpfusuario, nomeusuario, senha, usuarioativo) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->tokenusuario);
		$sqlQuery->setNumber($usuario->tipousuarioIdtipousuario);
		$sqlQuery->set($usuario->cpfusuario);
		$sqlQuery->set($usuario->nomeusuario);
		$sqlQuery->set($usuario->senha);
		$sqlQuery->setNumber($usuario->usuarioativo);

		$id = $this->executeInsert($sqlQuery);	
		$usuario->idusuario = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioMySql usuario
 	 */
	public function update($usuario){
		$sql = 'UPDATE usuario SET tokenusuario = ?, tipousuario_idtipousuario = ?, cpfusuario = ?, nomeusuario = ?, senha = ?, usuarioativo = ? WHERE idusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($usuario->tokenusuario);
		$sqlQuery->setNumber($usuario->tipousuarioIdtipousuario);
		$sqlQuery->set($usuario->cpfusuario);
		$sqlQuery->set($usuario->nomeusuario);
		$sqlQuery->set($usuario->senha);
		$sqlQuery->setNumber($usuario->usuarioativo);

		$sqlQuery->setNumber($usuario->idusuario);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM usuario';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTokenusuario($value){
		$sql = 'SELECT * FROM usuario WHERE tokenusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTipousuarioIdtipousuario($value){
		$sql = 'SELECT * FROM usuario WHERE tipousuario_idtipousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCpfusuario($value){
		$sql = 'SELECT * FROM usuario WHERE cpfusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByNomeusuario($value){
		$sql = 'SELECT * FROM usuario WHERE nomeusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySenha($value){
		$sql = 'SELECT * FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUsuarioativo($value){
		$sql = 'SELECT * FROM usuario WHERE usuarioativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTokenusuario($value){
		$sql = 'DELETE FROM usuario WHERE tokenusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTipousuarioIdtipousuario($value){
		$sql = 'DELETE FROM usuario WHERE tipousuario_idtipousuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCpfusuario($value){
		$sql = 'DELETE FROM usuario WHERE cpfusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByNomeusuario($value){
		$sql = 'DELETE FROM usuario WHERE nomeusuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySenha($value){
		$sql = 'DELETE FROM usuario WHERE senha = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUsuarioativo($value){
		$sql = 'DELETE FROM usuario WHERE usuarioativo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UsuarioMySql 
	 */
	protected function readRow($row){
		$usuario = new Usuario();
		
		$usuario->idusuario = $row['idusuario'];
		$usuario->tokenusuario = $row['tokenusuario'];
		$usuario->tipousuarioIdtipousuario = $row['tipousuario_idtipousuario'];
		$usuario->cpfusuario = $row['cpfusuario'];
		$usuario->nomeusuario = $row['nomeusuario'];
		$usuario->senha = $row['senha'];
		$usuario->usuarioativo = $row['usuarioativo'];
                $usuario->urlimage= $row['urlimage'];


		return $usuario;
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
	 * @return UsuarioMySql 
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