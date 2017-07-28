<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST["id"];


$sql = "select p.num, p.pontos,p.nomealuno from (select ( @row_number:=@row_number + 1) AS num, resultado.pontos,resultado.nomealuno,resultado.idaluno,resultado.semestre_idsemestre from (select sum(nota)pontos,aluno.nomealuno,aluno.idaluno,atividade.semestre_idsemestre from atividade_nota, atividade, aluno,(SELECT @row_number:=0)as t where atividade.id = atividade_nota.atividade_idatividade and aluno.idaluno = atividade_nota.aluno_idaluno group by aluno.nomealuno ORDER BY `pontos` desc)as resultado) as p where p.idaluno = $idaluno and p.semestre_idsemestre in (select se.id from semestre se where se.semestre in (select max(semestre.semestre) from (select id, semestre from semestre where ativo =1)semestre ) )
";


$stmt = $conexao->prepare($sql);
$stmt->execute(); 
$retorno=0;

 if($stmt->rowCount() >0){
 $resultado = $stmt->fetchAll();
  	foreach($resultado as $linha){
		$retorno= $linha["num"]."º - ".($linha["pontos"]*1000);

	}


    echo $retorno;
 }else{
 	echo 0;
 } 


?>