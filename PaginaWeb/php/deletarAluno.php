<?php include 'VerificarSession2.php'?>
<?php

	include 'Conexao.php';
$idaluno= $_GET["idaluno"];
$nomealuno= $_GET["nomealuno"];
		try{
		
		
		
		$stmt = $conexao->prepare("delete from aluno_disciplina where aluno_idaluno = ?");

		 	 	   
		
		$stmt -> bindParam(1,$idaluno);    
		$stmt->execute(); 
$stmt = $conexao->prepare("delete from aluno where idaluno = ?");

		 	 	   
		
		$stmt -> bindParam(1,$idaluno);    
		$stmt->execute();
		
	$_SESSION['erromatricula'] = "<b>Aluno ".$nomealuno." Deletado com sucesso!</b>";
		echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Excluído&url=registraralunos.php'
</script>"; 	
			
		
		}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}
		
?>