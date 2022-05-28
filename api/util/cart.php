<?php
require_once __DIR__ . "/../connection.php";

function getCartByEntityId($entityId){
    $db = getConnection();
    $stmt = $db->prepare("SELECT 
                            *
                            FROM `VENTA` 
                            WHERE `COD_ENTIDAD_CLIENTE` = :COD_ENTIDAD_CLIENTE AND
                            `ESTADO` = :ESTADO;");
    $stmt->bindValue(":COD_ENTIDAD_CLIENTE", $entityId, PDO::PARAM_INT);
    $stmt->bindValue(":ESTADO", "CART", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}
function restartCartDetailBySaleId($saleId){
    $db = getConnection();
    $stmt = $db->prepare("DELETE FROM `VENTA_DETALLE` WHERE `COD_VENTA`=:COD_VENTA");
    $stmt->bindValue(":COD_VENTA", $saleId, PDO::PARAM_INT);
    return $stmt->execute();
}
function createCart($entityId){
    $db = getConnection();
    $stmt = $db->prepare("INSERT INTO `VENTA` SET
                            COD_ENTIDAD_CLIENTE=:COD_ENTIDAD_CLIENTE,
                            ESTADO=:ESTADO;");
    $stmt->bindValue(":COD_ENTIDAD_CLIENTE", $entityId, PDO::PARAM_INT);
    $stmt->bindValue(":ESTADO", "CART", PDO::PARAM_STR);
    $stmt->execute();
    $rsp = new stdClass;
    $rsp->ID = $db->lastInsertId();
    return $rsp;
}
function pushCart($saleId, $cart){
    $db = getConnection();
    foreach ($cart as $key => $item) {
        $stmt = $db->prepare("INSERT INTO `VENTA_DETALLE` SET 
                                `COD_PRODUCTO`=:COD_PRODUCTO, 
                                `MONTO_UNIT`=:MONTO_UNIT, 
                                `CANTIDAD`=:CANTIDAD, 
                                `COD_VENTA`=:COD_VENTA;");
        $stmt->bindValue(":COD_PRODUCTO", $item->ID, PDO::PARAM_INT);
        $stmt->bindValue(":MONTO_UNIT", $item->PRECIO, PDO::PARAM_STR);
        $stmt->bindValue(":CANTIDAD", $item->CANTIDAD, PDO::PARAM_INT);
        $stmt->bindValue(":COD_VENTA", $saleId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
function closeCart($saleId){
    $db = getConnection();
    $stmt = $db->prepare("UPDATE VENTA SET ESTADO=:ESTADO, TS=NOW() WHERE ID=:ID");
    $stmt->bindValue(":ESTADO", "PENDIENTE", PDO::PARAM_STR);
    $stmt->bindValue(":ID", $saleId, PDO::PARAM_INT);
    return $stmt->execute();
}
function mergeSessionCartStoredCart($entityId){
    $sessionCart = $_SESSION["cart"];
    $storedCart  = getCartDetailByEntityId($entityId);
    $sale = new stdClass;
    if(count($storedCart)) {
        foreach ($sessionCart as $i =>  $itemSession) {
            $found = False;
            foreach ($storedCart as $ii => $itemStored) {
                if ($itemSession->ID==$itemStored->ID) {
                    $storedCart[$ii]->CANTIDAD = $itemSession->CANTIDAD;
                    $found = True;
                    break;
                }
            }
            if(!$found) {
                $storedCart[] = $itemSession;
            }
        }
        $sale->ID = $storedCart[0]->COD_VENTA;
        restartCartDetailBySaleId($sale->ID);
    } else {
        $sale = createCart($entityId);
        $storedCart = $sessionCart;
    }
    pushCart($sale->ID, $storedCart);
    $_SESSION["cart"] = $storedCart;
    return $storedCart;
}
function getCartDetailByEntityId($entityId){
    $db = getConnection();
    $stmt = $db->prepare("SELECT 
                            V.ID 'COD_VENTA',P.*,VD.CANTIDAD
                            FROM `VENTA` V
                            INNER JOIN `VENTA_DETALLE` VD ON V.ID= VD.COD_VENTA
                            INNER JOIN `PRODUCTOS` P ON VD.COD_PRODUCTO = P.ID
                            WHERE V.`COD_ENTIDAD_CLIENTE` = :COD_ENTIDAD_CLIENTE AND
                            V.`ESTADO` = :ESTADO;");
    $stmt->bindValue(":COD_ENTIDAD_CLIENTE", $entityId, PDO::PARAM_INT);
    $stmt->bindValue(":ESTADO", "CART", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}