<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?=base_url('/e-shop/css/bootstrap.min.css')?>" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="<?=base_url('/e-shop/css/slick.css')?>" />
	<link type="text/css" rel="stylesheet" href="<?=base_url('/e-shop/css/slick-theme.css')?>" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="<?=base_url('/e-shop/css/nouislider.min.css')?>" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?=base_url('/e-shop/css/font-awesome.min.css')?>">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url('/e-shop/css/style.css')?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to E-shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<?php
                            foreach ($menu_header as $menu_header){
                        ?>
                                <?php if(count($menu_header->sub_menu) > 0){ ?>
                                    <li class="dropdown default-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?=$menu_header->name?> <i class="fa fa-caret-down"></i></a>
                                        <ul class="custom-menu">
                                            <?php
                                                foreach ($menu_header->sub_menu as $sub_menu){
                                            ?>
                                                    <li><a href=""><?=$sub_menu->name?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                <?php } else {?>
                                    <li><a href="#"><?=$menu_header->name?></a></li>
                                <?php } ?>
                        <?php } ?>



					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<?php foreach ($menu_side_c as $c){ ?>
                                    <option value="<?=$c->id?>"><?=$c->name?></option>
                                <?php }?>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">3</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>35.20$</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="./img/thumb-product01.jpg" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">$32.50 <span class="qty">x3</span></h3>
												<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
											</div>
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
									</div>
									<div class="shopping-cart-btns">
										<button class="main-btn">View Cart</button>
										<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav">
					<span class="category-header">Categories  <i class="fa fa-list"></i></span>
					<ul class="category-list">

                        <?php foreach ($menu_side_c as $menu_side_c){ ?>
                            <?php if(count($menu_side_c->sub_menu) > 0){ ?>
                                <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?=$menu_side_c->name?><i class="fa fa-angle-right"></i></a>
                                    <div class="custom-menu">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-links">
                                                    <li>
                                                        <h3 class="list-links-title">Categories</h3>
                                                    </li>
                                                    <?php
                                                        $param = 0;
                                                        foreach ($menu_side_c->sub_menu as $sub_menu){
                                                    ?>

                                                            <li><a href="#"><?=$sub_menu->name?></a></li>
                                                   <?php } ?>

                                                </ul>
                                            </div>

                                            <div class="col-md-4 hidden-sm hidden-xs">
                                                <a class="banner banner-2" href="#">
                                                    <img src="<?=base_url('/e-shop/img/banner04.jpg')?>" alt="">
                                                    <div class="banner-caption">
                                                        <h3 class="white-color">NEW<br>COLLECTION</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } else {?>
                                <li><a href="#"><?=$menu_side_c->name?></a></li>
                             <?php } ?>

                        <?php } ?>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
                        <?php
                            foreach ($menu_behind_c as $menu_behind_c){
                        ?>
                            <?php
                                if(count($menu_behind_c->sub_menu) > 0){
                             ?>
                                    <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Women <i class="fa fa-caret-down"></i></a>
                                        <div class="custom-menu">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul class="list-links">
                                                        <li>
                                                            <h3 class="list-links-title">Categories</h3>
                                                        </li>

                                                        <li><a href="#">Women’s Clothing</a></li>
                                                    </ul>
                                                    <hr class="hidden-md hidden-lg">
                                                </div>
                                            </div>
                                            <div class="row hidden-sm hidden-xs">
                                                <div class="col-md-12">
                                                    <hr>
                                                    <a class="banner banner-1" href="#">
                                                        <img src="<?=base_url('/e-shop/img/banner05.jpg')?>" alt="">
                                                        <div class="banner-caption text-center">
                                                            <h2 class="white-color">NEW COLLECTION</h2>
                                                            <h3 class="white-color font-weak">HOT DEAL</h3>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                            <?php } else {?>
                                    <li><a href="#"><?=$menu_behind_c->name?></a></li>
                              <?php }?>
                        <?php }?>


					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<?php
                        $no = 0;
                        foreach ($banner as $b){
                            $no++;
                            if($no <= 3){
                    ?>
                    <!-- banner -->
					<div class="banner banner-1">
						<img src="<?=base_url('/upload/'.$b->image)?>" alt="Tidak ada">
						<div class="banner-caption">
							<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak"><?=$b->name?></span></h1>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
					<!-- /banner -->

				    <?php }} ?>
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <?php
                $no = 0;
                foreach ($banner as $b){
                    $no++;
                    if($no <= 3){
                    ?>
                    <!-- banner -->
                    <div class="col-md-4 col-sm-6">
                        <a class="banner banner-1" href="#">
                            <img src="<?=base_url('/upload/'.$b->image)?>" alt="Tidak ada">
                            <div class="banner-caption text-center">
                                <h2 class="white-color"><?=$b->name?></h2>
                            </div>
                        </a>
                    </div>
                    <!-- /banner -->

                <?php }} ?>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?=base_url('/upload/'.$banner_1->image)?>" alt="Tidak ada">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
                            <?php
                                foreach ($barang as $b){
                            ?>
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span>New</span>
										<span class="sale"><?=$b->promo->discount?>%</span>
									</div>
									<ul class="product-countdown">
										<li><span>00 H</span></li>
										<li><span>00 M</span></li>
										<li><span>00 S</span></li>
									</ul>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                    <?php
                                        $img = $b->images != null ? json_decode($b->images) : [null];
                                    ?>
									<img src="<?=base_url('/upload/'.$img[0])?>" alt="Gambar tidak di temukan">
								</div>
								<div class="product-body">
									<h3 class="product-price"><?php
                                            $price   = $b->price;
                                            $dis = $price;
                                            if($b->promo_id != null) {
                                                $dis = $b->price - ($b->price * $b->promo->discount / 100);
                                            }
                                            echo "Rp. ".number_format($dis);
                                        ?>&nbsp; <del class="product-old-price" style="font-size: 12px !important;"> Rp. <?=number_format($b->price)?></del></h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#"><?=$b->name?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
                            <?php } ?>
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Deals Of The Day</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single product-hot">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">-20%</span>
							</div>
							<ul class="product-countdown">
								<li><span>00 H</span></li>
								<li><span>00 M</span></li>
								<li><span>00 S</span></li>
							</ul>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="<?=base_url('/e-shop/img/product01.jpg')?>" alt="Tidak ada">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->
                            <?php
                                foreach ($barang as $b){
                            ?>
							<div class="product product-single">
								<div class="product-thumb">
                                    <?php if($b->promo_id != null){ ?>
                                    <div class="product-label">
                                        <span class="sale"><?=$b->promo->discount?>%</span>
                                    </div>
                                    <?php } ?>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                    <?php $img = $b->images != null ? json_decode($b->images) : [null]; ?>
									<img src="<?=base_url('/upload/'.$img[0])?>" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">
                                        <?php
                                        $price   = $b->price;
                                        $dis = $price;
                                        if($b->promo != null) {
                                            $dis = $b->price - ($b->price * $b->promo->discount / 100);
                                        }
                                        echo "Rp. ".number_format($dis);
                                        ?>
                                    </h3>
									<div class="product-rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o empty"></i>
									</div>
									<h2 class="product-name"><a href="#"><?=$b->name?></a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
                            <?php } ?>

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
                <?php
                    $no = 0;
                    foreach ($banner as $bn){
                        $no= $no + 1;
                        if($no == 1){
                ?>
                            <!-- banner -->
                            <div class="col-md-8">
                                <div class="banner banner-1">
                                    <img src="<?=base_url('/upload/'.$bn->image)?>" alt="">
                                    <div class="banner-caption text-center">
                                        <h1 class="primary-color"><?=$bn->name?><br><span class="white-color font-weak">Up to 50% OFF</span></h1>
                                        <button class="primary-btn">Shop Now</button>
                                    </div>
                                </div>
                            </div>
                            <?php } elseif($no>1 && $no <=3) {?>
                            <div class="col-md-4 col-sm-6">
                                <a class="banner banner-1" href="#">
                                    <img src="<?=base_url('/upload/'.$bn->image)?>" alt="">
                                    <div class="banner-caption text-center">
                                        <h2 class="white-color"><?=$bn->name?></h2>
                                    </div>
                                </a>
                            </div>

                <?php } ?>
                <?php } ?>
				<!-- /banner -->

				<!-- banner -->

				<!-- /banner -->

				<!-- banner -->
<!--				<div class="col-md-4 col-sm-6">-->
<!--					<a class="banner banner-1" href="#">-->
<!--						<img src="./img/banner12.jpg" alt="">-->
<!--						<div class="banner-caption text-center">-->
<!--							<h2 class="white-color">NEW COLLECTION</h2>-->
<!--						</div>-->
<!--					</a>-->
<!--				</div>-->
				<!-- /banner -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Latest Products</h2>
					</div>
				</div>
				<!-- section title -->

                <?php foreach ($barang as $b){ ?>
                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">
                                <span>New</span>
                                <?php if($b->promo_id != null){ ?>
                                    <div class="product-label">
                                        <span class="sale"><?=$b->promo->discount?>%</span>
                                    </div>
                                <?php } ?>
                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <?php $img = $b->images != null  ? json_decode($b->images) : ['null'] ?>
                                <img src="<?=base_url('/upload/'.$img[0])?>" alt="Gambar tidak ada">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price">
                                    <?php
                                        $price   = $b->price;
                                        $dis = $price;
                                        if($b->promo_id != null) {
                                            $dis = $b->price - ($b->price * $b->promo->discount / 100);
                                        }
                                        echo "Rp. ".number_format($dis);
                                    ?>
                                </h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#"><?=$b->name?></a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                <?php } ?>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="<?=base_url('/upload/'.$banner_3->image)?>" alt="Gambar tidak ditemukan">
						<div class="banner-caption">
							<h2 class="white-color"><?=$b->name?></h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->
                <?php foreach ($barang as $b){ ?>
                    <!-- Product Single -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="product product-single">
                            <div class="product-thumb">

                                <div class="product-label">
                                   <span>New</span>
                                    <?php
                                    if($b->promo_id != null){
                                    ?>

                                    <span class="sale"><?=$b->promo->discount?>%</span>
                                    <?php }?>
                                </div>

                                <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                                <?php $img = $b->images != null ? json_decode($b->images) : ['null'];?>
                                <img src="<?=base_url('/upload/'.$img[0])?>" alt="Gambar tidak ditemukan">
                            </div>
                            <div class="product-body">
                                <h3 class="product-price"> <?php
                                    $price   = $b->price;
                                    $dis = $price;
                                    if($b->promo_id != null) {
                                        $dis = $b->price - ($b->price * $b->promo->discount / 100);
                                    }
                                    echo "Rp. ".number_format($dis);
                                    ?> <del class="product-old-price"><?=number_format($b->price)?></del></h3>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o empty"></i>
                                </div>
                                <h2 class="product-name"><a href="#"><?=$b->name?></a></h2>
                                <div class="product-btns">
                                    <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                                    <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                                    <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Product Single -->
                <?php } ?>
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Picked For You</h2>
					</div>
				</div>
				<!-- section title -->
                <?php foreach ($barang as $b){ ?>
				    <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								<span>New</span>
                                <?php if($b->promo_id != null){ ?>
								    <span class="sale"><?=$b->promo->discount?>%</span>
                                <?php } ?>
							</div>
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
                            <?php $img = $b->images != null ? json_decode($b->images) : ['null']; ?>
							<img src="<?=base_url('/upload/'.$img[0])?>" alt="Gambar tidak ditemukam">
						</div>
						<div class="product-body">
							<h3 class="product-price"><?php
                                $price   = $b->price;
                                $dis = $price;
                                if($b->promo_id != null) {
                                    $dis = $b->price - ($b->price * $b->promo->discount / 100);
                                }
                                echo "Rp. ".number_format($dis);
                                ?>&nbsp;<del class="product-old-price"> <?=number_format($b->price);?></del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#"><?=$b->name?></a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div>
                <?php } ?>
				<!-- /Product Single -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="#">
		            <img src="./img/logo.png" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p><?=$config->detail?></p>

						<!-- footer social -->
						<ul class="footer-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
						<!-- /footer social -->
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">My Account</h3>
						<ul class="list-links">
                            <?php foreach ($my_acount as $m){ ?>
							    <li><a href="#"><?=$m->name?></a></li>
                            <?php } ?>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Shiping & Return</a></li>
							<li><a href="#">Shiping Guide</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Stay Connected</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<form>
							<div class="form-group">
								<input class="input" placeholder="Enter Email Address">
							</div>
							<button class="primary-btn">Join Newslatter</button>
						</form>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="<?=base_url('/e-shop/js/jquery.min.js')?>"></script>
	<script src="<?=base_url('/e-shop/js/bootstrap.min.js')?>"></script>
	<script src="<?=base_url('/e-shop/js/slick.min.js')?>"></script>
	<script src="<?=base_url('/e-shop/js/nouislider.min.js')?>"></script>
	<script src="<?=base_url('/e-shop/js/jquery.zoom.min.js')?>"></script>
	<script src="<?=base_url('/e-shop/js/main.js')?>"></script>

</body>

</html>
