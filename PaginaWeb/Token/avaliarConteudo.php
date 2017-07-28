<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$id =  $_POST['id']; 
$retorno =  $_POST['retorno']; 
$idaluno =  $_POST['idaluno']; 
//unlink('bloco1.txt');

$sql="update notificacao_aluno set opiniao='$retorno' where notificacao_idnotificacao='$id' and aluno_idaluno='$idaluno'";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 


$linhas = $stmt->rowCount();




echo $linhas;
?>