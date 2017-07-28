<?php

try{


include 'VerificarSession.php';
include 'Conexao.php';
$nota = array();
$nota = $_POST['nota'];
$codigo = $_SESSION['codigoarray'];
$disciplina = $_POST['disciplina'];




$stmt = $conexao->prepare("insert into atividade(nome,data,semestre_idsemestre,idtipoatividade,idusuario)values(?,NOW(),?,?,?)");
$stmt -> bindParam(1,$_SESSION['nomeatividade']);
$stmt -> bindParam(2,$_SESSION['semestre']);
$stmt -> bindParam(3,$_SESSION['tipoatividade']);
$stmt -> bindParam(4,$_SESSION['idusuario']);

$stmt->execute(); 
$ultimoid = $conexao->lastInsertId();


$cont =0;
foreach( $codigo as $v1 ) {

  if(trim($nota[$cont])!=''){
    $stmt = $conexao->prepare("insert into atividade_nota(atividade_idatividade,aluno_idaluno,nota,iddisciplina)values(?,?,?,?)");
    $stmt -> bindParam(1,$ultimoid);
    $stmt -> bindParam(2,$v1);
    $stmt -> bindParam(3,$nota[$cont]);
    $stmt -> bindParam(4,$disciplina);
    $stmt->execute(); 
  }

  $cont++;

}

echo "<script language= 'JavaScript'>
location.href='../mensagem.php?msg=Cadastrado&url=registraratividades.php'
</script>"; 


	

}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
}
?>
