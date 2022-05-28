<?php
    require_once __DIR__."/../../api/util/products.php";
    require_once __DIR__."/../../api/util/entities.php";
    require_once __DIR__."/../validation.php";
    $products = getProducts();
    $providers = getEntitiesBy("TIPO", "PROVEEDOR");
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
                <div class="row">
                    <div class="col-md-4">
                        <h1>Agregar</h1>
                        <form action="/admin/productos/insertar.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                            <input type="text" class="form-control mb-3" name="nombre_producto" required placeholder="Nombre del producto">
                            <input type="text" class="form-control mb-3" name="descripcion" required placeholder="Descripción">
                            <input type="text" class="form-control mb-3" name="precio" required placeholder="Precio">
                            <input type="text" class="form-control mb-3" name="ultimo_precio" required placeholder="Ultimo_Precio">
                            <input type="text" class="form-control mb-3" name="stock" required placeholder="Stock">
                            
                                <select name="categoria" class="form-control mb-3" required>
                                    <option value="">-- CATEGORIA --</option>
                                    <option value="DIARIOS">DIARIOS</option>
                                    <option value="BEBIDAS">BEBIDAS</option>
                                    <option value="HIGIENE">HIGIENE</option>
                                    <option value="COMESTIBLES">COMESTIBLES</option>
                                    <option value="LIMPIEZA">LIMPIEZA</option>
                                </select>
                            
                            
                                <select name="badge" class="form-control mb-3">
                                    <option value="">-- ETIQUETA --</option>
                                    <option value="aa-sale">OFERTA</option>
                                    <option value="aa-hot">NUEVO</option>
                                </select>
                            
                            
                                <select name="grupo" class="form-control mb-3">
                                    <option value="">-- GRUPO --</option>
                                    <option value="DESTACADO">DESTACADO</option>
                                    <option value="POPULAR">POPULAR</option>
                                    <option value="NOVEDADES">NOVEDADES</option>
                                </select>

                                <select name="proveedor" class="form-control mb-3">
                                    <option value="">-- PROVEEDOR --</option>
                                    <?php foreach ($providers as $key => $provider) { ?>
                                        <option value="<?=$provider->ID?>"><?=$provider->NOMBRE?></option>
                                    <?php } ?>
                                </select>

                            <div class="form-group">
                                <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                                <div class="col-sm-20">
                                    <input type="file" class="form-control" name="foto" required>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" type="submit">Registrar</button>
                            <a href="/admin" class="btn btn-primary" >Cancelar</a>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <table class="table" >
                            <thead class="table-success table-striped" >
                                <tr>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $i => $product) {?>
                                        <tr>
                                            <th><?=$product->NOMBRE?></th>
                                            <th><?=$product->PRECIO?></th>
                                            <th><?=$product->STOCK?></th>
                                            <td><img height="60px" src="<?=$product->IMG_URL?>"></td>
                                            <th><a href="/admin/productos/actualizar.php?id=<?=$product->ID?>" class="btn btn-info">Editar</a></th>
                                            <th>
                                                <form method="POST" action="/admin/productos/delete.php">
                                                    <input type="hidden" name="id" value="<?=$product->ID?>"/>
                                                    <input type="submit" value="Eliminar" class="table__item__link"/>
                                                </form>
                                            </th>
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
            <script src="/admin/productos/js/confirmacion.js"></script>
    </body>

    <footer>
	    <p>&copy; 2022 Creado por GRUPO 5</p>
    </footer>
</html>