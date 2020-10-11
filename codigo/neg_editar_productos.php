<?php 

class Producto {
    public function editar($cod_producto,$producto,$descripcion,$fk_id_categoria, $id_producto){
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
        mysqli_query($db,"UPDATE productos SET producto='$producto',cod_producto='$cod_producto', descripcion='$descripcion', fk_id_categoria='$fk_id_categoria'  WHERE id_producto='$id_producto'") or die (mysqli_error($db));
        header("location: pre_consultar_productos.php?ed=y");
        }
    if($bid_producto!=$id_producto){
        echo"No se actualizo el producto";
        }    
    }
    
}

$nuevo=new Producto();
$nuevo->editar($_POST["ed_cod_producto"],$_POST["ed_producto"],$_POST["ed_descripcion"],$_POST["ed_fk_id_categoria"],$_POST["id_producto"]);

?>

