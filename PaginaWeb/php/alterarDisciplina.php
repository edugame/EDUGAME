<?php


include 'Conexao.php';
session_start();

try{
$stmt = $conexao->prepare("select * from disciplina where iddisciplina = ?");


$iddisciplina= $_GET["iddisciplina"]; 

$stmt->bindValue(1,$iddisciplina);

$stmt->execute();
$resultado = $stmt->fetchAll();





	

foreach($resultado as $linha){

$nomedisciplina = $linha['descricaodisciplina'];
?>
<html>
<head>
		<meta charset="utf-8">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<title>Alterar Turma</title>

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>

<body>
<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Alterar Turma</a>
                </div>
                <div class="collapse navbar-collapse">
                    

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                              <?php echo $_SESSION['nomeusuario']; ?>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="../dashboard.php" class="dropdown-toggle" data-toggle="dropdown">
                                    Home
                                    
                              </a>
                              
                        </li>
                        <li>
                            <a href="Sair.php">
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<form class="form-horizontal" method="POST"  action="updateDisciplina.php?iddisciplina=<?php echo $iddisciplina; ?>" style="margin-top:20px;">
<fieldset>

<!-- Form Name -->


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome </label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="nome da turma" class="form-control input-md" required="" value="<?php echo utf8_encode($nomedisciplina);?>">
  <span class="help-block">Ex. Técnico em informática para internet </span>  
  </div>
</div>

<!-- Select Basic -->


</fieldset>
<button id="singlebutton" name="singlebutton"  style="margin-left:45%;"    class="btn btn-success">Alterar</button>
</form>
	

		

</body>
</html> 
<?php
}
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
} 

?>