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
include("conexion.php");//la conexion con la base de datos
if(isset($_GET['id'])){
    $variable=$_GET['id'];
    $consul = "SELECT * FROM productos WHERE id_producto='$variable'";
    if(!$resultado = $db->query($consul)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
        while($fila = $resultado->fetch_assoc()){
            $bcod_producto=stripslashes($fila["cod_producto"]);
            $bproducto=stripslashes($fila["producto"]);
            $bdescripcion=stripslashes($fila["descripcion"]);
            $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
            $bid_producto=stripslashes($fila["id_producto"]);
            }// la consulta termina 
    }  
    $categorias = "SELECT P.fk_id_categoria, P.id_producto, P.fk_id_estado, C.id_categoria, C.categoria FROM productos P INNER JOIN categorias C ON P.fk_id_categoria = C.id_categoria WHERE P.id_producto = $variable ";
    if(!$result = $db->query($categorias)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta    
    while($row = $result->fetch_assoc()){
    $bcategoria=stripslashes($row["categoria"]);
      }// la consulta termina    
    if($bfk_id_estado!="1"){
        header("location: pre_consultar_productos.php");
    }    
?>

<form action="neg_eliminar_productos.php" id="eliminar_productos" name="eliminar_productos" method="POST" autocomplete="off">
<input type="hidden" name="id_producto" id="id_producto" value="<?php echo "$bid_producto"; ?>">
<input type="text" name="el_cod_producto" id="el_cod_producto" value="<?php echo "$bcod_producto"; ?>">Cod producto <br>
<input type="text" name="el_producto" id="el_producto" value="<?php echo "$bproducto"; ?>">Nombre Producto <br>
<input type="text" name="el_descripcion" id="el_descripcion" value="<?php echo "$bdescripcion"; ?>">Descripcion <br>
<input type="text" name="el_categoria" id="el_descripcion" value="<?php echo "$bcategoria";?>">Categoria <br><br>
<!-- Las casillas del formulario  -->

<input type="submit" value="Eliminar Producto"/> 

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