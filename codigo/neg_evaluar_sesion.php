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
        $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
        $bfk_id_roles=stripslashes($fila["fk_id_roles"]);
    

        }// la consulta termina y el while tambien
       
        if($bfk_id_estado!="1"){
            $contador +=1;
            header ("Location: pre_login.php?error=ina");
        }
        if($bfk_id_estado=="1"){
            echo "hola soy uno";
        if($password==$bpassword)
        {   
            $contador=$contador+1;
            if($bfk_id_roles=="2"){
            
            $_SESSION["usuario"]="1";
            $_SESSION["documento"]=$documento;
            header ("Location: pre_reporte.php");
            
            }   
            if($bfk_id_roles=="1"){
            $_SESSION["admin"]="1";
            $_SESSION["documento"]=$documento;
            header ("Location: admin.php");
                }
            }
        }    
        if($password!=$bpassword){

                echo "datos incorrectos";

            }

        if ($contador=="0")
        {

	        header ("Location: pre_login.php?error=error");
        }

        
    }
}

$nuevo=new Sesion();
$nuevo->iniciar($_POST["documento"],$_POST["password"]);

?>