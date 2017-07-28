<?php
/**
 * Class that operate on table 'disciplina'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-01-18 14:21
 */
class RankingMySqlDAO implements RankingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return DisciplinaMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM disciplina WHERE iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

        public function loadDisciplinaAluno($id){
		$sql = 'select d.iddisciplina,d.descricaodisciplina,(select count(idnotificacao) from notificacao n, notificacao_aluno nal  where n.iddisciplina = ad.disciplina_iddisciplina and nal.notificacao_idnotificacao = n.idnotificacao and nal.aluno_idaluno = ?)qtd
                from aluno a, disciplina d, aluno_disciplina ad where a.idaluno = ad.aluno_idaluno and d.iddisciplina = ad.disciplina_iddisciplina and a.idaluno = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
                $sqlQuery->setNumber($id);
		return $this->getList($sqlQuery);
	}



	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'select r.* from (select p.num, p.pontos,p.idaluno,p.nomealuno,(select t.turnoturma from aluno_turma at,turma t where at.turma_idturma = t.idturma and at.aluno_idaluno= p.idaluno )turma from (select ( @row_number:=@row_number + 1) AS num, resultado.pontos,resultado.nomealuno,resultado.idaluno,resultado.semestre_idsemestre from (select sum(nota)pontos,aluno.nomealuno,aluno.idaluno,atividade.semestre_idsemestre from atividade_nota, atividade, aluno,(SELECT @row_number:=0)as t where atividade.id = atividade_nota.atividade_idatividade and aluno.idaluno = atividade_nota.aluno_idaluno group by aluno.nomealuno ORDER BY `pontos` desc)as resultado) as p where p.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1)semestre ) ))r order by r.num';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM disciplina ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param disciplina primary key
 	 */
	public function delete($iddisciplina){
		$sql = 'DELETE FROM disciplina WHERE iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($iddisciplina);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisciplinaMySql disciplina
 	 */
	public function insert($disciplina){
		$sql = 'INSERT INTO disciplina (descricaodisciplina) VALUES (?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disciplina->descricaodisciplina);

		$id = $this->executeInsert($sqlQuery);	
		$disciplina->iddisciplina = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisciplinaMySql disciplina
 	 */
	public function update($disciplina){
		$sql = 'UPDATE disciplina SET descricaodisciplina = ? WHERE iddisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($disciplina->descricaodisciplina);

		$sqlQuery->setNumber($disciplina->iddisciplina);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM disciplina';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByDescricaodisciplina($value){
		$sql = 'SELECT * FROM disciplina WHERE descricaodisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByDescricaodisciplina($value){
		$sql = 'DELETE FROM disciplina WHERE descricaodisciplina = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return DisciplinaMySql 
	 */
	protected function readRow($row){
		$ranking = new Ranking();
		
		$ranking->num = $row['num'];
		$ranking->pontos = $row['pontos'];
        $ranking->nomealuno= $row['nomealuno'];
        $ranking->idaluno= $row['idaluno'];
        $ranking->turma= $row['turma'];

		return $ranking;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return DisciplinaMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>	