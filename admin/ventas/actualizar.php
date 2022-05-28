<?php 
    $id=$_GET['id'];
    require_once __DIR__."/../../api/util/sales.php";
    require_once __DIR__."/../validation.php";
    $products = getSaleDetail($id);
    if(!count($products)) {
        header("Location: /admin/productos");
    }
    define("CURRENCY_LABEL", "S./");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Actualizar</title>
        <meta charse        t="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Style/headerCSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">      
    </head>

    <body>
    <header class="header">
            <div class="container logo-nav-container">
		        <a class="logo">Detalle</a>
                <div class="navigation">
                    <ul>
                        <!--<li><a href="/logincrud/indexLogin.php">Salir</a></li>-->
                    </ul>
                </div>
            </div>
	    </header>
    <main class="main">
        <div class="row" style="margin-bottom:1em;margin-top:1em">
            <div class="col-md-12">
                <a href="/admin/ventas" class="btn btn-primary" >Volver</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php $total=0; ?>
                <table class="table" >
                    <thead class="table-success table-striped" >
                        <tr>
                            <th>NOMBRE</th>
                            <th>CATEGORIA</th>
                            <th>GRUPO</th>
                            <th>PRECIO UNITARIO</th>
                            <th>CANTIDAD</th>
                            <th>IMAGEN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $i => $product) {?>
                            <tr>
                                <th><?=$product->NOMBRE?></th>
                                <th><?=$product->CATEGORIA?></th>
                                <th><?=$product->GRUPO?></th>
                                <th><?=CURRENCY_LABEL." ".$product->MONTO_UNIT?></th>
                                <th><?=$product->CANTIDAD?></th>
                                <th>
                                    <img height="200px" src="<?=$product->IMG_URL?>">
                                </th>
                            </tr>

                        <?php
                                $total += $product->MONTO_UNIT*$product->CANTIDAD;
                            }
                        ?>
                    </tbody>
                    <tfoot style="background-color: #dddddd;">
                        <tr>
                            <td colspan="4"></td>
                            <td>TOTAL</td>
                            <td><?=CURRENCY_LABEL." ".$total?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
    </body>

    <footer>
	    <p>&copy; 2022 Creado por GRUPO 5</p>
    </footer>
</html>