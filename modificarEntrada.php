<?php 
if(isset($_POST)){
   
    require_once "includes/conexion.php";
    require_once "includes/helpers.php";


    $title = isset($_POST["title"])? mysqli_real_escape_string($conexion, $_POST["title"]) : false  ;
    $describe = isset($_POST["describe"])? mysqli_real_escape_string($conexion, $_POST["describe"]) : false  ;
    $category = isset($_POST["category"])? mysqli_real_escape_string($conexion, $_POST["category"]) : false  ;
    $errores=[];

    if(!empty($title)){
       
        $title_valida = true;
        
    }else{
         $errores["titulo"] = "El título esta vacio";
    }
    if(!empty($describe)){
        $descripcion_valida = true;
    }else{
        $errores["descripcion"] = "la descripción esta vacio";
    }if(!empty($category)){
        $categoria_valida= true;
        
    }else{
        $entrada_valida = false;
        $errores["entrada"] = "La categoria es incorrecta";
        
    }
    

    
    if(count($errores) == 0){
        if(isset($_GET['id'])){
            $entry_id= $_GET['id'];
            $id= getIdCategory($conexion, $category);
            $sql = "UPDATE entradas SET titulo = '$title', descripcion = '$describe', categorias_id= '$id' WHERE id= '$entry_id';";      
            
        }else{
            $sql = "INSERT INTO entradas VALUES(null, '$usuario', '$category','$title','$describe',CURDATE());";
        }

        $consulta = mysqli_query($conexion, $sql);
        
        if($consulta){
        $_SESSION["completado"]= "Entrada modificada con exito";
        }else{
        $_SESSION["errores"]["general"] = "fallo de modificación";
        }
        
    }else{
       $_SESSION["errores"]= $errores;
       
       
    }
   
    header('Location: crearEntradas.php');
    
}