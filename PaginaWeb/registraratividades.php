<!doctype html>
<html lang="pt">
<head>
<?php include 'php/VerificarSession.php';
include 'php/Conexao.php';

?>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<script type="text/javascript" src="js/paginador.js"></script>

	<title>IFPE - REGISTRAR ATIVIDADES</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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
                    <a class="navbar-brand" href="#">Registrar Atividade</a>
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
<form class="form-horizontal" id="formatividade" method="get" action="registraratividades2.php" >
<fieldset>

<!-- Form Name -->
<legend> </legend>
<!-- Erros gerados no cadastro/alteração-->
<?php 

if(isset($_SESSION['erromatricula'])){
											echo "<center><h4 style='color:red;'>".$_SESSION['erromatricula']."</h4></center>";
											
											unset( $_SESSION['erromatricula'] );
											
										}


?>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome da Atividade</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="matricula">Tipo Atividade</label>  
  <div class="col-md-4">
   <select id="tipoatividadeList" name="tipoatividadeList" class="form-control">
  <?php
  //Seleciona todas disciplinas e lista no form
  
  $stmt = $conexao->prepare("SELECT * FROM atividade_tipo ");
  $stmt->execute();

    if($stmt->rowCount()>0){

  
    

    $resultado = $stmt->fetchAll();
    foreach($resultado as $linha){ 
    ?>
     <option value="<?php echo $linha['id']; ?>"><?php echo ($linha['descricao']); ?></option>
   
   <?php
    }
    
    }
  
  

  
?> 
     
    </select>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="matricula">Semestre</label>  
  <div class="col-md-4">
      <select id="semestreList" name="semestreList" class="form-control">
  <?php
  //Seleciona todas disciplinas e lista no form
  
  $stmt = $conexao->prepare("SELECT * FROM semestre where ativo =1");
  $stmt->execute();

    if($stmt->rowCount()>0){

  
    

    $resultado = $stmt->fetchAll();
    foreach($resultado as $linha){ 
    ?>
     <option value="<?php echo $linha['id']; ?>"><?php echo ($linha['semestre']); ?></option>
   
   <?php
    }
    
    }
  
  

  
?> 
      
    </select>
 </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="matricula"></label>  
  <div class="col-md-4">
  <input type="submit" name="submitatividade" style="margin-left:15%;margin-top:5%;" class="btn btn-primary btn-info" value="Selecionar Disciplina">  
 </div>
</div>

</fieldset>




<!-- -->


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>


		  
	</form>
		 


<!-- Form Name -->


<!-- Select Basic -->


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
