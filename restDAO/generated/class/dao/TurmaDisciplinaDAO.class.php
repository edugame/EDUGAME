<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface TurmaDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TurmaDisciplina 
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
 	 * @param turmaDisciplina primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function insert($turmaDisciplina);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TurmaDisciplina turmaDisciplina
 	 */
	public function update($turmaDisciplina);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTurmaIdturma($value);

	public function queryByDisciplinaIddisciplina($value);


	public function deleteByTurmaIdturma($value);

	public function deleteByDisciplinaIddisciplina($value);


}
?>