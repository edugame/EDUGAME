<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface TiponotificacaoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tiponotificacao 
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
 	 * @param tiponotificacao primary key
 	 */
	public function delete($idtiponotificacao);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tiponotificacao tiponotificacao
 	 */
	public function insert($tiponotificacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tiponotificacao tiponotificacao
 	 */
	public function update($tiponotificacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricaonotificacao($value);


	public function deleteByDescricaonotificacao($value);


}
?>