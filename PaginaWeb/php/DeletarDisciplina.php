<?php

	include 'Conexao.php';

		try{
		$stmt = $conexao->prepare("delete from disciplina where iddisciplina = ?");

		$iddisciplina= $_GET["iddisciplina"]; 	 	   
		
		$stmt -> bindParam(1,$iddisciplina);    
		$stmt->execute(); 

		
			 echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Excluído&url=registrardisciplinas.php'
</script>";
			

		}catch(PDOException $e){
		echo 'ERROR: ' . $e->getMessage();

		}

		
?>