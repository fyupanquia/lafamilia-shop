<?php
  $category = strtoupper($_GET["category"]);
  $group = strtoupper($_GET["group"]);
  $products = array();
  if($category) {
    $products = getProductsByCategoryName($category);
  } else if($group) {
    $products = getProductsByGroupName($group);
  }

  $MODAL_TARGET = "PRODUCTSLIST";
?>

<?php include __DIR__."/../products.php";  ?>