<?php//se llama la seguridad del usuario admin
include("seguridad_admin.php"); 
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
<table>
<tr>

<div id="banner" >
<?php include("../diseno/menu_crear_categorias/banneradmin.php") ?>
</div><!-- Se llama al banner -->

</tr>
<tr >

<td rowspan="2"> 
<div>
<?php include("../diseno/menu_crear_categorias/col1.php") ?>
</div><!-- Se llama a la columna izquierda -->
</td>

<td style=" width: 100%;" align="center">
<div >

<p ><span>Este es el cuerpo</span></p>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

        
</div>
</td >

</tr>
<tr style="background:green; width: 20%;" align="center">
<div >
  <td colspan="2" height="20% ">
  <?php
      include("../diseno/menu_crear_categorias/footer.php");
  ?>
  </td>
</tr>

</table>


</body>
</html>