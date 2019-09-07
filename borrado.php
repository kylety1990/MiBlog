<?php require_once "includes/conexion.php"; ?>
<?php if(isset($_GET)){
    
    $id= $_GET['id'];

    $sql = "DELETE FROM entradas WHERE id= $id;";
    $consulta = mysqli_query($conexion, $sql);
    
    if($consulta){
        $_SESSION["completado"]= "Entrada borrada con exito";
        }else{
        $_SESSION["errores"]["general"] = "fallo de borrado";
        }
        
     header('Location: index.php');
    
}
