<?php 
    class Producto {
    public function eliminar( $id_usuarios){
        include("conexion.php");
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM usuarios WHERE id_usuario='$id_usuarios'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta       
    while($fila = $resultado->fetch_assoc()){
        $bid_usuario=stripslashes($fila["id_usuario"]);
        }// la consulta termina
    if($bid_usuario==$id_usuarios){
        mysqli_query($db,"DELETE FROM usuarios WHERE id_usuario='$id_usuarios'") or die (mysqli_error($db));header("location: pre_consultar_usuarios.php?el=yy");
        }
    if($bid_usuario!=$id_usuarios){
        echo"No se actualizo el producto";
        }    
    }
    
}
$nuevo=new Producto();
$nuevo->eliminar($_POST["documento"]);

?>