<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface AlunoDisciplinaDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AlunoDisciplina 
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
 	 * @param alunoDisciplina primary key
 	 */
	public function delete($idalunodisciplina);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AlunoDisciplina alunoDisciplina
 	 */
	public function insert($alunoDisciplina);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AlunoDisciplina alunoDisciplina
 	 */
	public function update($alunoDisciplina);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDisciplinaIddisciplina($value);

	public function queryByAlunoIdaluno($value);

	public function queryByDisciplinaativo($value);


	public function deleteByDisciplinaIddisciplina($value);

	public function deleteByAlunoIdaluno($value);

	public function deleteByDisciplinaativo($value);


}
?>