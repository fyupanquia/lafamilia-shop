<?php 
  $MODAL_TARGET = "CATEGORIES";
?>
<!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                    <?php 
                    $icategories = 0;
                    foreach ($PRODUCTS_X_CATEGORIES as $category => $products){ ?>
                      <li class="<?=$icategories==0 ? "in active": "" ?>" ><a href="#<?=$category?>" data-toggle="tab"><?=$category?></a></li>
                    <?php  
                    $icategories += 1;
                    } ?>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <?php  
                    $icategories = 0;
                    foreach ($PRODUCTS_X_CATEGORIES as $category => $products){ ?>
                      <div class="tab-pane fade <?=$icategories==0 ? "in active": "" ?>" id="<?=$category?>">
                        <ul class="aa-product-catg">
                          <?php foreach ($products as $product){ ?>
                            <?php include 'product.php' ?>
                          <?php } ?>   
                        </ul>
                        <a class="aa-browse-btn" href="/index.php?page=product-list&category=<?=$category?>">Ver más<span class="fa fa-long-arrow-right"></span></a>
                      </div>
                      <?php 
                      $icategories +=1;
                    } ?>
                  </div>
                  <?php 
                    foreach ($PRODUCTS_X_CATEGORIES as $category => $products){ ?>
                    <?php foreach ($products as $product){ ?>
                      <?php include 'product-modal.php'; ?>
                    <?php }?>
                  <?php }?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->