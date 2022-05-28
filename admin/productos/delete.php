<?php
require_once __DIR__."/../../api/util/products.php";
if($_POST['id']) {
    $product = new stdClass;
    $product->ID = $_POST['id'];
    deleteProduct($product);
}
header("Location: /admin/productos");