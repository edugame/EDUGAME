<?php

include '../generated/include_dao.php';

if (isset($_GET['acao'])) {
        $id = $_GET['codigo'];
        DAOFactory::get${table_nameDAO}DAO()->delete($id);
        echo"<meta http-equiv='refresh' content=3;url='${table_nameMin}.php'>";
}

$action = $_POST['action'];

if ($action == "add") {
    try {
        $transaction = new Transaction();
        $${table_nameMin} = new ${table_name}();
        
        ${variablesAdd}
        
        $id = DAOFactory::get${table_nameDAO}DAO()->insert($${table_nameMin});
        $transaction->commit();
        echo"<meta http-equiv='refresh' content=3;url='add${table_name}.php'>";
    } catch (Exception $exc) {
        //header('location: login.php?msg=error');
        echo $exc;
    }
}


if ($action == "edit") {
    try {
       $transaction = new Transaction();
       $${table_nameMin} = new ${table_name}();
       ${variablesEdit}
        
       $id = DAOFactory::get${table_nameDAO}DAO()->update($${table_nameMin});
       $transaction->commit();
       echo"<meta http-equiv='refresh' content=3;url='${table_nameMin}.php'>";
    } catch (Exception $exc) {
        //header('location: login.php?msg=error');
        echo $exc;
    }

}


?>


<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Area Administrativa AKIPOM</title>
        <meta name="generator" content="Bootply">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/styles.css" rel="stylesheet">

    </head>

    <body>
        <!-- header -->
        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li>
                                    <a href="#">My Profile</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /container -->
        </div>
        <!-- /Header -->
        <!-- Main -->
        <div class="container-fluid">
            <div class="row">
<?php include "menu.php"; ?>
                <!-- /col-3 -->
                <div class="col-sm-9">
                    <!-- column 2 -->
                    <a href="#"></a>

                    <div class="row">
                        <!-- center left-->
                        <div class="col-md-12">
                            <div class="well"><?php
if (isset($_GET['acao'])) {
    echo"Registro excluído com sucesso";
} else {

    if ($action == "add") {
        echo"Registro cadastrado com sucesso";
    }
    if ($action == "edit") {
        echo"Registro atualizado com sucesso";
    }
}
?>

                            </div>

                        </div>
                        <!--/col-->
                        <!--/col-span-6-->
                    </div>
                    <!--/row-->

                    <hr>
                </div>
                <!--/col-span-9-->
            </div>
        </div>
        <!-- /Main -->
        <footer class="text-center">
        </footer>
        <div class="modal" id="addWidgetModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Add Widget</h4>
                    </div>
                    <div class="modal-body">
                        <p>Add a widget stuff here..</p>
                    </div>
                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" class="btn">Close</a>
                        <a href="#" class="btn btn-primary">Save changes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dalog -->
        </div>
        <!-- /.modal -->
        <!-- script references -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>

</html>

