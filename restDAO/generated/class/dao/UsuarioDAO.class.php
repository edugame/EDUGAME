<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuario 
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
 	 * @param usuario primary key
 	 */
	public function delete($idusuario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuario usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuario usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTokenusuario($value);

	public function queryByTipousuarioIdtipousuario($value);

	public function queryByCpfusuario($value);

	public function queryByNomeusuario($value);

	public function queryBySenha($value);

	public function queryByUsuarioativo($value);


	public function deleteByTokenusuario($value);

	public function deleteByTipousuarioIdtipousuario($value);

	public function deleteByCpfusuario($value);

	public function deleteByNomeusuario($value);

	public function deleteBySenha($value);

	public function deleteByUsuarioativo($value);


}
?>