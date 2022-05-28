<?php 
    $id=$_GET['id'];
    require_once __DIR__."/../../api/util/products.php";
    require_once __DIR__."/../../api/util/entities.php";
    require_once __DIR__."/../validation.php";
    $products = getProductsBy("ID", $id, 1);
    $providers = getEntitiesBy("TIPO", "PROVEEDOR");
    if(!count($products)) {
        header("Location: /admin/productos");
    }
    $product = $products[0];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Atualizar</title>
        <meta charse        t="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/admin/Style/headerCSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">      
    </head>

    <body>
    <header class="header">
            <div class="container logo-nav-container">
		        <a class="logo">Actualizar</a>
                <div class="navigation">
                    <ul>
                        <!--<li><a href="/logincrud/indexLogin.php">Salir</a></li>-->
                    </ul>
                </div>
            </div>
	    </header>
    <main class="main">
        <div class="cont_tot">
            <div class="col-md-6">
                <form action="/admin/productos/update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="codigo" value="<?=$product->ID?>"/>
                    <label>Nombre del producto</label>          
                    <input type="text" 
                    class="form-control mb-3"
                    name="nombre_producto" placeholder="nombre del producto" value="<?=$product->NOMBRE?>">
                    <label>Descripción</label>
                    <input type="text" 
                    class="form-control mb-3"
                    name="descripcion" placeholder="descripcion" value="<?=$product->DESCRIPCION?>">
                    <label>Precio</label>
                    <input type="text" 
                    class="form-control mb-3"
                    name="precio" placeholder="precio" value="<?=$product->PRECIO?>">
                    <label>Último precio</label>
                    <input type="text" 
                    class="form-control mb-3" 
                    name="ultimo_precio" 
                    required placeholder="Ultimo_Precio" value="<?=$product->ULTIMO_PRECIO?>">
                    <label>Stock</label>
                    <input type="text" 
                    class="form-control mb-3"
                    name="stock" placeholder="stock" value="<?=$product->STOCK?>">
                    <p>
                        <select name="categoria" class="form-control mb-3">
                            <option value="" <?= $product->CATEGORIA=="" ? "selected" : "" ?>>-- CATEGORIA --</option>
                            <option value="DIARIOS" <?= $product->CATEGORIA=="DIARIOS" ? "selected" : "" ?>>DIARIOS</option>
                            <option value="BEBIDAS" <?= $product->CATEGORIA=="BEBIDAS" ? "selected" : "" ?>>BEBIDAS</option>
                            <option value="HIGIENE" <?= $product->CATEGORIA=="HIGIENE" ? "selected" : "" ?>>HIGIENE</option>
                            <option value="COMESTIBLES" <?= $product->CATEGORIA=="COMESTIBLES" ? "selected" : "" ?>>COMESTIBLES</option>
                            <option value="LIMPIEZA" <?= $product->CATEGORIA=="LIMPIEZA" ? "selected" : "" ?>>LIMPIEZA</option>
                        </select>
                    </p>
                    <p>
                        <select name="badge" class="form-control mb-3">
                            <option value="" <?= $product->BADGE=="" ? "selected" : "" ?>>-- ETIQUETA --</option>
                            <option value="aa-sale" <?= $product->BADGE=="aa-sale" ? "selected" : "" ?>>OFERTA</option>
                            <option value="aa-hot" <?= $product->BADGE=="aa-hot" ? "selected" : "" ?>>NUEVO</option>
                        </select>
                    </p>
                    <p>
                        <select name="grupo" class="form-control mb-3">
                            <option value="" <?= $product->GRUPO=="" ? "selected" : "" ?>>SELECCIONE UN GRUPO</option>
                            <option value="DESTACADO" <?= $product->GRUPO=="DESTACADO" ? "selected" : "" ?>>DESTACADO</option>
                            <option value="POPULAR" <?= $product->GRUPO=="POPULAR" ? "selected" : "" ?>>POPULAR</option>
                            <option value="NOVEDADES" <?= $product->GRUPO=="NOVEDADES" ? "selected" : "" ?>>NOVEDADES</option>
                        </select>
                    </p>
                    <p>
                    <select name="proveedor" class="form-control mb-3">
                        <option value="">-- PROVEEDOR --</option>
                        <?php foreach ($providers as $key => $provider) { ?>
                            <option value="<?=$provider->ID?>" <?= $provider->ID==$product->COD_ENTIDAD_PROVEEDOR ? "selected" : "" ?>><?=$provider->NOMBRE?></option>
                        <?php } ?>
                    </select>
                        </p>
                    <p>
                        <div class="col-sm-20">
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                        <a href="/admin/productos" class="btn btn-primary btn-block">Cancelar</a>
                    </p>
                </form>
            </div>
            <div class="col-md-6 ta-center">
                <img height="328px" src="<?=$product->IMG_URL?>"/>
            </div>
        </div>
    </main>
    </body>

    <footer>
	    <p>&copy; 2022 Creado por GRUPO 5</p>
    </footer>
</html>