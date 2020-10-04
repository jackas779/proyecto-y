<?php 

    include("conexion.php");
    session_start();
    $contador="0";
    // se consulta primero si la categoria ya existe
    $documento=$_SESSION["documento"];// variable de sesion que se incio en el codigo de evaluar sesion
    $consulta = "SELECT * FROM permisos WHERE documento='$documento'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bfk_id_rol=stripslashes($fila["fk_id_rol"]);
        if($bfk_id_rol=="1"){
            $_SESSION['admin']="1";
            echo "<a href='admin.php'>Ir a admin</a>";
            echo "<br>";
        }    
        if($bfk_id_rol=="2"){
            $_SESSION['usuario']="1";
            echo "<a href='usuario.php'>Ir a usuario</a>";
            echo "<br>";
        }    
    }
?>       