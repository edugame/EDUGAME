<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include '../php/Conexao.php';

$idnotificacao = $_POST['idnotificacao'];
$idaluno = $_POST['idaluno'];


$sql = "update notificacao_aluno set visualizada=(visualizada+1) where notificacao_idnotificacao='$idnotificacao' and aluno_idaluno='$idaluno' ";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 
// Escreve "exemplo de escrita" no bloco1.txt


?>