<?php


include 'Conexao.php';
  
try{


$stmt = $conexao->prepare("UPDATE disciplina SET descricaodisciplina=? WHERE iddisciplina= ?");



$nome= utf8_decode($_POST["nome"]); 
 

$iddisciplina= $_GET['iddisciplina']; 



$stmt -> bindParam(1,$nome);
$stmt -> bindParam(2,$iddisciplina);

$stmt->execute(); 
if($stmt->rowCount() >0){
	echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Alterado&url=registrardisciplinas.php'
</script>";
		
	}else{
	 echo '<script>
			alert("Não foi possivel alterar usuario.");
			location.href="../registrardisciplinas.php"
		</script>';
	}
	
	
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();

}

?>



