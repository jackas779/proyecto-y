<?php 
include("conexion.php");
if(isset ($_GET["id"])){
    $variable=$_GET["id"];
    print_r($variable);
}

?>