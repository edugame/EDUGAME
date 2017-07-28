<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface UsuarioDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsuarioDisciplina 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param usuarioDisciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsuarioDisciplina usuarioDisciplina
 	 */
	public function insert($usuarioDisciplina);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsuarioDisciplina usuarioDisciplina
 	 */
	public function update($usuarioDisciplina);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsuarioIdusuario($value);

	public function queryByDisciplinaIddisciplina($value);


	public function deleteByUsuarioIdusuario($value);

	public function deleteByDisciplinaIddisciplina($value);


}
?>