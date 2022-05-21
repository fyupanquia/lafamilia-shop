<?php 
  require_once 'api/entity.php';
  $brands = getProviders();
?>
  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              <?php foreach ($brands as $brand){ ?>
                <li><a href="#"><img src=<?=$brand->IMG_URL?> alt=<?=$brand->RAZON_SOCIAL?>></a></li>
              <?php } ?> 
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->