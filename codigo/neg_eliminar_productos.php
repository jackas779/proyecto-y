<?php 
include("conexion.php");
    class Producto {
    public function eliminar($cod_producto, $id_producto){
        include("conexion.php");
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM productos WHERE cod_producto='$cod_producto'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta       
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $bid_producto=stripslashes($fila["id_producto"]);
        }// la consulta termina
    if($bid_producto==$id_producto){
        mysqli_query($db,"DELETE FROM productos WHERE id_producto='$id_producto'") or die (mysqli_error($db));header("location: pre_consultar_productos.php");
        }
    if($bid_producto!=$id_producto){
        echo"No se actualizo el producto";
        }    
    }
    
}
$nuevo=new Producto();
$nuevo->eliminar($_POST["el_cod_producto"],$_POST["id_producto"]);

?>