<?php
session_start();
$documento=$_SESSION['documento'];
if ($_SESSION["usuario"]!="1")
{
header("Location: salir.php");
}
?>