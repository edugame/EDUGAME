<?php include 'php/VerificarSession2.php'?>
<?php
try{
	include 'php/Conexao.php';

	
	$Nome= $_GET["nome"]; 
	$Matricula= $_GET["matricula"];
	//echo "  1<br>";
	
	
//Verifica Se a matricula já está cadastrada...
$stmt = $conexao->prepare("SELECT nomealuno,matricula,idaluno FROM aluno WHERE matricula = ?");

	$stmt -> bindParam(1,$Matricula);
		


		$stmt->execute();

		if($stmt->rowCount()>0){

	//echo "2<br>";
		

		$resultado = $stmt->fetchAll();
		foreach($resultado as $linha){ 
		//echo "3<br>";
		
		$_SESSION['erromatricula'] = "Já possui um Cadastro com a matrícula ".$linha['matricula']." !";
		echo "<script language= 'JavaScript'>
location.href='registraralunos.php'
</script>";
		}
		
		}else{
	
	
	?>
	
	
	
	
	
	
	
	
	
	
<html lang="pt">
<head>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<script type="text/javascript" src="js/paginador.js"></script>

	<title>IFPE - REGISTRAR ALUNOS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	

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
	  <!--    Formatar Dados de Inputs  -->
<script language="JavaScript" src="js/FormatarDados.js"></script>
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
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Registrar Alunos</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                              <?php echo $_SESSION['nomeusuario']; ?>
                            </a>
                        </li>
                        
                        <li>
                            <a href="php/Sair.php">
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

<!--CONTEUDO AQUI -->


<?php 

if(isset($_SESSION['erromatricula'])){
											echo "<center><h4 style='color:red;'>".$_SESSION['erromatricula']."</h4></center>";
											
											unset( $_SESSION['erromatricula'] );
											
										}


?>


  <div class="row" style="margin-left:10%;">
  <p></p><br>
  <label style='font-size:20px'>Selecione As Disciplinas que o Aluno Está Cursando</label>
  <form class="form-horizontal" method="POST" action="php/CadastrarAluno.php" >
  <p></p><br>
  <p></p>
  <p></p>
  <?php
  //Seleciona todas disciplinas e lista no form
  $stmt = $conexao->prepare("SELECT * FROM disciplina ");

		$stmt->execute();

		if($stmt->rowCount()>0){

	
		
$i=0;
		$resultado = $stmt->fetchAll();
		foreach($resultado as $linha){ 
		
	   echo "<fieldset class='col-sm-6'><label>
      <input type='checkbox' value=".$linha['iddisciplina']." name='disciplinas[]' />
      <span style='font-size:18px'>".($linha['descricaodisciplina'])."</span>
   </label></fieldset>";
   
   
		}
		
		}
  
  

  
?>  
  <p></p><br><p></p><br><p></p>
  <input type="hidden" readonly="readonly"  name="nome" value="<?php echo $Nome;?>"> 
 <input type="hidden" readonly="readonly" name="matricula" value="<?php echo $Matricula;?>"> 
<input id="singlebutton" name="singlebutton" type="submit" style="margin-left:30%;margin-top:5%"  value="Cadastrar"   class="btn btn-success form-horizontal">
  </form>
  
  

    </div>




























        </div></div>
</div></div>


        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	

</html>

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	//Cadastrar Alunos na tabela 'alunos' e Disciplinas na tabela 'aluno_disciplina'
	//Inserir aluno	
//$stmt = $conexao->prepare("insert into aluno(nomealuno,matricula) values (?,?)");
	
	

	//$stmt -> bindParam(1,$Nome);
	//$stmt -> bindParam(2,$Matricula);
	


	


//$stmt->execute(); 
	
	
	
	
		}
	
	
  
	}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
 


} 
	



?>
