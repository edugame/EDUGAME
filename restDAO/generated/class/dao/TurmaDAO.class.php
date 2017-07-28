<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface TurmaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Turma 
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
 	 * @param turma primary key
 	 */
	public function delete($idturma);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Turma turma
 	 */
	public function insert($turma);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Turma turma
 	 */
	public function update($turma);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNometurma($value);

	public function queryByTurnoturma($value);


	public function deleteByNometurma($value);

	public function deleteByTurnoturma($value);


}
?>