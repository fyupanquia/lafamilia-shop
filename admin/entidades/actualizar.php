<?php 
    require_once __DIR__."/../../api/util/entities.php";
    require_once __DIR__."/../validation.php";

    $entities = getEntitiesBy("ID",$_GET["id"],1);
    if(!$entities) {
        header("Location: /admin/entidades");
    }
    $entity = $entities[0];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Actualizar</title>
        <meta charset="UTF-8">
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
    </body>
    <main class="main">
        <div class="cont_tot">
                <div class="col-md-6">
                    <form action="/admin/entidades/update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" class="form-control mb-3" name="id"  value="<?=$entity->ID?>">
                        <input type="text" class="form-control mb-3" name="nombre" required placeholder="Nombre" value="<?=$entity->NOMBRE?>">
                        <input type="text" class="form-control mb-3" name="razon_social" placeholder="Razon social" value="<?=$entity->RAZON_SOCIAL?>">
                        <input type="email" class="form-control mb-3" name="email" required placeholder="Email" value="<?=$entity->EMAIL?>">
                            <div class="form-group">
                                <label for="imagen" class="col-sm-2 control-label">Contraseña</label>
                                <input type="password" class="form-control mb-3" name="password">
                            </div>
                            <select name="tipo" class="form-control mb-3" required>
                                <option>-- TIPO --</option>
                                <option value="CLIENTE" <?php if($entity->TIPO=="CLIENTE"){ echo "selected"; } ?>>CLIENTE</option>
                                <option value="PROVEEDOR" <?php if($entity->TIPO=="PROVEEDOR"){ echo "selected"; } ?> >PROVEEDOR</option>
                                <option value="VENDEDOR" <?php if($entity->TIPO=="VENDEDOR"){ echo "selected"; } ?>>VENDEDOR</option>
                            </select>
                            <select name="tipo_documento" class="form-control mb-3">
                                <option>-- DOCUMENTO --</option>
                                <option value="DNI" <?php if($entity->TIPO_DOCUMENTO=="DNI"){ echo "selected"; } ?>>DNI</option>
                                <option value="RUC" <?php if($entity->TIPO_DOCUMENTO=="RUC"){ echo "selected"; } ?>>RUC</option>
                            </select>
                            <input type="text" class="form-control mb-3" name="num_documento" required placeholder="Número documento" value="<?=$entity->NUM_DOCUMENTO?>">
                            <input type="text" class="form-control mb-3" name="direccion" required placeholder="Dirección" value="<?=$entity->DIRECCION?>">
                            <input type="text" class="form-control mb-3" name="celular" required placeholder="Celular" value="<?=$entity->CELULAR?>">
                            <div class="form-group">
                                <label for="imagen" class="col-sm-2 control-label">Imagen</label>
                                <div class="col-sm-20">
                                    <input type="file" class="form-control" name="foto">
                                </div>
                            </div>
                            <hr>
                            <p>
                                <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                                <a href="/admin/entidades" class="btn btn-primary btn-block">Cancelar</a>
                            </p>
                    </form>
                </div>                  
            <div class="col-md-6 ta-center">
                <img height="328px" src="<?=$entity->IMG_URL?>"/>
            </div>
        </div>
    </main>
</body>

<footer>
	<p>&copy; 2022 Creado por GRUPO 5</p>
 </footer>

</html>