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
        @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
        if ($error=="error")
        {
            echo "<p style='color:red'>Por favor digite un nombre para la categoria</p>";
        }
        @$id=$_GET['id'];
        if($id=="error"){
            echo"<p style='color:red' >La categoria ya existe</p>";
        }
        ?><br>
<form action="neg_crear_categorias.php" id="crear_categorias" name="crear_categorias" method="post" autocomplete="off">

<input type="text" name="categoria" id="categoria">Categoria <br><br>
<input type="hidden" name="estado" id="estado" value="1">
<!-- Las casillas del formulario  -->

<input type="submit" value="Crear Categoria"/> 

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