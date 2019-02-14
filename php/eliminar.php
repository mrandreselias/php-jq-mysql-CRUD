<?php
    if(!isset($_POST['id'])){
        $resp = 0;
    }else{
        include('db.php');
        $id = $_POST['id'];
        $query = "DELETE FROM tabla WHERE id = $id";
        $result = mysqli_query($conn,$query);

        if(!$result){
            $resp = 0;
        }else{
            $resp = 1;
        }
    }
echo $resp;
?>