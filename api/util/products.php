<?php
require_once __DIR__ . "/../connection.php";

function insertProduct($product, $fields){
    $db = getConnection();
    if ($fields) {
        $query = "INSERT INTO `PRODUCTOS` SET ";
        foreach ($fields as $i => $field) {
            $query .= "`$field`=:$field";
            if($i<count($fields)-1){
                $query .= ", ";
            } else {
                $query .= ";";
            }
        }
        $stmt = $db->prepare($query);
        foreach ($fields as  $field) {
            $stmt->bindValue(":$field", $product->$field, PDO::PARAM_STR);
        }
        $stmt->execute();
        $rsp = new stdClass;
        $rsp->ID = $db->lastInsertId();
        return $rsp;
    }
    return False;    
}
function updateProduct($product, $fields){
    $db = getConnection();
    if ($fields) {
        $query = "UPDATE `PRODUCTOS` SET ";
        foreach ($fields as $i => $field) {
            $query .= "`$field`=:$field";
            if($i<count($fields)-1){
                $query .= ", ";
            }
        }
        $query .= " WHERE ID=:ID;";
        $stmt = $db->prepare($query);
        foreach ($fields as  $field) {
            $stmt->bindValue(":$field", $product->$field, PDO::PARAM_STR);
        }
        $stmt->bindValue(":ID", $product->ID, PDO::PARAM_STR);
        $stmt->execute();
        return True;
    }
    return False;
}
function deleteProduct($product){
    $db = getConnection();
    $stmt = $db->prepare("DELETE FROM `PRODUCTOS` WHERE ID=:ID;");
    $stmt->bindValue(":ID", $product->ID, PDO::PARAM_INT);
    return $stmt->execute();
}
function getProducts($limit=0){
    $db = getConnection();

    $limitSQL = $limit>0 ? "LIMIT $limit" : "";

    $stmt = $db->prepare("SELECT
                            *
                            FROM `PRODUCTOS`
                            ORDER BY ID DESC 
                            $limitSQL;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getProductsBy($field, $value, $limit=0){
    $db = getConnection();

    $limitSQL = $limit>0 ? "LIMIT $limit" : "";

    $stmt = $db->prepare("SELECT
                            *
                            FROM `PRODUCTOS`
                            WHERE ${field}=:VAL
                            ORDER BY ID DESC 
                            $limitSQL;");
    $stmt->bindValue(":VAL", $value, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}
function getProductsByGroupName($group, $limit=0){
    return getProductsBy("GRUPO", $group, $limit);
}
function getProductsByCategoryName($category, $limit=0){
    return getProductsBy("CATEGORIA", $category, $limit);
}

function getCategories(){
    $db = getConnection();

    $stmt = $db->prepare("SELECT
                            COUNT(*) TOTAL,`CATEGORIA`
                            FROM `PRODUCTOS`
                            GROUP BY `CATEGORIA`
                            HAVING TOTAL>=3
                            LIMIT 8;");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getProductsXCategories(){
    $pxc = array();
    $categories = getCategories();
    foreach ($categories as $i => $cat){
        $pxc[$cat->CATEGORIA] = getProductsByCategoryName($cat->CATEGORIA, 8);
    }
    return $pxc;
}

function getProductsXGroups($pxc){
    $pxg = array();
    foreach ($pxc as $category => $products){
        foreach ($products as $product){
            if($product->GRUPO) {
                if($pxg[$product->GRUPO]) {
                    $pxg[$product->GRUPO][] = $product;
                } else {
                    $pxg[$product->GRUPO] = array($product);
                }
            }
        }
    }
    return $pxg;
}
function getProductStockById($productId){
    $products = getProductsBy("ID", $productId, 1);
    return (int) $products[0]->STOCK;
}
function updateStockByProductId($productId, $diff){
    $stock = getProductStockById($productId);
    $stock +=  $diff;

    $db = getConnection();
    $stmt = $db->prepare("UPDATE PRODUCTOS SET STOCK=:STOCK WHERE ID=:ID");
    $stmt->bindValue(":STOCK", $stock, PDO::PARAM_INT);
    $stmt->bindValue(":ID", $productId, PDO::PARAM_INT);
    return $stmt->execute();
}
function updateStockByProducts($products){
    foreach ($products as $key => $product) {
        updateStockByProductId($product->ID, $product->CANTIDAD*-1);
    }
}
//print_r("15"*-10);
//print_r(updateStockByProductId(96, 5));
//print_r(createPendingSale(43));
//$pxc = getProductsXCategories();
//print_r(json_encode($pxc));
//exit;
//print_r(json_encode(getProductsByGroupName("NOVEDADES")));