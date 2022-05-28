<?php  if (count($products)){ ?>
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane fade in active">
                    <ul class="aa-product-catg">
                        <?php foreach ($products as $index => $product){ ?>
                          <?php include __DIR__.'/home/product.php' ?>
                        <?php } ?>
                        <?php if(count($products)<4){ ?>
                            <?php for ($i=0; $i < (4-count($products)); $i++) {  ?>
                                <li style="visibility: hidden;">
                                    <figure>
                                        <a class="aa-product-img" href="#">
                                            <div class="img"></div>
                                        </a>
                                    </figure>                        
                                </li>
                            <?php } ?>
                        <?php } ?>
                      </ul>
                    </div>
                </div>
                <?php foreach ($products as $product){ ?>
                  <?php include __DIR__.'/home/product-modal.php'; ?>
                <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Products section -->
<?php } else { ?>
    <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>NO SE ENCONTRARON RESULTADOS :(</h3>
            <p>Sin embargo, estos son algunos de los productos que te pueden interesar</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
  <?php include __DIR__.'/home/populars.php'; ?>
<?php } ?>