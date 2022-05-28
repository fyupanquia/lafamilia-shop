<?php
header("Content-Type: application/json; charset=utf-8");
require_once __DIR__ . "/connection.php";
require_once __DIR__ . "/util/products.php";
require_once __DIR__."/util/cart.php";
include __DIR__."/util.php";

$cart = $_SESSION["cart"];
$entity = $_SESSION["entity"];

$id = (int) $_POST["id"];
$quantity = (int) $_POST["quantity"];
$rsp = new stdClass;

if($quantity==0){
    $filteredCart = [];
    foreach ($cart as $index => $item) {
        if ($item->ID!==$id) {
            $filteredCart[] = $item;
        }
    }
    $cart = $filteredCart;
} else {
    $products = getProductsBy("ID", $id, 1);
    if(!count($products)){
        throwError("No se logró identificar el producto. Inténtelo otra vez.");
    }
    $product = $products[0];
    if($product->STOCK < $quantity){
        throwError("No existe suficiente stock.");
    }

    $foundInCart = False;
    foreach ($cart as $index => $item) {
        if ($item->ID===$id) {
            $item->CANTIDAD = $quantity;
            $foundInCart = True;
        }
    }
    if(!$foundInCart) {    
        $product->CANTIDAD = $quantity;
        $cart[] = $product;
    }
}

if ($entity) {
    $sale = getCartByEntityId($entity->ID);
    if ($sale) {
        restartCartDetailBySaleId($sale->ID);
    } else {
        $sale = createCart($entity->ID);
    }
    pushCart($sale->ID, $cart);
}

$obj = new stdClass;
$body = new stdClass;
$obj->success = true;
$body->cart = $cart;
$obj->body = $body;

$_SESSION["cart"] = $cart;

echo json_encode($obj);