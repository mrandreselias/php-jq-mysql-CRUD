<?php

    if(!isset($_POST)){
        $resp = 0;
    }else{
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];

        include('db.php');
        $query = "INSERT INTO tabla(nombre,apellido,fecha_nacimiento,correo,sexo)
                         VALUES('$nombre','$apellido','$fecha','$correo','$sexo')";
        
        $result = mysqli_query($conn,$query);

        if(!$result){
            $resp = 0;
        }else{
            $resp = 1;
        }
    }
echo $resp;
?>