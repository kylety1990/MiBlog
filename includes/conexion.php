<?php

/* 
 CONEXION ENTRE PHP Y LA BASE DE DATOS:
 */
$server= "localhost";
$username = "root";
$password= "";
$database = "blog";
$port = 3308;
$conexion = mysqli_connect($server, $username, $password, $database, $port);


if(!isset($_SESSION)){
    session_start();
}

/*if(mysqli_connect_errno()){
    echo "Error". mysqli_errno($conexion);;
}else{
    echo "CONEXION CORRECTA";
}

mysqli_query($conexion, "SET NAMES 'utf-8'");
 * 
 */