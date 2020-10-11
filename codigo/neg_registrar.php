<?php 

class Registro {
    public function registrar($documento,$password,$r,$nombres,$apellidos,$estados){
        include("conexion.php");
        $contador="0";
        // se consulta primero si el producto ya existe
        $consulta = "SELECT * FROM usuarios WHERE documento='$documento'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bdocumento=stripslashes($fila["documento"]);
        $contador+= 1;
        }// la consulta termina
    if($password!=$r){
        header("location: pre_registrar.php?error=pass");
    }   
    if($nombres==""){
        header("location: pre_registrar.php?error=nom");
    }  
    if($apellidos==""){
        header("location: pre_registrar.php?error=apel");
    }  
    if($password==""){
        header("location: pre_registrar.php?error=passva");
    }   
    if($documento==""){
        header("location: pre_registrar.php?error=docuva");
    } 
    if($documento!=""){    
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO usuarios (id_usuario,documento,password,nombres,apellidos,fk_id_roles,fk_id_estado) VALUES (NULL,'$documento','$password','$nombres','$apellidos','2','$estados')") or die (mysqli_error($db));
        header("location: index.php?c=1");
        }    
    if($contador!="0"){
        header("location: pre_registrar.php?ya=e");
            }
        }
    }
}

$nuevo=new Registro();
$nuevo->registrar($_POST["documento"],$_POST["password"],$_POST["rpass"],$_POST["nombre"],$_POST["apellido"],$_POST["estado"]);

?>
