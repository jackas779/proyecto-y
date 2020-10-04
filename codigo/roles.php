<select name="fk_id_categoria" id="fk_id_categoria" required>
    <option value="">Seleccione:</option>
    <!-- selector multiple -->
<?php
// la consulta de la categorias

include("conexion.php");//la conexion con la base de datos
$consulta = "SELECT * FROM roles";
    if(!$resultado = $db->query($consulta)){
        die('hay un error con la consulta o los daots no existen vuelve a comprobar !!![' . $db->error . ']');
    }// la consulta
    while($fila = $resultado->fetch_assoc()){
        $bid_categoria=stripslashes($fila["id_roles"]);
        $bcategoria=stripslashes($fila["roles"]);
        echo "<option value=' $bid_categoria'>$bcategoria</option>";
        // Esta es la consulta de las categorias
    }
?>
</select>   