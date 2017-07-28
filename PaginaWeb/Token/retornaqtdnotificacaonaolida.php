<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idaluno = $_POST['idaluno'];




$sql = "SELECT count(aluno_idaluno)qtd,(SELECT count(idfeedback) from feedback where idaluno =$idaluno and visualizada <= 0)qtd1 from notificacao_aluno where aluno_idaluno =$idaluno and visualizada <= 0";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 


 if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$retorno = $linha["qtd"].','.$linha["qtd1"];
	}

    echo $retorno;
 }else{
 	echo 0;
 } 


?>