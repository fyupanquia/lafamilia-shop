<?php 
  $entity = $_SESSION["entity"]; 
?>
<!-- Billing Details -->
<div class="panel panel-default aa-checkout-billaddress">
  <div class="panel-heading">
    <h4 class="panel-title">
      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true">
        Detalles de envío
      </a>
    </h4>
  </div>
  <div id="collapseThree" class="panel-collapse collapse in" aria-expanded="true">
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-checkout-single-bill">
            <input type="text" name="name" placeholder="Nombre completo*" value="<?=$entity->NOMBRE?>">
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-6">
          <div class="aa-checkout-single-bill">
            <input type="text" name="num_documento" placeholder="Número Documento*" value="<?=$entity->NUM_DOCUMENTO?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="aa-checkout-single-bill">
            <input type="email" name="email" placeholder="Correo electrónico*" disabled value="<?=$entity->EMAIL?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="aa-checkout-single-bill">
            <input type="tel" name="phone" placeholder="Celular*" value="<?=$entity->CELULAR?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="aa-checkout-single-bill">
            <textarea name="address" cols="8" rows="3" ><?=$entity->DIRECCION?$entity->DIRECCION:"Dirección*"?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>