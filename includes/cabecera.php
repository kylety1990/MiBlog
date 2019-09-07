<?php require_once "conexion.php"?>
<?php require_once "includes/helpers.php" ?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MI BLOG DE CHRISTIAN ALBANO</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    </head>
    <body>
        <!-- CABECERA -->
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">
                    Blog de Christian Albano
                </a> 
            </div>
           
        <!-- MENU -->    
        
           
            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                    <?php $categorys=  getAllCategorys($conexion); ?>
                    <?php while ($category = mysqli_fetch_assoc($categorys)) : ?>
                        <li>
                        <a href="categoria.php?id=<?=$category['id'] ?>"><?= $category['nombre']; ?></a>
                        </li>
                    <?php endwhile;?>
                    <li>
                        <a href="index.php">Sobre Mi</a>
                    </li>
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
        <div id="clearfix"></div>
        </header>
        
         <div id="contenedor">