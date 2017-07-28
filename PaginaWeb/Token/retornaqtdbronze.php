<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST["id"];




$sql = "SELECT * from atividade";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 
$retorno=0;

 if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$idatividade= $linha["id"];
		$sql1 = "select ( @row_number:=@row_number + 1) AS num, n.notamaxima,n.aluno_idaluno from (select * from (select max(atividade_nota.nota)notamaxima,atividade_nota.aluno_idaluno,atividade.semestre_idsemestre from(SELECT @row_number:=0)as t, atividade_nota, atividade where atividade.id = atividade_nota.atividade_idatividade and atividade_nota.atividade_idatividade = $idatividade and atividade.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1) semestre)) group by atividade_nota.atividade_idatividade, atividade_nota.id order by atividade_nota.nota desc)nota)n order by n.notamaxima desc,n.aluno_idaluno";
		$stmt1 = $conexao->prepare($sql1);
		$stmt1->execute(); 


			if($stmt1->rowCount() >0){
				$resultado1 = $stmt1->fetchAll();

				foreach($resultado1 as $linha1){

					if(($linha1["aluno_idaluno"] == $idaluno)&&($linha1["num"]==3)){
						$retorno = $retorno + 1;	
					
					}
				}
		    }


		
	}

    echo $retorno;
 }else{
 	echo 0;
 } 


?>