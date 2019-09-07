<?php

if(isset($_POST)){
     require_once "includes/conexion.php";


    $name = isset($_POST["name"]) ? mysqli_real_escape_string($conexion, $_POST["name"]) : false ;
    $errores = [];
    //validadion nombre
    if(!empty($name) && !is_numeric($name)){
        $nombre_validado = true;
        
    }else{
        $nombre_validado = false;
        $errores["nombre"] = "el nombre es incorrecto";
        
    }
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(null, '$nombre')";
        $consulta = mysqli_query($conexion, $sql);
        
        if($consulta){
        $_SESSION["completado"]= "Categoria creada con exito";
        }else{
        $_SESSION["errores"]["general"] = "fallo de creacion";
        
        }
    }else{
       $_SESSION["errores"]= $errores;
       
       
    }
    
    header('Location: crearCategorias.php');
    
    
}

