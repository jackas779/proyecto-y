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

class Categoria {
    public function editar($id_categoria, $categoria){
        include("conexion.php");
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM categorias WHERE id_categoria='$id_categoria'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta       
    while($fila = $resultado->fetch_assoc()){
        $bcategoria=stripslashes($fila["categoria"]);
        $bid_categoria=stripslashes($fila["id_categoria"]);
        }// la consulta termina    
    if($bid_categoria==$id_categoria){
        mysqli_query($db,"UPDATE categorias SET categoria='$categoria'  WHERE id_categoria='$id_categoria'") or die (mysqli_error($db));
        header("location: pre_consultar_categorias.php?ed=correct");
        }
    if($bid_categoria!=$id_categoria){
        echo"No se actualizo la categoria";
        }    
    }
    
}

$nuevo=new Categoria();
$nuevo->editar($_POST["id_categoria"],$_POST["ed_categoria"]);

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
