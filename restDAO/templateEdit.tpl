		<?php
                include 'sessao.php';
		include '../generated/include_dao.php';
                
                if (isset($_GET['codigo'])){
                        $id = $_GET['codigo'];
			 $${table_nameMin} = DAOFactory::get${table_nameDAO}DAO()->load($id);
			
		}
		?>
              
		
		<!DOCTYPE html>
		<html>
			
			<head>
				<meta http-equiv="content-type" content="text/html; charset=UTF-8">
				<meta charset="utf-8">
				<title>Área Administrativa AKIPOM</title>
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
				<?php  include 'header.php';?>
				<!-- /Header -->
				<!-- Main -->
				<div class="container-fluid">
					<div class="row">
						<?php include "menu.php";?>
						<!-- /col-3 -->
						<div class="col-sm-9">
							<!-- column 2 -->
							<a href="#"></a>
							<hr>
							<div class="row">
								<!-- center left-->
								<div class="col-md-12">
														<!--tabs-->
									<div class="container">
										<div class="row">
										
											<div class="col-md-12">
												<div class="panel-group" id="accordion">
													<form  action="le${table_name}.php" method="post">
													<div class="panel panel-default">
													
														<div class="panel-heading">
														<div class="btn-group btn-group-justified">
											<a href="add${table_name}.php" class="btn btn-primary col-sm-3">
											<i class="glyphicon glyphicon-plus"></i>
											<br> Adicionar
											</a>
									
											<a href="${table_nameMin}.php" class="btn btn-primary col-sm-3">
											<i class="glyphicon glyphicon-th-list"></i>
											<br> Listar
											</a>
									
										</div>
															<h4 class="panel-title"></h4>
														</div>
														<div id="collapseOne" class="panel-collapse collapse in">
															<div class="panel-body">
																<div class="row">
																<input name="action" type="hidden" value="edit">
																  <input name="id" type="hidden" value="<?php echo $_GET['codigo'];?>">
																	<div class="col-md-12">
																		${campos}
																	</div>
																</div>
																<div class="form-group">
																	<button type="submit" class="btn btn-success btn-sm">
																		<span class="glyphicon glyphicon-floppy-disk"></span>  Salvar  </button>
																</div>
															</div>
														</div>
													</div>
													</form>
													
												</div>
											</div>
											
										</div>
									</div>
									<!--/tabs-->
								</div>
								<!--/col-->
								<!--/col-span-6-->
							</div>
							<!--/row-->
												</div>
						<!--/col-span-9-->
					</div>
				</div>
				<!-- /Main -->
				<footer class="text-center">
				<div class="modal" id="addWidgetModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
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