<?php
include("conexion.php");
if(isset($_GET['id'])){
$var=$_GET['id'];
$consulta="SELECT * FROM usuarios WHERE documento='$var'";
if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
while($fila=$resultado->fetch_assoc()){
    $bestado=stripslashes($fila['fk_id_estado']);
    }//la consulta termina
if($bestado=="1"){
    mysqli_query($db, "UPDATE usuarios SET fk_id_estado='2' WHERE documento = '$var'")or die (mysqli_error($db));
    header("location: pre_consultar_usuarios.php");
    }
if($bestado=="2"){
    mysqli_query($db, "UPDATE usuarios SET fk_id_estado='1' WHERE documento = '$var'")or die (mysqli_error($db));
    header("location: pre_consultar_usuarios.php");
    }
}
?>