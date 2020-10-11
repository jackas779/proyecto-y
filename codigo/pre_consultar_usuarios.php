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


<div id="general">

<div id="col1">
<?php include("col1.php") ?>
</div><!-- Se llama a la columna izquierda -->

<div id="cuerpo">
<?php 

if(isset($_GET['c'])){
    $edd=$_GET['c'];
    if($edd="1"){
        echo "<div id='cierre'>";
        echo "<p style='color:green'>Se creo correctamente el producto</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

if(isset($_GET['ed'])){
    $edd=$_GET['ed'];
    if($edd="y"){
        echo "<div id='cierre'>";
        echo "<p style='color:green'>Se edito correctamente el producto</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}
if(isset($_GET['el'])){
    $edd=$_GET['el'];
    if($edd="yy"){
        echo "<div id='cierre'>";
        echo "<p style='color:green'>Se elimino correctamente el usuario</p>";
        echo "<input type='button' value='x' onclick='cerrar();'>";  
        echo "</div>";
    }
}

?>    
<?php 

include("conexion.php");// conexion con la base de datos

echo "<table>";// la tabla de tu mujer xd
echo "<tr bgcolor='#fFDDAA'>";
echo "<td>Documento</td>";
echo "<td>Nombres</td>";
echo "<td>Apellidos</td>";
echo "<td>Estado</td>";
echo "<td>Editar</td>";
echo "<td>Eliminar</td>";
echo "<td>rol</td>";
echo "</tr>";


$consulta = "SELECT U.documento, U.nombres, U.apellidos, U.fk_id_estado, U.fk_id_roles,U.id_usuario,
                    E.id_estado, E.nombre_estado, 
                    R.id_roles, R.roles
                    FROM usuarios U 
                    INNER JOIN estados E
                    ON U.fk_id_estado = E.id_estado
                    INNER JOIN roles R
                    ON U.fk_id_roles = R.id_roles";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){
        $bdocumento=stripslashes($fila["documento"]);
        $bnombres=stripslashes($fila["nombres"]);
        $bapellidos=stripslashes($fila["apellidos"]);
        $bestado=stripslashes($fila["nombre_estado"]);
        $broles=stripslashes($fila["roles"]);
        $bid_usuario=stripslashes($fila["id_usuario"]);
        

        echo "<tr>";
        echo "<td>$bdocumento</td>";
        echo "<td>$bnombres</td>";
        echo "<td>$bapellidos</td>";
        echo "<td>$bestado<button><a href='neg_cambio_estado_usuario.php?id=$bdocumento'>cambiar estado</a></button></td>";

        echo "<td>";
        //Formulario para editar productos
        echo "<form action='pre_editar_usuarios.php' id='editar_usuarios' name='editar_usuarios' method='POST' autocomplete='off'>
        <input type='hidden' name='documento' id='documento' value='$bdocumento'>
        <input type='submit'  value='Editar'>
        </form>";
        echo "</td>";

        echo "<td>";
        //Formulario para eliminar productos
        echo "<form action='neg_eliminar_usuarios.php' id='eliminar_usuarios' name='eliminar_usuarios' method='POST' autocomplete='off'>
        <input type='hidden' name='documento' id='documento' value='$bid_usuario' />
        <input type='checkbox' name='validar' value='checkbox' required />
        <input type='submit'  value='Eliminar' />
        </form>";
        echo "</td>";

        echo "<td>$broles</td>";
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