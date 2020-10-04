<?php //se llama la seguridad del usuario admin
include("seguridad_admin.php");
?>
<?php 
include("conexion.php");
if(isset ($_GET["id"])){
    $variable=$_GET["id"];
    $consulta = "SELECT * FROM productos WHERE id_producto='$variable'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
        }// la consulta termina
    if($bfk_id_estado=="1"){
            mysqli_query($db, "UPDATE productos SET fk_id_estado='2' WHERE id_producto='$variable'")or die (mysqli_error($db));
            echo "$bfk_id_estado <br>";
            header("location: pre_consultar_productos.php");
    }
    if($bfk_id_estado=="2"){
        mysqli_query($db, "UPDATE productos SET fk_id_estado='1' WHERE id_producto='$variable'")or die (mysqli_error($db));
        header("location: pre_consultar_productos.php");
}
}

?>