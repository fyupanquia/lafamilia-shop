<div class="checkout-left">
<div class="panel-group" id="accordion">
  <?php if (!$_SESSION["entity"]) {
      include __DIR__."/login.php";
  } else {
    include __DIR__."/billing.php";
  }
  ?>
</div>
</div>