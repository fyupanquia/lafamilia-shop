<?php
    require_once __DIR__."/../../api/util/entities.php";
    require_once __DIR__."/../validation.php";
    $entities = getEntities();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ENTIDADES</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Style/headerCSS.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>

    <body>
    <header class="header">
            <div class="container logo-nav-container">
		        <a class="logo">Entidades</a>
                <div class="navigation">
                    <ul>
                        <li><a href="/">Ir a tienda</a></li>
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
                    <form action="/admin/entidades/insertar.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <input type="text" class="form-control mb-3" name="nombre" required placeholder="Nombre">
                        <input type="text" class="form-control mb-3" name="razon_social" placeholder="Razon social">
                        <input type="email" class="form-control mb-3" name="email" required placeholder="Email">
                        <div class="form-group">
                            <label for="imagen" class="col-sm-2 control-label">Contraseña</label>
                            <input type="password" class="form-control mb-3" name="password" required>
                        </div>
                        <select name="tipo" class="form-control mb-3" required>
                            <option>-- TIPO --</option>
                            <option value="CLIENTE">CLIENTE</option>
                            <option value="PROVEEDOR">PROVEEDOR</option>
                            <option value="VENDEDOR">VENDEDOR</option>
                        </select>
                        <select name="tipo_documento" class="form-control mb-3">
                            <option>-- DOCUMENTO --</option>
                            <option value="DNI">DNI</option>
                            <option value="RUC">RUC</option>
                        </select>
                        <input type="text" class="form-control mb-3" name="num_documento" required placeholder="Número documento">
                        <input type="text" class="form-control mb-3" name="direccion" required placeholder="Dirección">
                        <input type="text" class="form-control mb-3" name="celular" required placeholder="Celular">
                        <div class="form-group">
                            <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                            <div class="col-sm-20">
                                <input type="file" class="form-control" name="foto">
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
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Imagen</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                       foreach ($entities as $i => $entity) {
                    ?>
                    <tr>
                        <th><?=$entity->NOMBRE?></th>
                        <th><?=$entity->TIPO?></th>
                        <th><img src="<?=$entity->IMG_URL?>" height="60px" /></th>
                        <th><a href="/admin/entidades/actualizar.php?id=<?=$entity->ID?>" class="btn btn-info">Editar</a></th>
                        <th>
                            <form method="POST" action="/admin/entidades/delete.php">
                                <input type="hidden" name="id" value="<?=$entity->ID?>"/>
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
        <script src="entidades/js/confirmacion.js"></script>
    </body>

        <footer>
	        <p>&copy; 2022 Creado por GRUPO 5</p>
        </footer>

</html>