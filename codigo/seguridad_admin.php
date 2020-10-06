<?php
session_start();
$variable =  $_SESSION['admin'];
echo "$variable";
if ($_SESSION['admin']=="0")
{
    header("location: salir.php");
}
if ($_SESSION['admin']!="1")
{
    header("location: salir.php");
}
?>