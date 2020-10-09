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
<form action="neg_registrar.php" method="post" autocomplete="off" id="registrar" name="registrar">

<input type="text" name="documento" id="documento">Documento <br>
<input type="text" name="Nombre" id="Nombre">Nombres <br>
<input type="text" name="Apellido" id="Apellido">Apellidos <br>
<input type="text" name="password" id="password">Contraseña <br>
<input type="text" >Repetir Contraseña <br>
<!-- Las casillas del formulario  -->

<input type="hidden" name="estado" id="estado" value="2"> <br>
<!-- el estado del producto -->

<!-- el select -->
<select name="fk_id_roles" id="fk_id_roles" required>
    <option value="">Seleccione:</option>
    <!-- selector multiple -->
<?php
// la consulta de la categorias

include("conexion.php");//la conexion con la base de datos
$consulta = "SELECT * FROM roles";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los daots no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_roles=stripslashes($fila["id_roles"]);
        $broles=stripslashes($fila["roles"]);
        echo "<option value=' $bid_roles'>$broles</option>";
        // Esta es la consulta de los roles
    }
?>
<input type="submit" value="Registrar">

</form>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

</body>
</html>