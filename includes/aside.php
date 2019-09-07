

 <aside id="sidebar">
     
     <div id="buscador" class="bloque">
        <h3>Buscar</h3>
        <form action="buscar.php" method="POST">
                        <label for="search">Buscar</label>
                        <input type="text" name="search"/>
                        
                        <input type="submit" value="Entrar"/>
                        
                    </form>
                </div>
     <?php if(isset($_SESSION["usuario"])) : ?>
     <div id="usuario-logueado" class="bloque">
         <h3><?= "Bienvenid@"." ".$_SESSION["usuario"]["nombre"]. " ".$_SESSION["usuario"]["apellidos"];?></h3>
         <a href="crearEntradas.php" class="boton boton-verde">Crear entradas</a>
         <a href="crearCategorias.php" class="boton ">Crear categoria</a>
         <a href="datos.php" class="boton boton-naranja">Mis datos</a>
         <a href="cerrar.php" class="boton boton-rojo">Cerrar sesion</a>
     </div>
     <?php endif; ?>    
     <?php if(!isset($_SESSION["usuario"])) : ?>
                <div id="login" class="bloque">
                    <h3>Login</h3>
     <?php if(isset($_SESSION["error_login"])) : ?>
     <div class="alerta alerta-error">
         <h3><?= $_SESSION["error_login"];?></h3>
     </div>
     <?php endif; ?>    
     
                    <form action="login.php" method="POST">
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        
                        <label for="password">Password</label>
                        <input type="password" name="password"/>
                        
                        <input type="submit" value="Entrar"/>
                        
                    </form>
                </div>
                <div id="register" class="bloque">
                    <h3>Registro</h3>
                    <?php if(isset($_SESSION["completado"])) : ?>
                    <div class="alerta alerta-exito">
                        <?=$_SESSION["completado"]; ?>
                    </div>
                    <?php elseif(isset($_SESSION["errores"]["general"])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION["errores"]["general"]; ?>
                    </div>
                    <?php endif; ?>
                         <form action="registro.php" method="POST">
                        <label for="name">Nombre</label>
                        <input type="text" name="name"/>
                        <?php echo isset($_SESSION["errores"]) ? showError($_SESSION["errores"], "nombre") : ""; ?>
                        
                        <label for="surname">Apellidos</label>
                        <input type="text" name="surname"/>
                        <?php echo isset($_SESSION["errores"]) ? showError($_SESSION["errores"], "apellidos") : ""; ?>
                        
                        <label for="email">Email</label>
                        <input type="email" name="email"/>
                        <?php echo isset($_SESSION["errores"]) ? showError($_SESSION["errores"], "email") : ""; ?>
                        
                        <label for="password">Password</label>
                        <input type="password" name="password"/>
                        <?php echo isset($_SESSION["errores"]) ? showError($_SESSION["errores"], "password") : ""; ?>
                        
                        <input type="submit" name="submit" value="registrar"/>
                        
                    </form>
                                   
                </div>
                <?php endif; ?> 
 
            </aside>


