<?php

class Reporte{
    public function reportes($producto,$descripcion){
        include("conexion.php");
        $contador="0";
        $consulta= "SELECT * FROM productos WHERE cod_producto='$producto'";
        if(!$resultado = $db->query($consulta)){
            die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
            }// la consulta
        while($fila=$resultado->fetch_assoc()){
            $bcod_producto=stripslashes($fila['cod_producto']);
        }    
        if($bcod_producto==$producto){
            mysqli_query($db,"INSERT INTO  reportes (id_reporte,producto,reporte) VALUE (NULL,'$producto','$descripcion')") or die (mysqli_error($db));
            header("location: pre_reporte.php");
        }
        if($bcod_producto!=$producto){
            header("location: pre_reporte.php?error=error");
        }
    }
}
$new= new Reporte();
$new-> reportes($_POST['cod_producto'],$_POST['descripcion']); 


?>