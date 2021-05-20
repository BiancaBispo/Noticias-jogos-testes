<?php 

$server = "localhost";
$user = "root";
$pass = "";
$database = "admin";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die ("<script> alert('Falha na conexão')</script>");

}
?>