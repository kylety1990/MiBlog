<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>
<?php require_once "includes/helpers.php" ?>

            <div id="principal">
                 <?php if(isset($_SESSION["completado"])) : ?>
                    <div class="alerta alerta-exito">
                        <?=$_SESSION["completado"]; ?>
                    </div>
                    <?php elseif(isset($_SESSION["errores"]["general"])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION["errores"]["general"]; ?>
                    </div>
                    <?php endif; ?>
                <h1>Ultimas entradas</h1> 
                <?php $entrys = getEntryByCategoryAndLimit($conexion, 4, null); 
                if(!empty($entrys)):
                 while($entry = mysqli_fetch_assoc($entrys)):?>
                     <article class="entrada">
                         <a href="entrada.php?id=<?= $entry['id']?>">
                        <h2><?= $entry['titulo'];?></h2>
                        <span class="fecha"><?= $entry['fecha']." ".$entry['nombre']; ?></span>
                       <p>
                        <?= substr($entry['descripcion'], 0 , 255)."..."?>
                       </p>
                         </a>
                </article>
                <?php endwhile; ?>
            <?php endif; ?>    
                <?php deleteError(); ?>
                <div id="ver-todas">
                    <a href="entradas.php">VER TODAS LAS ENTRADAS</a>
                </div>
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>



