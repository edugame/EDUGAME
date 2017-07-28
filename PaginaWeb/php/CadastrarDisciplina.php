<?php
try{
	include 'Conexao.php';


    $Nome= $_POST["nome"]; 
 
    







	
$stmt = $conexao->prepare("insert into disciplina(descricaodisciplina) values (?)");
	
	

	$stmt -> bindParam(1,$Nome);



	


$stmt->execute(); 



echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Cadastrado&url=registrardisciplinas.php'
</script>";
	


  
	}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
 


} 
	


?>