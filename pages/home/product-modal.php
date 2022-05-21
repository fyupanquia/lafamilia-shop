<!-- Visualizar modal -->
<div class="modal fade" id="quick-view-modal-<?=$MODAL_TARGET?>-<?=$product->ID?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="row">
        <!-- Modal view slider -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="aa-product-view-slider">
            <div class="simpleLens-gallery-container" id="demo-1">
                <div class="simpleLens-container">
                    <div class="simpleLens-big-image-container">
                        <a class="simpleLens-lens-image" data-lens-image="<?=$product->IMG_URL?>">
                            <img src="<?=$product->IMG_URL?>" class="simpleLens-big-image">
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal view content -->
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="aa-product-view-content">
            <h3><?=$product->NOMBRE?></h3>
            <div class="aa-price-block">
                <span class="aa-product-view-price"><?=CURRENCY_LABEL." $product->PRECIO"?></span>
                <p class="aa-product-avilability"><span>En stock</span></p>
            </div>
            <p><?=$product->DESCRIPCION?></p>
            <div class="aa-prod-quantity">
                <form action="">
                    <select name="quantity-<?=$product->ID?>">
                        <option value="1" selected="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </form>
                <p class="aa-prod-category">
                Categoria: <a href="#"><?=$product->CATEGORIA?></a>
                </p>
            </div>
            <div class="aa-prod-view-bottom">
                <a href="#" class="aa-add-to-cart-btn product-<?=$product->ID?>"><span class="fa fa-shopping-cart"></span>Agregar</a>
                <!-- a href="#" class="aa-add-to-cart-btn">Ver detalles</a-->
            </div>
            </div>
        </div>
        </div>
    </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- / Visualizar modal -->