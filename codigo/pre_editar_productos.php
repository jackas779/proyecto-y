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

class Producto {
    public function pre_editar($variable){
        include("conexion.php");//la conexion con la base de datos
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
        }// fin del while la consulta termina   
    $categorias = "SELECT P.fk_id_categoria, P.id_producto, P.fk_id_estado, C.id_categoria, C.categoria FROM productos P INNER JOIN categorias C ON P.fk_id_categoria = C.id_categoria WHERE P.id_producto = $variable ";
    if(!$result = $db->query($categorias)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta    
    while($row = $result->fetch_assoc()){
    $bid_categoria=stripslashes($row["id_categoria"]);    
    $bcategoria=stripslashes($row["categoria"]);
      }// la consulta termina    
    if($bfk_id_estado!="1"){
        header("location: pre_consultar_productos.php");
    }    
?>

<form action="neg_editar_productos.php" id="crear_productos" name="crear_productos" method="POST" autocomplete="off">
<input type="hidden" name="id_producto" id="id_producto" value="<?php echo "$bid_producto"; ?>">
<input type="hidden" name="ed_cod_producto" id="ed_cod_producto" value="<?php echo "$bcod_producto"; ?>">
<input disabled type="text" name="ed_cod_producto" id="ed_cod_producto" value="<?php echo "$bcod_producto"; ?>">Cod producto <br>
<input type="text" name="ed_producto" id="ed_producto" value="<?php echo "$bproducto"; ?>">Nombre Producto <br>
<input type="text" name="ed_descripcion" id="ed_descripcion" value="<?php echo "$bdescripcion"; ?>">Descripcion <br>
<!-- Las casillas del formulario  -->
<select name="ed_fk_id_categoria" id="ed_fk_id_categoria" class="NotItemOne" required>
    <option value="<?php echo "$bid_categoria"; ?>" selected><?php echo "$bcategoria"; ?></option>
    <!-- selector multiple -->
<?php
// la consulta de la categorias
include("conxeion.php");
$consulta = "SELECT * FROM categorias";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los daots no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_categoria"]);
        $bcategoria=stripslashes($fila["categoria"]);
        $contador += 1;
        echo "<option value=' $bid_categoria'>$bcategoria</option>";
        // Esta es la consulta de las categorias
    }
?>
</select><br>

<button><a href="pre_consultar_productos.php">Cancelar</a></button> 
<input type="submit" value="Actualizar Producto"/>


</form>
<?php
    }// aqui termina la funcion
}//aqui termina la clase
$editar=new Producto();
$editar->pre_editar($_POST["id_producto"]);
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