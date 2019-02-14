$(document).ready( ()=>{
	//CARGAR LOS DATOS DE LA TABLA
	loadData();
	prom();
	//EVENTO CLICK EN EL BOTON VER MAS 
	$('.main').find('#table-container').on('click','#vermas', (e)=> {
		verMas($(e.target).parent().parent().find('#id').text());
	});
	//EVENTO CLICK EN EL BOTON EDITAR
	$('.main').find('#table-container').on('click','#editar', (e)=> {
		loadFormEditar($(e.target).parent().parent().find('#id').text());
	});
	//EVENTO CLICK DEL BOTON GUARDAR MODIFICAR
	$(".main").find('#modalModificar').find('#guardar').click( ()=>{
		editar();
	});
	//EVENTO PARA LA BUSQUEDA EN TIEMPO REAL
	$('#barra-buscar').keyup( ()=>{
		arg = $('#barra-buscar').val().trim();
		buscar(arg);
	});
	//EVENTO CLICK EN EL BOTON ELIMINAR
	$('.main').find('#table-container').on('click','#eliminar', (e)=> {
		alertify.confirm('Eliminar', 'Estas seguro de eliminar ?', 
			function(){eliminar($(e.target).parent().parent().find('#id').text());}, 
			function(){ alertify.error('Se ha cancelado...'); });
	});
	//EVENTO CLICK EN EL BOTON AGREGAR NUEVO
	$('#agregarNuevo').click( () =>{
		$(".main").find('#modalAgregar').find('#contenido-modal').load('php/formulario.php');
	});
	//EVENTO DEL BOTON GUARDAR NUEVO REGISTRO
	$(".main").find('#modalAgregar').find('#guardar').click( ()=>{
		agregar();
	});
});

//--------------FUNCIONES-------------------//

//FUNCION PARA CARGAR LA TABLA
function loadData(query){
	$.ajax({
		type:'POST',
		url:'php/table.php',
		data:{query : query},
		success: function(resp){
			$("#table-container").html(resp);
		}
	});
}
//FUNCION PARA CARGAR EL FORMULARIO PARA MODIFICAR UN REGISTRO
function loadFormEditar(id){
	$.ajax({
		type: "POST",
		url: "php/cargarForm.php",
		data: {'id':id},
		success: function (resp) {
			$("#modalModificar").find('#contenido-modal').html($(resp));	
		}
	});
}
//FUNCION PARA VER MAS DETALLES DE LA PESONA
function verMas(id){
	$.ajax({
		type: "POST",
		url: "php/mostrarDatos.php",
		data: {'id':id},
		dataType: 'html',
		success: function (resp) {
			$('.main').find('#modalVer').find('#contenido-modal').html($(resp));
		}
	});
}
//FUNCION PARA EDITAR UN REGISTRO
function editar(){
	$.ajax({
		type: "POST",
		url: "php/editar.php",
		data: {	'id':$('#modalModificar').find('#id').val(),
				'nombre':$('#modalModificar').find('#nombre').val(),
				'apellido':$('#modalModificar').find('#apellido').val(),
				'fecha':$('#modalModificar').find('#fecha').val(),
				'correo':$('#modalModificar').find('#correo').val(),
				'sexo':$('#modalModificar').find('#sexo').val()},
				
		success: function (resp) {
			if(resp == 1){
				alertify.success('Modificado Correctamente...');
				loadData();
			}else{
				alertify.error('Ha ocurrido un error...');
			}
		}
	});
}
//FUNCION PARA LA BUSQUEDA EN TIEMPO REAL
function buscar(arg){
	query = "SELECT * FROM tabla WHERE nombre LIKE '%"+arg+"%' OR apellido LIKE '%"+arg+"%'";
	loadData(query);
}
//FUNCION ELIMINAR 
function eliminar(id){

	$.ajax({
		type: "POST",
		url: "php/eliminar.php",
		data: {id : id},
		success: function (resp) {
			if(resp == 0){
				alertify.error('No se ha podido eliminar...');
			}else{
				alertify.success('Eliminado correctamente..');
				loadData();
			}
		}
	});
}
//FUNCION AGREGAR
function agregar(datos){
	$.ajax({
		type: "POST",
		url: "php/agregarNuevo.php",
		data: {
			'nombre':$('#modalAgregar').find('#nombre').val().trim(),
			'apellido':$('#modalAgregar').find('#apellido').val().trim(),
			'fecha':$('#modalAgregar').find('#fecha').val(),
			'correo':$('#modalAgregar').find('#correo').val().trim(),
			'sexo':$('#modalAgregar').find('#sexo').val()
			},
		success: function (resp) {
			if(resp == 0){
				alertify.error('No se pudo agregar...');
			}else{
				alertify.success('Se ha guardado correctamente...');
				loadData();
			}
		}
	});
}
//funcion para mostrar estadisticas 
function prom(){
	$.ajax({
		type: "POST",
		url: "php/calculos.php",
		success: function (resp) {
			var valor = resp.split("|");
			$('#estadisticas').find('#prom').text(valor[0]);
			$('#estadisticas').find('#porcent').text(valor[1]);
			$('#estadisticas').find('#porcentm').text(100-valor[1]);
		}
	});
}