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

class Categorias {
    public function crear($categoria){
        include("conexion.php");//conexion con la base de datos
        $contador="0";
        // se consulta primero si la categoria ya existe
        $consulta = "SELECT * FROM categorias WHERE categoria='$categoria'";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
        }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcategoria=stripslashes($fila["categoria"]);
        $contador+= 1;
        }// la consulta termina
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO categorias (id_categoria,categoria) VALUES (NULL,'$categoria')") or die (mysqli_error($db));// la insercion de la categoria en l base de datos
        echo "La categoria se cre&oacute; correctamente";
        }    
    if($contador!="0"){
        echo "Esta categoria ya existe";// comprobacion para no sobre escribir datos
        }
    }
}

$nuevo=new Categorias();
$nuevo->crear($_POST["categoria"]);

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