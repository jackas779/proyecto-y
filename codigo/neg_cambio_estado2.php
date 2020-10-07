
<?php 
include("conexion.php");
if(isset ($_GET["id"])){
    $variable=$_GET["id"];
    $consulta = "SELECT * FROM categorias WHERE id_categoria='$variable'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
        }// la consulta termina
    if($bfk_id_estado=="1"){
            mysqli_query($db, "UPDATE categorias SET fk_id_estado='2' WHERE id_categoria='$variable'")or die (mysqli_error($db));
            header("location: pre_consultar_categorias.php");
    }
    if($bfk_id_estado=="2"){
        mysqli_query($db, "UPDATE categorias SET fk_id_estado='1' WHERE id_categoria='$variable'")or die (mysqli_error($db));
        header("location: pre_consultar_categorias.php");
}
}

?>