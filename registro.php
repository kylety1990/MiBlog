<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST)){
    require_once "includes/conexion.php";
    if(!isset($_SESSION)){
        session_start();
    }
    
    $name = isset($_POST["name"]) ? mysqli_real_escape_string($conexion, $_POST["name"]) : false ;
    $surname = isset($_POST["surname"]) ? mysqli_real_escape_string($conexion, $_POST["surname"]) : false ;
    $email = isset($_POST["email"]) ? mysqli_real_escape_string($conexion, $_POST["email"]) : false ;
    $password = isset($_POST["password"]) ? mysqli_real_escape_string($conexion, $_POST["password"]) : false ;
    
    $errores = [];
    //validadion nombre
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $nombre_validado = true;
        
    }else{
        $nombre_validado = false;
        $errores["nombre"] = "el nombre es incorrecto";
        
    }
    //validacion Apellidos
    if(!empty($surname) && !is_numeric($surname) && !preg_match("/[0-9]/", $surname)){
        $apellidos_validado = true;
        
    }else{
        $apellidos_validado = false;
        $errores["apellidos"] = "el apellido es incorrecto";
    }
    //validadion Email;
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
        
    }else{
        $email_validado = false;
        $errores["email"] = "el email es incorrecto";
    }
    
    //validadion password:
    if(!empty($password)){
        $password_validado = true;
        
    }else{
        $password_validado = false;
        $errores["password"] = "el password es incorrecto";
    }
    $guardar_usuario = false;
    if(COUNT($errores) == 0){
        $guardar_usuario = true;
        
        // Cifrar la contraseña//
    $password_segura = password_hash($password, PASSWORD_BCRYPT, [cost=>4]);
        //Insertar Usuario
    
    $sql= "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
    $consulta = mysqli_query($conexion, $sql);
    
        if($consulta){
        $_SESSION["completado"]= "Registro con exito";
        }else{
        $_SESSION["errores"]["general"] = "fallo de registro";
        
        }
    
    }else{
       $_SESSION["errores"]= $errores;
       
       
    }
    header('Location: index.php');
    }
