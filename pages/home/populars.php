<?php
  $MODAL_TARGET = "GROUPS";
?>
<!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <?php
                  $igroups = 0;
                  foreach ($GROUPS as $popular => $products){ ?>
                      <li class="<?=$igroups==0 ? "in active": "" ?>"><a href="#<?=$popular?>" data-toggle="tab"><?=$popular?></a></li>
                    <?php 
                    $igroups += 1;
                  } ?>               
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <?php
                  $igroups = 0;
                  foreach ($GROUPS as $popular => $products){ ?>
                      <?php include __DIR__.'/popular.php'; ?>
                    <?php 
                    $igroups += 1;
                  } ?>    
              </div>
              <?php 
                foreach ($GROUPS as $popular => $products){ ?>
                <?php foreach ($products as $product){ ?>
                  <?php include __DIR__.'/product-modal.php'; ?>
                <?php }?>
              <?php }?>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
 <!-- / popular section -->