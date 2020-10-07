<?php 
include("conexion.php");
    class Categoria {
    public function eliminar( $id_categoria){
        include("conexion.php");
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM categorias WHERE id_categoria='$id_categoria'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta       
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_categoria"]);
        }// la consulta termina
    if($bid_categoria==$id_categoria){
        mysqli_query($db,"DELETE FROM categorias WHERE id_categoria='$id_categoria'") or die (mysqli_error($db));
        header("location: pre_consultar_categorias.php");
        }
    if($bid_categoria!=$id_categoria){
        echo"No se actualizo el producto";
        }    
    }
    
}
$nuevo=new Categoria();
$nuevo->eliminar($_POST["id_categoria"]);

?>