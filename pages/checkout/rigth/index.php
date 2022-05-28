<?php
    $cart = $_SESSION["cart"];
    $total = 0;
?>
<div class="checkout-right">
    <h4>Resumen de la orden</h4>
    <div class="aa-order-summary-area">
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $key => $item) { ?>
                <tr>
                    <td><?=$item->NOMBRE?> <strong> x  <?=$item->CANTIDAD?></strong></td>
                    <td><?=CURRENCY_LABEL?><?= $item->PRECIO * $item->CANTIDAD ?></td>
                </tr>
                <?php $total += $item->PRECIO * $item->CANTIDAD; ?>
            <?php }?>
        </tbody>
        <tfoot>
        <tr>
            <th>Total</th>
            <td><?=CURRENCY_LABEL?><?=$total?></td>
        </tr>
        </tfoot>
    </table>
    </div>
    <h4>Método de pago</h4>
    <div class="aa-payment-method">
        <label for="cashdelivery">
            <input type="radio" id="cashdelivery" value="cashdelivery" name="optionsRadios" checked> Cash on Delivery 
        </label>
        <label for="paypal">
            <input type="radio" id="paypal" value="paypal" name="optionsRadios"> Via Paypal 
        </label>
        <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">
        <div class="panel-body paypal-form" style="display:none;">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-checkout-single-bill">
                    <input type="text" name="card" placeholder="Número de tarjeta*" value="<?=$entity->TARJETA?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="aa-checkout-single-bill">
                        <input type="text" name="mmaa" placeholder="MM/AA*">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="aa-checkout-single-bill">
                        <input type="password" name="cvv"  placeholder="CVV*">
                    </div>
                </div>
            </div>
        </div>
        <input id="pay" type="button" value="Procesar" class="aa-browse-btn">
    </div>
</div>