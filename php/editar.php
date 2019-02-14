<?php

    if(!isset($_POST['id'])){
        echo 0;
    }else{
        include('db.php');
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];
        $sexo = $_POST['sexo'];

        $query = "UPDATE tabla SET 
                     nombre = '$nombre',apellido = '$apellido',fecha_nacimiento = '$fecha',correo = '$correo',sexo = '$sexo' 
                    WHERE id = '$id'";

        $result = mysqli_query($conn,$query);
        
        if(!$result){
            echo 0;
        }else{
            echo 1;
        }
    }

?>