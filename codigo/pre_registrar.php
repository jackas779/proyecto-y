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
// mensaje de contraseñas
if(isset($_GET['error'])){
    $edd=$_GET['error'];
    if($edd="pass"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>las contraseñas no coinciden</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

// mensaje de nombre
if(isset($_GET['error'])){
    $edd=$_GET['error'];
    if($edd="nom"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>Por favor introduce un nombre</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

// mensaje de apellido
if(isset($_GET['error'])){
    $edd=$_GET['error'];
    if($edd="apel"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>Por favor introduce un apellido</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

// mensaje de documento
if(isset($_GET['error'])){
    $edd=$_GET['error'];
    if($edd="docuva"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>Por favor introduce un documento</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

// mensaje de registro
if(isset($_GET['ya'])){
    $edd=$_GET['ya'];
    if($edd="e"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>Este documento ya existe</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

// mensaje de password
if(isset($_GET['error'])){
    $edd=$_GET['error'];
    if($edd="passva"){
        echo "<div id='cierre'>";
        echo "<p style='color:red'>Por favor introduce una contraseña</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}


?>

<!--El formulario para el registro -->
<form action="neg_registrar.php" method="post" autocomplete="off" id="registrar" name="registrar">

<input type="text" name="documento" id="documento" required>Documento <br>
<input type="text" name="nombre" id="nombre" required>Nombres <br>
<input type="text" name="apellido" id="apellido" required>Apellidos <br>
<input type="text" name="password" id="password" required>Contraseña <br>
<input type="text" name="rpass" id="repass" required>Repetir Contraseña <br>
<!-- Las casillas del formulario  -->

<input type="hidden" name="estado" id="estado" value="2"> <br>
<!-- el estado del producto -->

<input type="submit" value="Registrar">

</form>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

<script type="text/javascript" src="../js/cierre.js">

</script>

</body>
</html>