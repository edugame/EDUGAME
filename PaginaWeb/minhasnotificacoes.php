<!doctype html>
<html >
<head>
<?php include 'php/VerificarSession.php'?>
<?php  
   
include 'php/Conexao.php'; 
	$stmt = $conexao->prepare("SELECT n.*,u.urlimage,u.nomereduzido,DATE_FORMAT(n.data,'%m/%d/%Y %h:%i') datan from notificacao n,usuario u WHERE u.idusuario = n.usuario_idusuario and n.usuario_idusuario=? order by data desc");
	$stmt->bindValue(1, $_SESSION['idusuario']);
	$stmt->execute();

	

	
		

	$resultado = $stmt->fetchAll();

			
?>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<!-- /PUSH-->
	<!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  <!--  Checkbox, Radio & Switch Plugins -->
  <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script type="text/javascript">
    

      
 $(function () {

            $('body').on('click', '.list-group .list-group-item', function () {
                $(this).toggleClass('active');
            });
            $('.list-arrows button').click(function () {
                var $button = $(this), actives = '';
                if ($button.hasClass('move-left')) {
                    actives = $('.list-right ul li.active');
                    actives.clone().appendTo('.list-left ul');
                    actives.remove();
                } else if ($button.hasClass('move-right')) {
                    actives = $('.list-left ul li.active');
                    actives.clone().appendTo('.list-right ul');
                    actives.remove();
                }
            });
            $('.dual-list .selector').click(function () {
                var $checkBox = $(this);
                if (!$checkBox.hasClass('selected')) {
                    $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
                    $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
                } else {
                    $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
                    $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                }
            });
            $('[name="SearchDualList"]').keyup(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') return;
                if (code == '27') $(this).val(null);
                var $rows = $(this).closest('.dual-list').find('.list-group li');
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });

        });

$(document).ready(function() {
    $("#disciplina").change(function() {
        // executa uma ação qualquer
     
          $.ajax({
              url: "http://www.ifpe.esy.es/mobile/PaginaWeb/AlunosDisciplina.php",
              type: "post",
              data: { 
                 id: $('#disciplina').val()
                    },
               success: function (response) {
                   $('#listaAlunos').html(response);
                   $('#listaselecionada').html("");
                 
                 }     
          });
    });


      var retornosubmit = false;

      $("#formpush").submit(function () {
          return retornosubmit;
      });


        
    


      $('button[type="button"]').on('click', function(){
        // e aqui, o this é o botão clicado
          var id = this.id;
          //alert(id);
          if(id == "btnpush"){
              retornosubmit = true;
          }
        event.preventDefault();
        var arrayObj = new Array();
        var checkedItems = {}, counter = 0;
        $("#listaselecionada li").each(function(idx, li) {
            checkedItems[counter] = $(li).val();
            counter++;
            var obj= new Object();

             obj.id = $(li).val();
             arrayObj.push(obj);

    

        });
        $("#codigo").val(JSON.stringify(arrayObj));
        $('#display-json').html(JSON.stringify(arrayObj));
             var classes = this.classList;
   
      });

       $("#btnpush").click(function () {
         $("#btnpush").attr("disabled", false);
         $("#formpush").submit();
      });


});




    </script>
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }


        .dual-list .list-group {
            margin-top: 8px;
        }

        .list-left li, .list-right li {
            cursor: pointer;
        }

        .list-arrows {
            padding-top: 100px;
        }

            .list-arrows button {
                margin-bottom: 20px;
            }
    </style>
	
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>IFPE - NOTIFICAÇÕES</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
   <link href="css/minhasnotificacoes.css" rel="stylesheet" />


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

  
   <?php 

foreach($resultado as $linha){?> 

<!--CONTEUDO AQUI -->
<div class="row" style="">
  
    
    <div class="row">
        <div class="col-sm-12">




            <div class="[ panel panel-default ] panel-google-plus .col-md-4">
              
                
                <div class="panel-heading .col-md-8" style="
    padding-left: 30px;
">
                    <img class="[ img-circle ] " src="<?echo $linha['urlimage'];?>"  width="60" height="60" />
                    <h3>Prof: <?echo $linha['nomereduzido'];?></h3>
                    <h5><span>Enviado em </span> - <span><?echo $linha['datan'];?></span> </h5>
		   <h3><?echo $linha['titulonotificacao'];?></h3>

                </div>
                <div class="panel-body" style="
    padding-left: 30px;
">
                    <p><?echo $linha['descricao'];?></p>
<a href="minhasnotificacoesdetalhadas.php?id=<?echo $linha['idnotificacao']?>" class="btn btn-primary" role="button">Verificar Notificações Enviadas</a>
            </div>
                </div>
               
        </div>
        
      
   
    </div>
  </div>

<?php };?>
</div>



<!-- /.col-lg-12 -->
</div>
   
<!-- -->
    </div>
</div>


</body>

    

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
