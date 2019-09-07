<?php require_once "includes/conexion.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php 
            $entrys= getEntryById($conexion,$_GET['id']);
            $entry_actual= mysqli_fetch_assoc($entrys);
            
            
            if(!isset($entry_actual)){
                header("Location: index.php");
            }
?>
<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
                
                 <h1><?=  $entry_actual['titulo'] ; ?></h1> 
                 <h2>
                     <a href="categoria.php?id=<?= $entry_actual['categorias_id']?>">  <h2> <?=  $entry_actual['nombre'] ; ?></h2> </a>
                    
                 <h4><?=  $entry_actual['fecha']; ?></h4>
                 <p>
                     <?=  $entry_actual['descripcion'] ; 
                     ?>
                 </p>
                <?php 
                if(isset($_SESSION['usuario']['id']) && $_SESSION['usuario']['id'] == $entry_actual['usuarios_id']): ?>
                
                     <a href ="borrado.php?id=<?= $entry_actual['id'];?>" class="boton" >BORRAR ENTRADA </a>
                
                     <a href ="editarEntrada.php?id=<?= $entry_actual['id'];?> "class="boton boton-verde" >EDITAR ENTRADA </a>
                
                <?php endif; ?>
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>

