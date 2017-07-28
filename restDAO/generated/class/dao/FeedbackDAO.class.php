<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
interface FeedbackDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Notificacao 
	 */
	public function load($id);

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Notificacao 
	 */
	public function loadUsuario($id);

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
 	 * @param notificacao primary key
 	 */
	public function delete($idnotificacao);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Notificacao notificacao
 	 */
	public function insert($notificacao);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Notificacao notificacao
 	 */
	public function update($notificacao);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUsuarioIdusuario($value);

	public function queryByTiponotificacaoIdtiponotificacao($value);

	public function queryByDescricao($value);

	public function queryByUrlimagem($value);

	public function queryByLinknotificacao($value);

	public function queryByTitulonotificacao($value);


	public function deleteByUsuarioIdusuario($value);

	public function deleteByTiponotificacaoIdtiponotificacao($value);

	public function deleteByDescricao($value);

	public function deleteByUrlimagem($value);

	public function deleteByLinknotificacao($value);

	public function deleteByTitulonotificacao($value);


}
?>