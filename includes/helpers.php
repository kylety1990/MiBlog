<?php



function showError($errores , $campo){
    $alert = "";
    if(isset($errores[$campo]) && !empty($campo)){
        $alert = "<div class='alerta alerta-error'>".$errores[$campo]."</div>";
    }
    
    return $alert;
}

function deleteError(){
    if(!empty($_SESSION["errores"])){
            $clear =$_SESSION["errores"] = null;
            
        }else{
            $clear=$_SESSION["errores"]=null;
        }
        if(!empty($_SESSION["completado"])){
            $clear= $_SESSION["completado"]=null;
            

        }else{
            $clear= $_SESSION["completado"]=null;
        }
        
        return $clear;
        
    }   
    
function getAllCategorys($conexion){
        $sql = "SELECT * FROM categorias ORDER BY id ASC ";
        $consulta = mysqli_query($conexion, $sql);
        $resultado= [];
        if($consulta && mysqli_num_rows($consulta) >=1){
            $resultado = $consulta;
        }
        return $resultado;
    }
    
function getCategoryById($conexion, $id ){
        $sql = "SELECT * FROM categorias WHERE categorias.id = $id";
        $consulta = mysqli_query($conexion, $sql);
        $resultado= [];
       
        if($consulta && mysqli_num_rows($consulta) >=1){
            $resultado = mysqli_fetch_assoc($consulta);
            
        }
        
       
        return $resultado;
    }
    
function getEntryById($conexion, $id){
        $sql = "SELECT entradas.*, categorias.nombre FROM `entradas` INNER JOIN categorias ON entradas.categorias_id=categorias.id WHERE entradas.id=$id";
         $consulta = mysqli_query($conexion, $sql);
        $resultado=[];
        if($consulta && mysqli_num_rows($consulta)==1){
            $resultado = $consulta;
        }
        return $resultado;
    }
    
function getEntryByCategoryAndLimit($conexion,$limit = null, $categoria =null){
        $sql = "SELECT entradas.*,categorias.nombre FROM entradas ".
                "INNER JOIN categorias ON entradas.categorias_id = categorias.id ";
        
        if(!empty($categoria)){
            $sql .= " WHERE entradas.categorias_id = $categoria " ;
        }
        $sql .=  " ORDER BY entradas.id DESC";
        if($limit){
            $sql .= " LIMIT $limit";
        }
        
        $consulta = mysqli_query($conexion, $sql);
        
        $resultado=[];
        if($consulta && mysqli_num_rows($consulta) >=1){
            $resultado = $consulta;
        }
        return $resultado;
    }
    
function getIdCategory($conexion,$nombre){
        $sql = "SELECT id FROM categorias Where nombre = '$nombre';";
        $consulta = mysqli_query($conexion, $sql);
        
        if($consulta && mysqli_num_rows($consulta) == 1){
            $resultado =$consulta;
            $total= mysqli_fetch_assoc($resultado);
        }
       
        return $total['id'];
        
        
    }
    
 function searchEntry($conexion, $titulo){
     $sql = "SELECT * FROM entradas WHERE entradas.titulo LIKE '%$titulo%'";
     $consulta = mysqli_query($conexion, $sql);
    
            
      
    
     return $consulta;
 }
    


