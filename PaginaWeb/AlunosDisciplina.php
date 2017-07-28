<?php
header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');

include 'php/Conexao.php';

$id = $_POST['id'];

//unlink('bloco1.txt');
// Abre ou cria o arquivo bloco1.txt
// "a" representa que o arquivo Ã© aberto para ser escrito
$fp = fopen("bloco3.txt", "a");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $id);

// Fecha o arquivo
fclose($fp); 





$sql = "select concat(a.nomealuno, ' - ', t.turnoturma) nomealuno,a.idaluno,t.turnoturma from aluno_disciplina ad, aluno a,aluno_turma at, turma t where a.idaluno= ad.aluno_idaluno and disciplina_iddisciplina = $id and at.aluno_idaluno = a.idaluno and at.turma_idturma = t.idturma and ad.disciplinaativo =1 and a.token is not null order by t.turnoturma desc";
$stmt = $conexao->prepare($sql);
$stmt->execute(); 


if($stmt->rowCount() >0){

	
		

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){

		$idaluno = $linha['idaluno'];
		$nome =  $linha['nomealuno'];

        //$retorno.=" <li class='list-group-item' data-color='success' value='".$linha['token']."'>".$linha['nomealuno']."</li>";	
				
        $retorno.='<li class="list-group-item" value="'.$idaluno.'">'.($nome).'</li>';
	
	

	
		}
		
		}

echo $retorno;



?>