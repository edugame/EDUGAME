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
	 * @return FeedbackDAO
	 */
	public static function getFeedbackDAO(){
		return new FeedbackMySqlExtDAO();
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

	/**
	 * @return TurmaDAO
	 */
	public static function getTurmaDAO(){
		return new TurmaMySqlExtDAO();
	}

	/**
	 * @return TurmaDisciplinaDAO
	 */
	public static function getTurmaDisciplinaDAO(){
		return new TurmaDisciplinaMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}

	/**
	 * @return UsuarioDisciplinaDAO
	 */
	public static function getUsuarioDisciplinaDAO(){
		return new UsuarioDisciplinaMySqlExtDAO();
	}

		/**
	 * @return RankingDAO
	 */
	public static function getRankingDAO(){
		return new RankingMySqlExtDAO();
	}


}
?>