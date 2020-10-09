<?php 

class Registro {
    public function registrar($documento,$password,$nombres,$apellidos,$roles,$estados){
        include("conexion.php");
        $contador="0";
        // se consulta primero si el producto ya existe
        $consulta = "SELECT * FROM usuarios WHERE documento='$documento'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $contador+= 1;
        }// la consulta termina
    if($cod_producto==""){
        header("location: pre_registrar.php?error=error");
    }    
    if($cod_producto!=""){    
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO usuarios (id_usuario,documento,password,nombres,apellidos,fk_id_roles,fk_id_estado) VALUES (NULL,'$cod_producto','$producto','$descripcion','$fk_id_categoria','$estado')") or die (mysqli_error($db));
        header("location: pre_consultar_productos.php?c=1");
        }    
    if($contador!="0"){
        header("location: pre_registrar.php?ya=e");
            }
        }
    }
}

$nuevo=new Registro();
$nuevo->registrar($_POST["documento"],$_POST["password"],$_POST["nombre"],$_POST["apellido"],$_POST["fk_id_roles"],$_POST["estado"]);

?>
