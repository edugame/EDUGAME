<?php include 'VerificarSession2.php'?>
<?php


include 'Conexao.php';
  
try{
//Verifica se foi preenchido os campos do formulário de alteração	
if(isset($_POST['disciplinas']) and isset($_POST['nome']) and isset($_POST["matricula"]) ){
$nome= utf8_decode($_POST["nome"]); 
$matricula= utf8_decode($_POST["matricula"]); 
$Disciplinas= $_POST["disciplinas"]; 
$idaluno= $_GET['idaluno']; 
//echo "teste".$idaluno;

//Deleta todos os Registros em aluno_disciplina do aluno
$stmt = $conexao->prepare("DELETE FROM aluno_disciplina WHERE aluno_idaluno =?");
$stmt -> bindParam(1,$idaluno);
$stmt->execute(); 

//Update na tabela aluno
$stmt = $conexao->prepare("UPDATE aluno SET nomealuno=?,matricula=? WHERE idaluno= ?");
$stmt -> bindParam(1,$nome);
$stmt -> bindParam(2,$matricula);
$stmt -> bindParam(3,$idaluno);
$stmt->execute(); 




//Registra todas disciplinas selecionadas
for($i=0;$i<count($Disciplinas);$i++){
	
$stmt = $conexao->prepare("insert into aluno_disciplina(aluno_idaluno,disciplina_iddisciplina,disciplinaativo) values (?,?,1)");
$stmt -> bindParam(1,$idaluno);
$stmt -> bindParam(2,$Disciplinas[$i]);

 $stmt->execute();

}

$_SESSION['erromatricula'] = "Aluno ".$nome." alterado com Sucesso!";
		echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Alterado&url=registraralunos.php'
</script>"; 	
		
		
	


}else{
		
	 $_SESSION['erromatricula'] = "Você deve preencher todos os campos e selecionar ao menos uma Disciplina!";
		echo "<script language= 'JavaScript'>
location.href='mensagem.php?msg=Alterado&url=alterarAluno.php'
</script>"; 	
		
		
	}
	
	
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();

}

?>



