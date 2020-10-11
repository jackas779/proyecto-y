<?php
include("seguridad_admin.php"); 
//se llama la seguridad del usuario admin
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
<div id="banner">
<?php include("banner.php") ?>
</div><!-- Se llama al banner -->


<div id="col1">
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">
<?php 

class Usuario {
    public function pre_editar($variable){
        include("conexion.php");//la conexion con la base de datos
        $consul = "SELECT * FROM usuarios WHERE documento='$variable'";
        if(!$resultado = $db->query($consul)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
        while($fila = $resultado->fetch_assoc()){
            $bdocumento=stripslashes($fila["documento"]);
            $bnombres=stripslashes($fila["nombres"]);
            $bapellidos=stripslashes($fila["apellidos"]);
            $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
            $bid_usuario=stripslashes($fila['id_usuario']);
        }// fin del while la consulta termina    
    if($bfk_id_estado!="1"){
            header("location: pre_consultar_usuarios.php");
        }  
        $consul= "SELECT U.fk_id_roles, U.documento , R.id_roles, R.roles 
                    FROM usuarios U
                    INNER JOIN roles R
                    ON U.fk_id_roles = R.id_roles WHERE U.documento ='$variable' ";
        if(!$resultad = $db->query($consul)){
            die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
            }// la consulta
        while($fila = $resultad->fetch_assoc()){
            $bid_roles=stripslashes($fila["id_roles"]);
            $broles=stripslashes($fila["roles"]);
        }                 
?>

<form action="neg_editar_usuarios.php" id="editar_usuarios" name="editar-usuarios" method="POST" autocomplete="off">

<?php 
    if(isset($_GET['ed'])){
        $err=$_GET['ed'];
        if($err=="n"){
            echo "<div id='cierre'>";
            echo "<p style='color:red'>No se actualizo el producto</p>";
            echo "<input type='button' value='x' onclick='cerrar();'>";  
            echo "</div>";
            
        }
    }
//mensaje de error 
?>    
<input type="hidden" name="bid_usuario" id="bid_usuario" value="<?php echo "$bid_usuario"; ?>">
<input type="hidden" name="bdocumento" id="bdocumento" value="<?php echo "$bdocumento"; ?>">
<input disabled type="text"  value="<?php echo "$bdocumento"; ?>">Documento <br>
<input type="text" name="bnombres" id="bnombres" value="<?php echo "$bnombres"; ?>">Nombres <br>
<input type="text" name="bapellidos" id="bapellidos" value="<?php echo "$bapellidos"; ?>">Apellidos <br>
<!-- Las casillas del formulario  -->
<select name="bid_roles" id="bid_roles" class="NotItemOne" required>
    <option value="<?php echo "$bid_roles"; ?>" selected><?php echo "$broles"; ?></option>
    <!-- selector multiple -->
<?php
// la consulta de la categorias
include("conxeion.php");
$consulta = "SELECT * FROM roles";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los daots no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_roles"]);
        $bcategoria=stripslashes($fila["roles"]);
        $contador += 1;
        echo "<option value=' $bid_categoria'>$bcategoria</option>";
        // Esta es la consulta de las categorias
    }
?>
</select><br>

<button><a href="pre_consultar_usuarios.php">Cancelar</a></button> 
<input type="submit" value="Actualizar Usuario"/>


</form>
<?php
    }// aqui termina la funcion
}//aqui termina la clase
$editar=new Usuario();
$editar->pre_editar($_POST["documento"]);
?>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

</body>
</html>