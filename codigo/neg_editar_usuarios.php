<?php 

class Usuario {
    public function editar($documento,$nombres,$apellidos,$rol, $id_usuario){
        include("conexion.php");
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM usuarios WHERE documento='$documento'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta       
    while($fila = $resultado->fetch_assoc()){
        $bdocumento=stripslashes($fila["documento"]);
        $bid_usuario=stripslashes($fila["id_usuario"]);
        }// la consulta termina
    if($bid_usuario==$id_usuario){
        mysqli_query($db,"UPDATE usuarios SET documento='$documento',nombres='$nombres', apellidos='$apellidos', fk_id_roles='$rol'  WHERE id_usuario='$id_usuario'") or die (mysqli_error($db));
        header("location: pre_consultar_usuarios.php?ed=y");
        }
    if($bid_usuario!=$id_usuario){
        echo"No se actualizo el producto";
        header("location: pre_editar_usuarios.php?ed=n");
        }    
    }
    
}

$nuevo=new Usuario();
$nuevo->editar($_POST["bdocumento"],$_POST["bnombres"],$_POST["bapellidos"],$_POST["bid_roles"],$_POST["bid_usuario"]);

?>