
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

class Producto {
    public function registrar($cod_producto,$producto,$descripcion,$fk_id_categoria,$estado){
        include("conexion.php");
        $contador="0";
        // se consulta primero si el producto ya existe
        $consulta = "SELECT * FROM productos WHERE cod_producto='$cod_producto'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $contador+= 1;
        }// la consulta termina
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO productos (id_producto,cod_producto,producto,descripcion,fk_id_categoria,fk_id_estado) VALUES (NULL,'$cod_producto','$producto','$descripcion','$fk_id_categoria','$estado')") or die (mysqli_error($db));
        header("location: pre_consultar_productos.php");
        }    
    if($contador!="0"){
        echo "Este producto ya existe";
        }
    }
}

$nuevo=new producto();
$nuevo->registrar($_POST["cod_producto"],$_POST["producto"],$_POST["descripcion"],$_POST["fk_id_categoria"],$_POST["estado"]);

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