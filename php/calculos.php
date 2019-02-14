<?php
   
    echo(promEdad().'|'.porcentaje());


    function promEdad(){
        include('db.php');
        $query = "SELECT fecha_nacimiento FROM tabla WHERE 1";
        $result = mysqli_query($conn,$query);
        $sum = 0;
        $i = 0;
        while ($row = mysqli_fetch_row($result)){
                $sum += ((int)date("Y")) - ((int)$row[0]);
                $i ++;
        }
        return $sum/$i;
    }

    function porcentaje(){
        include('db.php');
        $query = "SELECT sexo FROM tabla WHERE 1";
        $result = mysqli_query($conn,$query);
        $hombres = 0;
        $mujeres = 0;
        $i = 0;
        while($row = mysqli_fetch_row($result)){
            if($row[0] == 'H'){
                $hombres += 1;
                $i++;
            }else{
                $mujeres += 1;
                $i++;
            }
        }
        return (($hombres*100)/$i);
    }
?>