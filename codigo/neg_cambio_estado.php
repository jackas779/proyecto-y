<?php 
if(isset ($_GET["estado"])){
    $variable=$_GET["estado"];
    include("conexion.php");
    echo $variable;
    if($variable=="1"){
        mysqli_query($db,"UPDATE productos SET fk_id_estado = '2'")or die (mysqli_error($db));
        echo $variable;
    }
}

?>