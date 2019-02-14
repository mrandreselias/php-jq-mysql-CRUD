<?php
    $resp ="";
    if(!isset($_POST['id'])){
        $resp .= "<h4 class='text-center'>HA OCURRIDO UN ERROR...</h4>";
    }else{
        $id= $_POST['id'];
        include('db.php');
        $query = "SELECT * FROM tabla WHERE id = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_row($result);
        $edad = ((int)date('Y')) - ((int)$row[3]);

            $resp .="<div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-12'>        
                                <table class='table table-bordered '>
                                    <thead class='text-center'>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th>EDAD</th>
                                        <th>CORREO</th>
                                        <th>SEXO</th>
                                    </thead>
                                    <tbody>
                                        <tr class='text-center'>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                            <td>$edad</td>
                                            <td>$row[4]</td>
                                            <td>$row[5]</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>";
    }
    echo $resp;
?>