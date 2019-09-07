<?php require_once "includes/redireccion.php" ?>
<?php require_once "includes/helpers.php" ?>
<?php require_once "includes/conexion.php" ?>
<?php 
            $entrys= getEntryById($conexion,$_GET['id']);
            $entry_actual= mysqli_fetch_assoc($entrys);
            
            
            if(!isset($entry_actual)){
                header("Location: index.php");
            }
            var_dump($entry_actual);
?>
<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
                <h1>Modificar Entradas</h1> 
                
                   <?php if(isset($_SESSION["completado"])) : ?>
                        <div class="alerta alerta-exito">
                        <?=$_SESSION["completado"]; ?>
                    </div>
                    <?php elseif(isset($_SESSION["errores"]["general"])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION["errores"]["general"]; ?>
                    </div>
                    <?php endif; ?>
                <form action="modificarEntrada.php?id=<?= $entry_actual['id']  ?>" method="POST">
                   
                    <p>
                        Modifica tu entrada: 
                    </p><br/>
                    <?php if(isset($_SESSION['errores']['titulo'])): ?>
                    <p class="alerta alerta-error"><?=$_SESSION["errores"]["titulo"]; ?> </p>
                    <?php endif; ?>
                    <label for="title">Título: </label>
                    <input type="text" style="width:250px;height:15px" name="title" autofocus="autofocus" value="<?= $entry_actual['titulo']?>"/>
                    <?php if(isset($_SESSION["errores"]["descripcion"])): ?>
                    <p class="alerta alerta-error"><?=$_SESSION["errores"]["descripcion"]; ?> </p>
                    <?php endif; ?>
                    <label for="describe">Comentario de tu entrada: </label>
                    <textarea name="describe" rows="10" cols="100"><?= $entry_actual['descripcion']?></textarea>
                    <?php if(isset($_SESSION["errores"]["categoria"])): ?>
                    <p class="alerta alerta-error"><?=$_SESSION["errores"]["categoria"]; ?> </p>
                    <?php endif; ?>
                    <label for="category">Categorias: </label>
                    <select name="category" value="<?= $entry_actual['categorias_id']?>">
                        <?php $categorias = getAllCategorys($conexion); ?>
                        <?php while($categoria = mysqli_fetch_assoc($categorias)): ?>
                            <option><?= $categoria["nombre"]; ?>
                            <?=($categoria['nombre'] == $entry_actual['categorias_id']) ? 'selected="selected"': ""?>
                            </option> 
                        <?php endwhile; ?>
                    </select>
                    <?php deleteError(); ?>    
                    <input type="submit" value="MODIFICAR"/>
               <?php deleteError(); ?>

                </form>
                 
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>
        
        
        
        
    }
