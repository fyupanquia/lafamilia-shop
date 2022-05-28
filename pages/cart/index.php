 <?php
    $cart = $_SESSION["cart"];
    $total = 0;
 ?>

 <?php if(count($cart)){  ?>
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $key => $item) { ?>
                            <tr>
                                <td><a class="remove product-<?=$item->ID?>" href="#"><fa class="fa fa-close"></fa></a></td>
                                <td><a href="#"><img src="<?=$item->IMG_URL?>" alt="img"></a></td>
                                <td><a class="aa-cart-title" href="#"><?=$item->NOMBRE?></a></td>
                                <td><?=CURRENCY_LABEL." ".$item->PRECIO?></td>
                                <td><input class="aa-cart-quantity product-<?=$item->ID?>" type="number" value="<?=$item->CANTIDAD?>"></td>
                                <td><?=CURRENCY_LABEL." ".$item->PRECIO*$item->CANTIDAD?></td>
                            </tr>
                        <?php 
                            $total += $item->PRECIO*$item->CANTIDAD;
                        } ?>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>TOTALES</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td><?=CURRENCY_LABEL." ".$total?></td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td><?=CURRENCY_LABEL." ".$total?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="/index.php?page=checkout" class="aa-cart-view-btn">Pagar</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
 <?php }else { ?>
    <!-- Subscribe section -->
    <section id="aa-subscribe">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-subscribe-area">
              <h3>Tu carrito de compra está vacío</h3>
              <p>¡Anímate y agrega tu producto favorito!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / Subscribe section -->
  <?php }?>