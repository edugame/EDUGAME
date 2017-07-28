<html lang="pt">
 
<head>
<?php include 'php/VerificarSession.php'?>

<link href="css/listar.css" rel="stylesheet" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />



</head>
 
 <body>
 <div class="wrapper">
    <div class="sidebar" data-color="green" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <?php include 'menu.php'?>

    <div class="main-panel">
       <?php include 'menusuperior.php';?>

<!--CONTEUDO AQUI -->
        
<div class="container">
    <div class="row">
    
    <p></p>
   
    <p> </p><p> </p>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista de Alunos </h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    
                  </div>
                </div>
              </div>
 
 <?php
 
  $Disciplina = $_POST['disciplina'];
  $IdUsuario = $_SESSION['idusuario'];
  $codigos = json_decode($_POST['codigo']);
  $codalunonotificacao = $codigos;
  $title = $_POST["title"];
  $message = $_POST["message"]; 
  $imagemUrl = $_POST["imagemurl"];
  $urlPush = $_POST["url"];
 

$fp = fopen("bloco4.txt", "a");
$consultaToken =" ";
//navega pelos elementos do array, imprimindo cada empregado
for($i = 0; $i < count($codigos); $i++) {
        
        if($i == count($codigos)-1){
           $consultaToken.=$codigos[$i]->id;

        } else{
           $consultaToken.=$codigos[$i]->id.",";
        }
    }
  $escreve = fwrite($fp, $consultaToken);  
    
//echo "1";


// Escreve "exemplo de escrita" no bloco1.txt

// Fecha o arquivo
fclose($fp); 


$TipoNotificacao = 2;//$_POST['tiponotificacao'];
include 'php/Conexao.php'; 
$stmt = $conexao->prepare("SELECT aluno.token, aluno.nomealuno, aluno.matricula FROM aluno WHERE aluno.idaluno in ($consultaToken) AND aluno.alunoativo != 0 AND aluno.token is not null");
$DevicesX = "";

$stmt->bindValue(1,$Disciplina);
        


        $stmt->execute();
//echo "2";
        if($stmt->rowCount() >0){

        ?><div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="hidden-xs">Matricula</th>
                        
                        
                        
                    </tr> 
                  </thead><?php

                $resultado = $stmt->fetchAll();
                $contador = 1;

                foreach($resultado as $linha){

                    if($contador ==1){
                        $DevicesX = $linha["token"]  ;
                    }else if($contador >1){
                        $DevicesX = $linha["token"] .",". $DevicesX  ;
                    }
?>
                    <tbody>
                          <tr>
                            
                            <td class="hidden-xs"><?php echo ($linha["nomealuno"]); ?></td>
                            <td><?php echo $linha["matricula"]; ?></td>
                            
                          </tr>
                        </tbody>
                        <?php
                        
                    $contador++;

                 }
        
        }
//echo "3";
class GCMPushMessage {
    var $url = 'https://android.googleapis.com/gcm/send';
    var $serverApiKey = "";
    var $devices = array();
    
    function GCMPushMessage($apiKeyIn){
        $this->serverApiKey = $apiKeyIn;
    }
    function setDevices($deviceIds){
    
        if(is_array($deviceIds)){
            $this->devices = $deviceIds;
        } else {
            $this->devices = array($deviceIds);
        }
    
    }
    function send($message, $data = false){
        
        if(!is_array($this->devices) || count($this->devices) == 0){
            $this->error("No devices set");
        }
        
        if(strlen($this->serverApiKey) < 8){
            $this->error("Server API Key not set");
        }
        
        $fields = array(
            'registration_ids'  => $this->devices,
            'data'              => array( "message" => $message ),
        );
        
        if(is_array($data)){
            foreach ($data as $key => $value) {
                $fields['data'][$key] = $value;
            }
        }
        $headers = array( 
            'Authorization: key=' . $this->serverApiKey,
            'Content-Type: application/json'
        );

        //echo json_encode( $fields );
        $ch = curl_init();
        
        curl_setopt( $ch, CURLOPT_URL, $this->url );
        
        curl_setopt( $ch, CURLOPT_POST, true );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
        
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $result = curl_exec($ch);
        
        curl_close($ch);
        
        return $result;
    }
    
    function error($msg){
        echo "Android send notification failed with error:";
       echo "\t" . $msg;
        exit(1);
    }
}
//echo "4";





for($i = 0; $i < count($codalunonotificacao); $i++) {

    $id = $codalunonotificacao[$i]->id;
    $visualizada = 0;
           $stmt1 = $conexao->prepare("insert into feedback(idaluno,iddisciplina,idusuario,titulo,descricao,urlimagem,urllink,visualizada,data) values (?,?,?,?,?,?,?,?,NOW()) ");
    
    $stmt1 -> bindParam(1,$id);
    $stmt1 -> bindParam(2,$Disciplina);
    $stmt1 -> bindParam(3,$IdUsuario);
    $stmt1 -> bindParam(4,$title);
    $stmt1 -> bindParam(5,$message); 
    $stmt1 -> bindParam(6,$imagemUrl);   
    $stmt1 -> bindParam(7,$urlPush);
    $stmt1 -> bindParam(8,$visualizada);
    $stmt1 -> execute();
    }


if(isset($_POST) && !empty($_POST)){
    $apiKey = $_POST["apiKey"]; // CHAVE DA API GCM...
    $devicesToken = explode(",",$DevicesX);
    //$devicesToken = rtrim($devicesToken, ','); // Tokens dos aparelhos que receberão a notificação - separados por ','...
    $gcpm = new GCMPushMessage($apiKey);
    $gcpm->setDevices($devicesToken);
   
$msg = "";

    
    $response = $gcpm->send($message, array('title' => $title,'BigTextStyle' => 'true','bigText' => $message ,
        'BigPictureStyle'=>'true','customNotificationTitle'=>$title
                                               )); // Título do Push...

   
  

   
   
    //echo $response;
    //echo "<br>-------------------------------------";
    //echo $_SESSION['idusuario'].$id_res;
}
?>
</table>
            
              </div>
            
            </div>

</div></div></div>

        

    </div>
</div>
 
 





</body>
</html>