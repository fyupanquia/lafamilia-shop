<?php
    require_once __DIR__."/validation.php";
?>
 
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Adminstrador</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/admin/Style/CSSlogin.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    </head>

    <body>
    <?php require 'partials/header.php' ?>
    <br><br>
        <h1>Hola, <b><?php echo htmlspecialchars($entity->NOMBRE); ?></h1>
    <br><br>
    <p>
        <a href="/" class="btn btn-warning">Volver a tienda</a>
    </p>
    <br><br>
        <a href="admin/productos" class="btn btn-success">Registrar productos</a>
    <br>
    <br><br>
        <a href="admin/entidades" class="btn btn-success">Registrar entidades</a>
    <br><br>
        <a href="admin/ventas" class="btn btn-success">Visualizar ventas</a>
    </body>

    <footer>
        <p>&copy; 2022 Creado por GRUPO 5</p>
    </footer>

</html>