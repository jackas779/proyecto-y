
<?php 

class Categorias {
    public function crear($categoria,$estado){
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
    if($categoria==""){
        header ("Location: pre_crear_categorias.php?error=error");
       
    }    
    if($categoria!=""){
    if($contador=="0"){
        mysqli_query($db,"INSERT INTO categorias (id_categoria,categoria,fk_id_estado) VALUES (NULL,'$categoria','$estado')") or die (mysqli_error($db));// la insercion de la categoria en l base de datos
        header ("Location: pre_consultar_categorias.php?id=correct");
        }    
    if($contador!="0"){
        header ("Location: pre_crear_categorias.php?id=error");
        // comprobacion para no sobre escribir datos
        }
    }
    }
}

$nuevo=new Categorias();
$nuevo->crear($_POST["categoria"],$_POST["estado"]);