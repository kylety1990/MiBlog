<?php require_once "includes/conexion.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php 
            if(!isset($_POST['search'])){
                header('Location: index.php');
            }
         
?>
<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
          
                 <h1>Coincidencias con <?=  $_POST['search'] ; ?></h1> 
                <?php $searchs = searchEntry($conexion, $_POST['search']);
                 
                 if(!empty($searchs) && mysqli_num_rows($searchs) >=1) :
                while($search = mysqli_fetch_assoc($searchs)):?>
                
                
                     <article class="entrada">
                         <a href="entrada.php?id=<?= $search['id']?>"/>
                        <h2><?= $search['titulo'];?></h2>
                        <span class="fecha"><?= $search['fecha']." ".$search['titulo']; ?></span>
                       <p>
                        <?= $search['descripcion']?>
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


