<?php
require_once __DIR__ . "/../connection.php";

function getSales(){
    $db = getConnection();
    $stmt = $db->prepare("SELECT 
                            V.ID, V.ESTADO,DATE_FORMAT(date_add(V.TS, interval 7 hour), '%d/%Y/%m %H:%i') UPDATED, E.NOMBRE, E.CELULAR, COUNT(VD.ID) ITEMS
                            FROM `VENTA` V
                            INNER JOIN `ENTIDADES` E ON V.COD_ENTIDAD_CLIENTE = E.ID
                            INNER JOIN `VENTA_DETALLE` VD ON V.ID=VD.COD_VENTA
                            WHERE V.`ESTADO` <> :ESTADO
                            GROUP BY V.ID
                            ORDER BY V.TS DESC;");
    $stmt->bindValue(":ESTADO", "CART", PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function getSaleDetail($saleId){
    $db = getConnection();
    $stmt = $db->prepare("SELECT 
                            P.*, VD.MONTO_UNIT, VD.CANTIDAD
                            FROM `VENTA` V
                            INNER JOIN `ENTIDADES` E ON V.COD_ENTIDAD_CLIENTE = E.ID
                            INNER JOIN `VENTA_DETALLE` VD ON V.ID=VD.COD_VENTA
                            INNER JOIN `PRODUCTOS` P ON VD.COD_PRODUCTO=P.ID
                            WHERE V.ID=:ID 
                            ORDER BY V.ID DESC;");
    $stmt->bindValue(":ID", $saleId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}