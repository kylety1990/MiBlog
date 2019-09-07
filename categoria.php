<?php require_once "includes/conexion.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php 
            $categoria_actual= getCategoryById($conexion, $_GET['id']);

?>
<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
          
                 <h1>Entradas de <?=  $categoria_actual['nombre'] ; ?></h1> 
                <?php $entrys = getEntryByCategoryAndLimit($conexion,null, $_GET['id']);
                 if(!empty($entrys) && mysqli_num_rows($entrys) >=1) :
                while($entry = mysqli_fetch_assoc($entrys)):?>
                
                     <article class="entrada">
                         <a href="entrada.php?id=<?= $entry['id']?>"/>
                        <h2><?= $entry['titulo'];?></h2>
                        <span class="fecha"><?= $entry['fecha']." ".$entry['nombre']; ?></span>
                       <p>
                        <?= $entry['descripcion']?>
                       </p>
                         </a>
                </article>
                <?php 
                    endwhile; 
                else: 
                    ?>
                 <div class="alerta ">No hay entradas en esta categoria </div>
              <?php 
              endif; 
              ?>  
                
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>
