<?php
	require_once('api/util/products.php');
	$PRODUCTS_X_CATEGORIES = getProductsXCategories();
	$GROUPS = getProductsXGroups($PRODUCTS_X_CATEGORIES);
?>
	<!-- menu -->
	<section id="menu">
		<div class="container">
			<div class="menu-area">
				<!-- Navbar -->
				<div class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Navegación</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="navbar-collapse collapse">
						<!-- Left nav -->
						<ul class="nav navbar-nav">
							<li><a href="/">Inicio</a></li>
							<li><a href="#">Categorías<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php 
										foreach ($PRODUCTS_X_CATEGORIES as $category => $products){ ?>
											<li><a href="/index.php?page=product-list&category=<?=$category?>"><?=$category?></a></li>
										<?php  
									} ?>
								</ul>
							</li>
							<li><a href="#">Grupos<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php 
										foreach ($GROUPS as $popular => $products){  ?>
											<li><a href="/index.php?page=product-list&group=<?=$popular?>"><?=$popular?></a></li>
										<?php  
									} ?>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
	</section>
	<!-- / menu -->