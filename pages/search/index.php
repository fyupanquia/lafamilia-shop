<?php
    $MODAL_TARGET = "search";
    $category = "search";
    require_once __DIR__."/../../api/search.php";
    $products = searchProduct($_GET["sentence"]);
    //$products = searchProduct("GLORIA MOROCHAS INCA");
?>
<?php include __DIR__."/../products.php";
