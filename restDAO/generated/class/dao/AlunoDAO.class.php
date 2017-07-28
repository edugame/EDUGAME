<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface AlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Aluno 
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
 	 * @param aluno primary key
 	 */
	public function delete($idaluno);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Aluno aluno
 	 */
	public function insert($aluno);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Aluno aluno
 	 */
	public function update($aluno);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByMatricula($value);

	public function queryByToken($value);

	public function queryByNomealuno($value);

	public function queryBySenha($value);

	public function queryByAlunoativo($value);


	public function deleteByMatricula($value);

	public function deleteByToken($value);

	public function deleteByNomealuno($value);

	public function deleteBySenha($value);

	public function deleteByAlunoativo($value);


}
?>