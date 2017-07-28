<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface TipousuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tipousuario 
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
 	 * @param tipousuario primary key
 	 */
	public function delete($idtipousuario);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tipousuario tipousuario
 	 */
	public function insert($tipousuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tipousuario tipousuario
 	 */
	public function update($tipousuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricaousuario($value);


	public function deleteByDescricaousuario($value);


}
?>