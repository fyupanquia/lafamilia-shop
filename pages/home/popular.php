<!-- Start men popular category -->
<div class="tab-pane fade <?=$igroups==0 ? "in active": "" ?>" id="<?=$popular?>">
  <ul class="aa-product-catg aa-popular-slider">
      <?php foreach ($products as $product){ ?>
        <?php include 'product.php'; ?>
      <?php } ?> 
    <!-- start single product item -->
    <li></li>                                                                                
  </ul>
  <a class="aa-browse-btn" href="/index.php?page=product-list&group=<?=$popular?>">Ver más<span class="fa fa-long-arrow-right"></span></a>
</div>
<!-- / popular product category -->