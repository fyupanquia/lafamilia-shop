<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/connection.php';
require_once __DIR__ . '/products.php';
include __DIR__.'/util.php';

$cart = $_SESSION["cart"];
$id = (int) $_POST["id"];
$quantity = (int) $_POST["quantity"];
$rsp = new stdClass;

$foundInCart = False;
foreach ($cart as $index => $item) {
    if ($item->ID===$id) {
        $item->CANTIDAD = $quantity;
        $foundInCart = True;
    }
}
if(!$foundInCart) {
    $products = getProductsBy("ID", $id,1);
    if(!count($products)){
        throwError("No se logró identificar el producto. Inténtelo otra vez.");
    }
    $product = $products[0];
    $product->CANTIDAD = $quantity;
    $cart[] = $product;
}

$obj = new stdClass;
$body = new stdClass;
$obj->success = true;
$body->action = $foundInCart ? "updated" : "created";
$body->cart = $cart;
$obj->body = $body;

$_SESSION['cart'] = $cart;

echo json_encode($obj);