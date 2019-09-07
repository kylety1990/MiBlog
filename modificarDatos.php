<?php


if(isset($_POST)){
    require_once 'includes/conexion.php';

    
    $name = isset($_POST) ? mysqli_real_escape_string($conexion, $_POST['name']) : false ;
    $surname= isset($_POST) ? mysqli_real_escape_string($conexion, $_POST['surname']) : false ;
    $email = isset($_POST) ? mysqli_real_escape_string($conexion, $_POST['email']) : false ;
    $password = isset($_POST) ? mysqli_real_escape_string($conexion, $_POST['password']) : false ;
    
    
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
    $guardar_usuario = false;
    if(COUNT($errores) == 0){
        $guardar_usuario = true;
        $usuario= $_SESSION['usuario'];
        $userId = $usuario['id'];
        $sql= "UPDATE usuarios SET nombre = '$name', apellidos = '$surname', email= '$email' WHERE id = '$userId'";
        $consulta = mysqli_query($conexion, $sql);
    
        if($consulta){
        $_SESSION["usuario"]["nombre"]=$name;
        $_SESSION["usuario"]["apellidos"]=$surname;
        $_SESSION["usuario"]["email"]=$email;
        $_SESSION["completado"]= "Tus datos se han modificado con exito";
        }else{
        $_SESSION["errores"]["general"] = "fallo dal actualizar tus datos";
        var_dump(mysqli_error($conexion));
        die();
        }
    
    }else{
       $_SESSION["errores"]= $errores;
       
       
    }
    header('Location: datos.php');
    
    }
    

