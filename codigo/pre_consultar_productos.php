<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
echo "<td>Nombre</td>";
echo "<td>Descripcion</td>";
echo "<td>Codigo Producto</td>";
echo "<td>Estado</td>";
echo "<td>Editar</td>";
echo "<td>Eliminar</td>";
echo "<td>Categoria</td>";
echo "</tr>";


$consulta = "SELECT P.id_producto, P.cod_producto, P.producto, P.descripcion, P.fk_id_categoria, P.fk_id_estado, E.id_estado, E.nombre_estado, C.id_categoria, C.categoria FROM productos P INNER JOIN estados E ON P.fk_id_estado = E.id_estado INNER JOIN categorias C ON P.fk_id_categoria = C.id_categoria";// consulta
    if(!$resultado = $db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }// imprimir los resultados de la consulta
    while($fila = $resultado->fetch_assoc()){
        $bcod_producto=stripslashes($fila["cod_producto"]);
        $bproducto=stripslashes($fila["producto"]);
        $bdescripcion=stripslashes($fila["descripcion"]);
        $bid_producto=stripslashes($fila["id_producto"]);
        $bestado=stripslashes($fila["nombre_estado"]);
        $bcategoria=stripslashes($fila["categoria"]);


        echo "<tr>";
        echo "<td>$bproducto</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bcod_producto</td>";
        echo "<td><button><a href='neg_cambio_estado.php?id=$bid_producto'>cambiar estado</a></button></td>";
        echo "<td><button><a href='pre_editar_productos.php?id=$bid_producto'>Editar</a></button></td>";
        echo "<td><button class='btn btn-danger btn-sm' type='button' data-toggle='modal' data-target='#modal1'>Eliminar</button></td>";
        echo "<td>$bcategoria</td>";
        echo "<td>";
        
        //modal
        echo"<div class='container'>
        <div class='modal fade' tabindex='-1' id='modal1'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-body'>
                        ¿ Esta seguro de esta desición ?
                    </div>
                    <div class='modal-footer'>
                        <a href='neg_eliminar_productos.php?id=$bid_producto' class='btn btn-primary' >Aceptar</a>
                        <button class='btn btn-danger' data-dismiss='modal' >Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>";
        echo "</td>";
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">

$(function(){
    $('#modal1').modal({
        backdrop:'static',
        keybord: false,
        focus: false,
        show:false
    });
});

</script>

</body>
</html>