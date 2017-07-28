<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface RankingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Disciplina 
	 */
	public function load($id);

        public function loadDisciplinaAluno($id);

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
 	 * @param disciplina primary key
 	 */
	public function delete($iddisciplina);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function insert($disciplina);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Disciplina disciplina
 	 */
	public function update($disciplina);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByDescricaodisciplina($value);


	public function deleteByDescricaodisciplina($value);


}
?>