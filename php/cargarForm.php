<?php
    $resp ="";
    if(!isset($_POST['id'])){
        $resp=('<h5>Ha ocurrido un error!</h5>');
    }else{
        include('db.php');
        $id = $_POST['id'];
        $query = "SELECT * FROM tabla WHERE id = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_row($result);
        
        $resp.="<div class='container-fluid' id='formulario'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class='form-group'>
                            <input hidden='true' type='text' id='id' value='$row[0]'>
                                <input class='form-control mb-3' type='text' id='nombre' value='$row[1]' placeholder='Nombre' required>
                                <input class='form-control mb-3' type='text' id='apellido' value='$row[2]' placeholder='apellido' required>
                                <input class='form-control mb-3' type='date' id='fecha' value='$row[3]' required>
                                <input class='form-control mb-3' type='email' id='correo' value='$row[4]' placeholder='micorre@correo.com' required>
                                <select class='form-control mb-3' name='sexo' id='sexo'>
                                    <option value='H'>HOMBRE</option>
                                    <option value='M'>MUJER</option>
                                </select>
                            </div>        
                        </div>
                    </div>
                </div>";
    }
    echo $resp;
?>