<li>
	<figure>
	<a class="aa-product-img" href="#"><img src="<?= $product->IMG_URL  ?>" alt="<?=$product->NOMBRE?> img"></a>
	<a class="aa-add-card-btn product-<?=$product->ID?>"href="#"><span class="fa fa-shopping-cart"></span>Agregar</a>
		<figcaption>
		<h4 class="aa-product-title"><a href="#"><?=$product->NOMBRE?></a></h4>
		<span class="aa-product-price"><?=CURRENCY_LABEL." $product->PRECIO"?></span>
		<?php if($product->BADGE=="aa-sale"){ ?>
			<span class="aa-product-price"><del><?=CURRENCY_LABEL." $product->ULTIMO_PRECIO"?></del></span>
		<?php } ?>
	</figcaption>
	</figure>                        
	<div class="aa-product-hvr-content">
	<a href="#" data-toggle="tooltip" data-placement="top" title="Agregar a favoritos">
		<span class="fa fa-heart-o"></span>
	</a>
	<a href="#" data-toggle2="tooltip" 
		data-placement="top" 
		title="Visualizar" 
		data-toggle="modal" 
		data-target="#quick-view-modal-<?=$MODAL_TARGET?>-<?=$product->ID?>">
		<span class="fa fa-search"></span>
	</a>
	</div>
	<!-- product badge -->
	<?php if($product->BADGE){ ?>
		<span class="aa-badge <?=$product->BADGE?>" href="#">
		<?php
			switch ($product->BADGE) {
			case 'aa-sale': 
		?>
				OFERTA
		<?php   break;
			case 'aa-sold-out': ?>
				AGOTADO
		<?php   break;
			case 'aa-hot': ?>
				NUEVO
		<?php   break;
			}
		?></span>
	<?php } ?>
</li>