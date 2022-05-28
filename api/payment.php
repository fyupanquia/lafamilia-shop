<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__."/connection.php";
require_once __DIR__."/util.php";
require_once __DIR__."/util/products.php";
require_once __DIR__."/util/entities.php";
require_once __DIR__."/util/cart.php";

$NOMBRE = trim($_POST["NOMBRE"]);
$NUM_DOCUMENTO = (int) trim($_POST["NUM_DOCUMENTO"]);
$EMAIL = trim($_POST["EMAIL"]);
$CELULAR = (int) trim($_POST["CELULAR"]);
$COMPROBANTE = strtoupper(trim($_POST["COMPROBANTE"]));
$DIRECCION = trim($_POST["DIRECCION"]);
$TIPO_PAGO = trim($_POST["TIPO_PAGO"]);
$TARJETA = (int) trim($_POST["TARJETA"]);
$MMAA = trim($_POST["MMAA"]);
$CVV = (int) trim($_POST["CVV"]);


/*
$NOMBRE = "frank";
$NUM_DOCUMENTO = "11111111";
$EMAIL = "fyupanquia@outlook.com";
$CELULAR = "912345678";
$DIRECCION = "av. 184";
$TIPO_PAGO = "paypal";
$TARJETA = (int) "1111111111111111";
$MMAA = "03/22";
$CVV = "123";
*/

include_once __DIR__."/payment-validation.php";

$entity = $_SESSION["entity"];
$entity->NOMBRE = $NOMBRE;
$entity->NUM_DOCUMENTO = $NUM_DOCUMENTO;
$entity->DIRECCION = $DIRECCION;
$entity->CELULAR = $CELULAR;
$entity->TARJETA = $TARJETA ? $TARJETA : $entity->TARJETA;

updateEntity($entity, array("NOMBRE", "TIPO_DOCUMENTO", "NUM_DOCUMENTO", "DIRECCION", "CELULAR", "TARJETA"));

$cart = getCartDetailByEntityId($entity->ID);
updateStockByProducts($cart);
closeCart($cart[0]->COD_VENTA);

$_SESSION["cart"] = array();

$obj = new stdClass;
$obj->success = true;
echo json_encode($obj);