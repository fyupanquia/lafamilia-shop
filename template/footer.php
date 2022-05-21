    <!-- footer -->  
    <footer id="aa-footer">
      <!-- footer bottom -->
      <div class="aa-footer-top">
      <div class="container">
          <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-top-area">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <h3>Categorías</h3>
                    <ul class="aa-footer-nav">
                      <?php 
                      foreach ($PRODUCTS_X_CATEGORIES as $category => $products){ ?>
                        <li><a href="/index.php?page=product-list&category=<?=$category?>"><?=$category?></a></li>
                      <?php  
                      } ?>
                    </ul>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                      <h3>Grupos</h3>
                      <ul class="aa-footer-nav">
                        <?php 
                          foreach ($GROUPS as $popular => $products){  ?>
                            <li><a href="/index.php?page=product-list&group=<?=$popular?>"><?=$popular?></a></li>
                          <?php  
                        } ?>
                      </ul>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h3></h3>
                      <ul class="aa-footer-nav">
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-6">
                  <div class="aa-footer-widget">
                    <div class="aa-footer-widget">
                      <h3>Contáctanos</h3>
                      <address>
                        <p> Jr. Los Álamos 525</p>
                        <p><span class="fa fa-phone"></span>+01 22-4589</p>
                        <p><span class="fa fa-envelope"></span>contacto@lafamilia.com</p>
                      </address>
                      <div class="aa-footer-social">
                        <a href="#"><span class="fa fa-facebook"></span></a>
                        <a href="#"><span class="fa fa-twitter"></span></a>
                        <a href="#"><span class="fa fa-google-plus"></span></a>
                        <a href="#"><span class="fa fa-youtube"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <!-- footer-bottom -->
      <div class="aa-footer-bottom">
        <div class="container">
          <div class="row">
          <div class="col-md-12">
            <div class="aa-footer-bottom-area">
              <p>Diseñado por <a href="#">Grupo 5</a></p>
              <div class="aa-footer-payment">
                <span class="fa fa-cc-mastercard"></span>
                <span class="fa fa-cc-visa"></span>
                <span class="fa fa-paypal"></span>
                <span class="fa fa-cc-discover"></span>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->