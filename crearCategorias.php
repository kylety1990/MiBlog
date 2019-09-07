<?php require_once "includes/redireccion.php" ?>
<?php require_once "includes/cabecera.php" ?>
<?php require_once "includes/aside.php" ?>

            <div id="principal">
                <h1>Crear Categorias</h1> 
                 <?php if(isset($_SESSION["completado"])) : ?>
                        <div class="alerta alerta-exito">
                        <?=$_SESSION["completado"]; ?>
                    </div>
                    <?php elseif(isset($_SESSION["errores"]["general"])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION["errores"]["general"]; ?>
                    </div>
                    <?php endif; ?>
                <form action="guardarCategoria.php" method="POST">
                   
                    <p>
                        CREA NUEVAS CATEGORIAS DE TU INTERES, PARA HACER CRECER ESTE BLOG 
                    </p><br/>
                    <label for="name">Nombre de la categoria</label>
                    <input type="text" maxlength="20" name="name"/>
                    
                    <input type="submit" value="crear"/>
                </form>
                
            </div>
            
        </div>
        
        <?php require_once "includes/pie.php" ?>
