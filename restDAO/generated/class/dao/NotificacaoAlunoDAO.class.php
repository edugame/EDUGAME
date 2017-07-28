<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface NotificacaoAlunoDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NotificacaoAluno 
	 */
	public function load($alunoIdaluno);

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
 	 * @param notificacaoAluno primary key
 	 */
	public function delete($notificacaoIdnotificacao, $alunoIdaluno);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NotificacaoAluno notificacaoAluno
 	 */
	public function insert($notificacaoAluno);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NotificacaoAluno notificacaoAluno
 	 */
	public function update($notificacaoAluno);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByVisualizada($value);


	public function deleteByVisualizada($value);


}
?>