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

<div id="menu">
<?php include("menu.php") ?>
</div><!-- Se llama al menu -->

<div id="col1">
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">
<p><span>
    Este es el cuerpo de la pagina 
</span></p>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->

</body>
</html>