<?php 

class Sesion {
    public function iniciar($documento,$password){
        include("conexion.php");
        session_start();
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM usuarios WHERE documento='$documento'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bpassword=stripslashes($fila["password"]);

        if($password==$bpassword)
        {
            $contador=$contador+1;
            $_SESSION["admin"]="1";
            $_SESSION["documento"]=$documento;
            header ("Location: usuario.php");
            }
            if($password!=$bpassword){

                echo "datos incorrectos";

            }

        }// la consulta termina y el while tambien

        if ($contador=="0")
        {

	        header ("Location: login.php?error=error");
        }

        
    }
}

$nuevo=new Sesion();
$nuevo->iniciar($_POST["documento"],$_POST["password"]);

?>