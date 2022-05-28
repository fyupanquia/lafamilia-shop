<?php
require_once __DIR__."/../../api/util/products.php";

$product = new stdClass;
$product->NOMBRE=$_POST["nombre_producto"];
$product->DESCRIPCION=$_POST["descripcion"];
$product->PRECIO=$_POST["precio"];
$product->STOCK=$_POST["stock"];
$product->BADGE=$_POST["badge"];
$product->GRUPO=$_POST["grupo"];
$product->CATEGORIA=$_POST["categoria"];
$product->ULTIMO_PRECIO=$_POST["ultimo_precio"];
$product->COD_ENTIDAD_PROVEEDOR=$_POST["proveedor"];


$allowed_extensions = ["png", "jpg"];
$filename = $_FILES["foto"]["name"];
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
if(!in_array($ext, $allowed_extensions)) {
    header('Location: /admin/productos');
}

$save = insertProduct($product, array("NOMBRE", "DESCRIPCION", 
                                        "PRECIO", "ULTIMO_PRECIO",
                                        "IMG_URL", "CATEGORIA",
                                        "BADGE", "GRUPO",
                                        "STOCK", "COD_ENTIDAD_PROVEEDOR"));

$tempname = $_FILES["foto"]["tmp_name"];
$relativepath = "/assets/img/products/product-{$save->ID}.$ext";
$product->ID = $save->ID;
$product->IMG_URL=$relativepath;
$move = move_uploaded_file($tempname, __DIR__."/../../$relativepath");
updateProduct($product, array("IMG_URL"));

header("Location: /admin/productos");