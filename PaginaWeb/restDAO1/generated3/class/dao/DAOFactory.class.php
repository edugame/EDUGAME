<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return AlunoDAO
	 */
	public static function getAlunoDAO(){
		return new AlunoMySqlExtDAO();
	}

	/**
	 * @return AlunoDisciplinaDAO
	 */
	public static function getAlunoDisciplinaDAO(){
		return new AlunoDisciplinaMySqlExtDAO();
	}

	/**
	 * @return DisciplinaDAO
	 */
	public static function getDisciplinaDAO(){
		return new DisciplinaMySqlExtDAO();
	}

	/**
	 * @return NotificacaoDAO
	 */
	public static function getNotificacaoDAO(){
		return new NotificacaoMySqlExtDAO();
	}

	/**
	 * @return NotificacaoAlunoDAO
	 */
	public static function getNotificacaoAlunoDAO(){
		return new NotificacaoAlunoMySqlExtDAO();
	}

	/**
	 * @return TiponotificacaoDAO
	 */
	public static function getTiponotificacaoDAO(){
		return new TiponotificacaoMySqlExtDAO();
	}

	/**
	 * @return TipousuarioDAO
	 */
	public static function getTipousuarioDAO(){
		return new TipousuarioMySqlExtDAO();
	}


}
?>