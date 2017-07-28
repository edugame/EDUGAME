<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$matricula = $_POST['login'];
$senha = md5($_POST['senha']);



$sql = "select * from aluno where matricula=:matricula and senha=:senha";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':matricula', $matricula, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
$stmt->execute();



 if($stmt->rowCount() >0){
$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){
		$retorno = $linha["idaluno"];
	}

    echo $retorno;
 }else{
 	echo $sql;
 } 


?>