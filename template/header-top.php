<!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>+01 22-4589</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <?php if($_SESSION["entity"]) { ?>
                    <!--li><a href="/index.php?page=account">Mi cuenta</a></li-->
                    <!--li class="hidden-xs"><a href="wishlist.html">Deseos</a></li-->
                    <li class="hidden-xs"><a href="/index.php?page=cart">Carrito</a></li>
                    <!--li class="hidden-xs"><a href="checkout.php">Checkout</a></li-->
                    <li><a href="/api/logout.php">Logout</a></li>
                  <?php } else { ?>
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->