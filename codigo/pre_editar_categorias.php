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
        $consul = "SELECT * FROM categorias WHERE id_categoria='$variable'";
        if(!$resultado = $db->query($consul)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
        while($fila = $resultado->fetch_assoc()){
            $bcategoria=stripslashes($fila["categoria"]);
            $bfk_id_estado=stripslashes($fila["fk_id_estado"]);
            $bid_categoria=stripslashes($fila["id_categoria"]);

        if($bfk_id_estado!="1"){
                header("location: pre_consultar_categorias.php");
            }   
        }// fin del while la consulta termina      
?>

<form action="neg_editar_categorias.php" id="crear_productos" name="crear_productos" method="POST" autocomplete="off">
<input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo "$bid_categoria"; ?>">
<input type="text" name="ed_categoria" id="ed_categoria" value="<?php echo "$bcategoria"; ?>">Categoria <br>
<!-- Las casillas del formulario  -->

<button><a href="pre_consultar_productos.php">Cancelar</a></button> 
<input type="submit" value="Actualizar Producto"/>


</form>
<?php
    }// aqui termina la funcion
}//aqui termina la clase
$editar=new Producto();
$editar->pre_editar($_POST["id_categoria"]);
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