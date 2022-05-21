<?php
  $cart = $_SESSION["cart"] ?  $_SESSION["cart"] : array();
?>
 <!-- cart box -->
<div class="aa-cartbox">
  <a class="aa-cart-link" href="#">
    <span class="fa fa-shopping-basket"></span>
    <span class="aa-cart-title">Carrito de compras</span>
    <span class="aa-cart-notify"><?=count($cart)?></span>
  </a>
  <div class="aa-cartbox-summary">
    <ul>
      <?php
        $total = 0;
      ?>
      <?php foreach ($cart as $key => $item) { 
          if($key<=2){
        ?>
        <li>
          <a class="aa-cartbox-img" href="#"><img src="<?=$item->IMG_URL?>" alt="img"></a>
          <div class="aa-cartbox-info">
            <h4><a href="#"><?=$item->NOMBRE?></a></h4>
            <p><?=$item->CANTIDAD?> x <?=CURRENCY_LABEL." $item->PRECIO"?></p>
            <?php  ?>
          </div>
          <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
        </li>
      <?php }
          $total += $item->CANTIDAD * $item->PRECIO;
        } ?>
      <?php if(count($cart)<=3) {?>
        <li>
          <span class="aa-cartbox-total-title">
            Total
          </span>
          <span class="aa-cartbox-total-price">
            <?=CURRENCY_LABEL." $total"?>
          </span>
        </li>
      <?php } ?>
    </ul>
    <?php if (count($cart)) {?>
      <a class="aa-cartbox-checkout aa-primary-btn" href="/index.php?page=cart">Ver todo</a>
    <?php }?>
  </div>
</div>
<!-- / cart box -->