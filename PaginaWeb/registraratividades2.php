<?php
include 'php/VerificarSession.php';
$nota = array();
$nota = $_POST['nota'];
$codigo = explode('|',$_POST['codigo']);


if(isset($_GET['submitatividade'])){
$_SESSION['nomeatividade'] = $_GET['nome'];
$_SESSION['semestre'] = $_GET['semestreList'];
$_SESSION['tipoatividade']= $_GET['tipoatividadeList'];
}




?>


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
 <form class="form-horizontal" action="registraratividades2.php" method="get">
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
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Disciplina</label>
  <div class="col-md-4">
    <select id="disciplinaList" name="disciplinaList" class="form-control">
  <?php
  //Seleciona todas disciplinas e lista no form

  $stmt = $conexao->prepare("SELECT * FROM disciplina ");
  $stmt->execute();

    if($stmt->rowCount()>0){

  
    

    $resultado = $stmt->fetchAll();
    foreach($resultado as $linha){ 
    ?>
     <option value="<?php echo $linha['iddisciplina']; ?>"><?php echo ($linha['descricaodisciplina']); ?></option>
   
   <?php
    }
    
    }
  
  

  
?> 
      <input type="submit" style="margin-left:15%;margin-top:5%;" class="btn btn-primary btn-info" value="Selecionar Disciplina">  
    </select>
  </div>
      
</form>
<form class="form-horizontal" action="php/CadastrarAtividade.php" method="post">

<input id="semestreList" name="semestreList" type="hidden"  value="<?php echo $_SESSION['semestre']; ?>">
<input id="tipoatividadeList" name="tipoatividadeList" type="hidden"  value="<?php echo $_SESSION['tipoatividade']; ?>">
<input id="nome" name="nome" type="hidden"  value="<?php echo $_SESSION['nomeatividade']; ?>">
<div = class="form-group">

<?php
//Verifica a Listagem de alunos, se não mudou, lista os alunos da disciplina 1.
 if(isset($_GET['disciplinaList'])){
?>


 <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              
        <?php                      
        include 'php/Conexao.php';
$stmt = $conexao->prepare("SELECT * FROM `aluno` INNER JOIN aluno_disciplina on aluno.idaluno = aluno_disciplina.aluno_idaluno where aluno_disciplina.disciplina_iddisciplina = ?");

 $DisciplinaList = $_GET['disciplinaList'];
$stmt -> bindParam(1,$DisciplinaList);
$stmt->execute();

if($stmt->rowCount() >0){
        
        ?>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list" id="conteudo">
                  <thead>
                    <tr>
                       
                       
                        <th>Matricula</th>
                        
            <th>Nome</th>
            <th>Nota</th>
            
            
                    </tr> 
                  </thead>
          <?php 
            } 

  $resultado = $stmt->fetchAll();
  $cont = 0;
  $arrayAlunos = array();
  foreach($resultado as $linha){

    
    $arrayAlunos[$cont] = $linha["idaluno"];
    $arrayAlunos[$cont];
    $cont++;
          ?>
                  <tbody>
                          <tr>
                            
                         
                            <td><?php echo ($linha["matricula"]); ?></td>
                           
                <td><?php echo ($linha["nomealuno"]); ?></td>
                  <td>
                 <input id="disciplina" name="disciplina" type="hidden" value="<?php echo $DisciplinaList;?>" >
                  <input id="nota" name="nota[]" type="text" placeholder="" class="form-control input-md"  maxlength="13" ></td>
              
                          </tr>
                        </tbody>
            <?php 
            } 
            $_SESSION["codigoarray"] = $arrayAlunos;
            ?>
           
                </table>
        <table id="paginador" border="1">
      <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                   <input type="submit"  class="btn btn-primary " value="cadastrar">   
                  </div>
                  <div class="col col-xs-6 text-right">
                 
                </div>
              </div>
    </table>
            
              </div>
            
            </div>

</div></div></div>
 
<?php                     
 }
   
?>

</div>

</fieldset>


   </div>
</div>

</fieldset>

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























