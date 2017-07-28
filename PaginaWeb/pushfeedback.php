 <?php
 session_start();
  $Disciplina = $_POST['disciplina'];
  $IdUsuario = $_SESSION['idusuario'];
  $codigos = json_decode($_POST['codigo']);
  $codalunonotificacao = $codigos;
 

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
    



// Escreve "exemplo de escrita" no bloco1.txt

// Fecha o arquivo
fclose($fp); 


//$TipoNotificacao = $_POST['tiponotificacao'];
include 'php/Conexao.php'; 
$stmt = $conexao->prepare("SELECT aluno.token FROM aluno WHERE aluno.idaluno in ($consultaToken) AND aluno.alunoativo != 0 AND aluno.token is not null");
$DevicesX = "";

$stmt->bindValue(1,$Disciplina);
		


		$stmt->execute();

		if($stmt->rowCount() >0){

	
		

	$resultado = $stmt->fetchAll();

	foreach($resultado as $linha){

$DevicesX = $linha["token"] .",". $DevicesX  ;

$fp = fopen("bloco1.txt", "a");

// Escreve "exemplo de escrita" no bloco1.txt
$escreve = fwrite($fp, $sql);

// Fecha o arquivo
fclose($fp); 
			

	
	

	
		}
		
		}

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

        echo json_encode( $fields );
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



if(isset($_POST) && !empty($_POST)){
	$apiKey = $_POST["apiKey"]; // CHAVE DA API GCM...
    $devicesToken = explode(",",$DevicesX); // Tokens dos aparelhos que receberão a notificação - separados por ','...
	$gcpm = new GCMPushMessage($apiKey);
	$gcpm->setDevices($devicesToken);
    $imagemUrl = $_POST["imagemurl"];
    $urlPush = $_POST["url"];
$msg = "";
//if($TipoNotificacao ==2){$msg = 'bigText' => $message ;}
//if($TipoNotificacao ==3){$msg = 'imgUrl=>'.$imagemUrl;}

	$title = $_POST["title"];
	$message = $_POST["message"]; // Conteúdo da mensagem do PUSH...
	$response = $gcpm->send($message, array('title' => $title,'BigTextStyle' => 'true','bigText' => $message ,
                                                'url'=>$urlPush,'customNotificationTitle'=>$title
                                                )); // Título do Push...

   // SALVAR NOTIFICAÇÃO...
 try{ 
include 'php/Conexao.php';


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

   }catch( PDOException $e ){

            print( $e->getMessage() . " - [ " . $e->getCode() . " ] " );

        }
   
	echo $response;
	echo "<br>-------------------------------------";
	echo $_SESSION['idusuario'].$id_res;
}