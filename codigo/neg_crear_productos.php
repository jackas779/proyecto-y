<?php 

class Producto {
    public function registrar($cod_producto,$producto,$descripcion,$fk_id_categoria,$estado){
        include("conexion.php");
        $contador="0";
        // se consulta primero si el producto ya existe
        $consulta = "SELECT * FROM productos WHERE cod_producto='$cod_producto'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $contador+= 1;
        }// la consulta termina
    if($cod_producto==""){
        header("location: pre_crear_productos.php?error=error");
    }    
    if($cod_producto!=""){    
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO productos (id_producto,cod_producto,producto,descripcion,fk_id_categoria,fk_id_estado) VALUES (NULL,'$cod_producto','$producto','$descripcion','$fk_id_categoria','$estado')") or die (mysqli_error($db));
        header("location: pre_consultar_productos.php");
        }    
    if($contador!="0"){
        header("location: pre_crear_productos.php?ya=e");
            }
        }
    }
}

$nuevo=new producto();
$nuevo->registrar($_POST["cod_producto"],$_POST["producto"],$_POST["descripcion"],$_POST["fk_id_categoria"],$_POST["estado"]);

?>
