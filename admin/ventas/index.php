<?php
    require_once __DIR__."/../../api/util/sales.php";
    require_once __DIR__."/../validation.php";
    $sales = getSales();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Productos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Style/headerCSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <header class="header">
            <div class="container logo-nav-container">
		        <a class="logo">Productos</a>
                <div class="navigation">
                    <ul>
                        <li><a href="/">Volver a tienda</a></li>
                    </ul>
                </div>
            </div>
	    </header>
    </body>

    <main class="main">
        <div class="container mt-5">
                <div class="row" style="margin-bottom:1em">
                    <div class="col-md-12">
                        <a href="/admin" class="btn btn-primary" >Volver</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table" >
                            <thead class="table-success table-striped" >
                                <tr>
                                    <th>CLIENTE</th>
                                    <th>CELULAR</th>
                                    <th>ITEMS</th>
                                    <th>ESTADO</th>
                                    <th>FECHA</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sales as $i => $sale) {?>
                                        <tr>
                                            <th><?=$sale->NOMBRE?></th>
                                            <th><?=$sale->CELULAR?></th>
                                            <th><?=$sale->ITEMS?></th>
                                            <th><?=$sale->ESTADO?></th>
                                            <th><?=$sale->UPDATED?></th>
                                            <th><a href="/admin/ventas/actualizar.php?id=<?=$sale->ID?>" class="btn btn-info">Ver</a></th>
                                        </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
            <script src="productos/js/confirmacion.js"></script>
    </body>

    <footer>
	    <p>&copy; 2022 Creado por GRUPO 5</p>
    </footer>
</html>