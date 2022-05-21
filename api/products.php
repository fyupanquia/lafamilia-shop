<?php
require_once __DIR__ . '/connection.php';

function getProductsBy($field, $value, $limit=0){
    $db = getConnection();

    $limitSQL = $limit>0 ? "LIMIT $limit" : "";

    $stmt = $db->prepare("SELECT 
                            `ID`,
                            `NOMBRE`,
                            `DESCRIPCION`,
                            `PRECIO`,
                            `ULTIMO_PRECIO`,
                            `IMG_URL`,
                            `CATEGORIA`,
                            `BADGE`,
                            `GRUPO`
                            FROM `PRODUCTOS` 
                            WHERE ${field}='$value'
                            $limitSQL;");
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

//$pxc = getProductsXCategories();
//print_r(json_encode($pxc));
//exit;
//print_r(json_encode(getProductsByGroupName("NOVEDADES")));