<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "includes/conexion.php";
if(isset($_POST)){
    
     if(isset($_SESSION['error_login'])){
        $_SESSION['error_login']=null;
        session_unset($_SESSION['error_login']);
    }
   
    
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    
    //comprobar credenciales//
    
    $sql = "Select * FROM usuarios where email= '$email'";
    $login = mysqli_query($conexion, $sql);
    
    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        $verify= password_verify($password, $usuario["password"]);
        
        if($verify){
            $_SESSION["usuario"]= $usuario;
            
        }else{
            $_SESSION['error_login']="Login incorrecto";
        }
    }else{
        $_SESSION['error_login']="Login incorrecto";
    }
}
header("Location: index.php");