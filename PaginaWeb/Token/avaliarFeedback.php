<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$id =  $_POST['id']; 
$retorno =  $_POST['retorno']; 
$idaluno =  $_POST['idaluno']; 
//unlink('bloco1.txt');

$sql = "update feedback set visualizada='$retorno' where idfeedback='$id' and idaluno='$idaluno'";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 


$linhas = $stmt->rowCount();




echo $linhas;
?>