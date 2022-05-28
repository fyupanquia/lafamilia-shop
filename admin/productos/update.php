<?php
require_once __DIR__."/../../api/util/products.php";
if(!$_POST["codigo"]) {
    header('Location: productos.php');
}

$product = new stdClass;
$product->ID = $_POST["codigo"];
$product->NOMBRE=$_POST["nombre_producto"];
$product->DESCRIPCION=$_POST["descripcion"];
$product->PRECIO=$_POST["precio"];
$product->STOCK=$_POST["stock"];
$product->BADGE=$_POST["badge"];
$product->GRUPO=$_POST["grupo"];
$product->CATEGORIA=$_POST["categoria"];
$product->ULTIMO_PRECIO=$_POST["ultimo_precio"];
$product->COD_ENTIDAD_PROVEEDOR=$_POST["proveedor"];
$fields = array("NOMBRE","DESCRIPCION","PRECIO","STOCK","BADGE","GRUPO","CATEGORIA","ULTIMO_PRECIO", "COD_ENTIDAD_PROVEEDOR");

if ($_FILES["foto"]) {
    $allowed_extensions = ["png", "jpg"];
    $filename = $_FILES["foto"]["name"];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    if(!in_array($ext, $allowed_extensions)) {
        header('Location: productos.php');
    }
    $tempname = $_FILES["foto"]["tmp_name"];
    $relativepath = "/assets/img/products/product-{$product->ID}.$ext";
    $move = move_uploaded_file($tempname, __DIR__."/../../$relativepath");
    if($move) {
        $product->IMG_URL = $relativepath;
        $fields[] = "IMG_URL";
    }
}

updateProduct($product, $fields);

header("Location: /admin/productos/actualizar.php?id={$product->ID}");