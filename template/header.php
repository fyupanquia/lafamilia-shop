<!-- Start header section -->
    <header id="aa-header">
      <?php include 'header-top.php'; ?>
      <!-- start header bottom  -->
      <div class="aa-header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-header-bottom-area">
                <!-- logo  -->
                <div class="aa-logo">
                  <!-- Text based logo -->
                  <a href="/">
                    <span class="fa fa-shopping-cart"></span>
                    <p>Tienda<strong>La Familia</strong>
                      <span>
                      <?php 
                        $entity = $_SESSION["entity"] ? $_SESSION["entity"] : new stdClass;
                        if($entity->NOMBRE){
                          echo "HOLA ".strtoupper(explode(" ", $entity->NOMBRE)[0]). "!";
                        } else {
                          echo "TU SEGUNDO HOGAR";
                        }
                      ?>
                      </span>
                    </p>
                  </a>
                  <!-- img based logo -->
                  <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                </div>
                <!-- / logo  -->
                <?php include 'cart-box.php'; ?>
                <?php include 'search-box.php'; ?>           
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- / header bottom  -->
    </header>
    <!-- / header section -->