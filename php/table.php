<table class="table table-bordered table-hover table-sm" id="table-personas">
	<thead class="text-center">
		<th>ID</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>EDAD</th>
		<th>OPCIONES</th>
	</thead>
	<tbody>
	<?php 
		if(!isset($_POST['query'])){
			$query = "SELECT * FROM tabla";
		}else{
			$query = $_POST['query'];
		}
		  include('db.php');
		  $result = mysqli_query($conn,$query);
			
		  if($result->num_rows == 0){
			echo "<h5>No se encontraron resultados...</h5>";			
		  }else{
			while($row = mysqli_fetch_row($result)){
				?> 
				<tr class="text-center">
					<td id="id"><?php echo $row[0] ?></td>
					<td id="nombre"><?php echo $row[1] ?></td>
					<td id="apellido"><?php echo $row[2] ?></td>
					<td id="edad"><?php echo (((int)date("Y")) - ((int)$row[3])) ?></td>
					<td class="opciones">
						<button class="btn btn-outline-primary btn-sm"  data-toggle="modal" data-target="#modalVer" id="vermas">Ver mas</button>
						<button class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modalModificar" id="editar">Editar</button>
						<button class="btn btn-outline-danger btn-sm" id="eliminar">Eliminar</button>	
					</td>
				</tr>
		 <?php } ?>
		</tbody>
	</table>
	<?php } ?>

		  