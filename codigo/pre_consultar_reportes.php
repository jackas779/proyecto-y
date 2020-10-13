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


<div id="general">

<div id="col1">
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">
<?php 

include("conexion.php");// conexion con la base de datos

echo "<table>";// la tabla de tu mujer xd
echo "<tr bgcolor='#fFDDAA'>";
echo "<td>Id Reporte</td>";
echo "<td>Cod de producto</td>";
echo "<td>Reporte</td>";
echo "<td>Documento</td>";
echo "<td>Nombres</td>";
echo "<td>Apellidos</td>";
echo "</tr>";


$consulta = "SELECT * FROM reportes";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_reporte"]);
        $bcategoria=stripslashes($fila["producto"]);
        $bnombre_estado=stripslashes($fila["reporte"]);
        $bfk_id_documento=stripslashes($fila["fk_id_documento"]);

        $sql="SELECT * FROM usuarios WHERE documento = '$bfk_id_documento'";
        if(!$result = $db->query($sql)){
            die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
            }
        while($row = $result->fetch_assoc()){    
        $bnombres=stripslashes($row["nombres"]);  
        $bapellidos=stripslashes($row["apellidos"]);  
        }
        echo "<tr>";
        echo "<td>$bid_categoria</td>";
        echo "<td>$bcategoria</td>";
        echo "<td>$bnombre_estado</td>";
        echo "<td>$bfk_id_documento</td>";
        echo "<td>$bnombres</td>";
        echo "<td>$bapellidos</td>";
        echo "<tr>";

        }
 
    echo "</table>";    

?>
</div><!-- El cuerpo de la pagina, se cambia o modifica de acuerdo la pagina. -->

<div id="col2">
<?php include("col2.php") ?>
</div><!-- Se llama a la columna derecha -->

</div>
<div id="footer">
<?php include("footer.php") ?>
</div> <!-- Se llama al footer -->
<script type="text/javascript" src="../js/cierre.js">

</script>
</body>
</html>