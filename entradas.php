<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
                
                <h1>Todas las entradas</h1> 
               <?php if(!isset($_GET['id'])){
                  $_GET['id']= null;
               }?>
               <?php $entrys = getEntryByCategoryAndLimit($conexion, null , $_GET['id']); 
                if(!empty($entrys)) : 
                 while($entry = mysqli_fetch_assoc($entrys)): ?>
                     <article class="entrada">
                         <a href="entrada.php?id=<?= $entry['id']?>">
                        <h2><?= $entry['titulo'];?></h2>
                        <span class="fecha"><?= $entry['fecha']." ".$entry['nombre']; ?></span>
                       <p>
                        <?= substr($entry['descripcion'], 0 , 255)."..."?>
                       </p>
                         </a>
                </article>
                <?php 
                    endwhile; 
                
                ?>
                
                <?php endif; ?>
                
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>
<?php


