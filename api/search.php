<?php
require_once __DIR__ . '/connection.php';

function searchProduct($sentence){
    $words = explode(" ", $sentence);
    $words = array_unique($words);

    function lowercase($n)
    {
        return strtolower($n);
    }
    $words = array_map("lowercase", $words);
    $rsp = array();
    foreach ($words as $key => $word) {
        $db = getConnection();
        $stmt = $db->prepare("SELECT * 
                                FROM PRODUCTOS 
                                WHERE NOMBRE 
                                LIKE '%$word%';");
        $stmt->execute();
        $rsp = array_merge($rsp, $stmt->fetchAll(PDO::FETCH_OBJ));
    }
    return $rsp;
}

//print_r(json_encode(searchProduct("PRIMOR GLORIA PRIMOR")));