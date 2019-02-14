	<!DOCTYPE html>
	<html lang="es">
	<head>
		<title>CRUD</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/alertify.min.css">
		<link rel="stylesheet" type="text/css" href="css/default.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
	 <!-- NAVIGATION -->
	  <?php include('php/navbar.php');?>
    <!-- div principal -->	
		<div class="main">	
	<!-- tabla -->

			<div class="container" id="table-container"></div>
				<div class="container-fluid" id="estadisticas">
					<div class="row">
						<h6 class="text-center col-md-4 ">prom. Edad: <span id="prom"></span></h5>
						<h6 class="text-center col-md-4 ">% Hombres: <span id="porcent"></span></h5>
						<h6 class="text-center col-md-4 ">% Mujeres: <span id="porcentm"></span></h5>
					</div>
				</div>
	<!-- modal ver -->
			<div class="modal fade" id="modalVer" tabindex="-1" role="dialog"  aria-hidden="true">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Detalles</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body" id="contenido-modal"></div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
			      </div>
			    </div>
			  </div>
			</div>
	<!-- modal ver -->

	<!-- modal agregar -->
			<div class="modal fade" id="modalAgregar" tabindex="-1" role="dialog"  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Agregar</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body" id="contenido-modal">
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
			        <button type="button" class="btn btn-outline-primary" id="guardar" data-dismiss="modal">Guardar</button>
			      </div>
			    </div>
			  </div>
			</div>
	<!-- modal agregar -->

	<!-- modal modificar -->
			<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog"  aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Modificar</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body" id="contenido-modal"></div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
			        <button type="button" class="btn btn-outline-primary" id="guardar" data-dismiss="modal">Guardar</button>
			      </div>
			    </div>
			  </div>
			</div>
	<!-- modal modificar -->
		</div>
	<!-- div principal -->

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/alertify.min.js"></script>
		<script src="js/main.js"></script>
	</body>
	</html>

