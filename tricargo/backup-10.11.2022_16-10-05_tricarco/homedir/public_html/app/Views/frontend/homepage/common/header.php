<?php
	$main_nav =  get_menu(['language' => $language, 'keyword' => 'main-menu', 'output' => 'array']);
	$model = new App\Models\AutoloadModel();
?>
<?php $actual_link = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
<?php
	$owlInit = [
		'margin' => 0,
	    'nav' => true,
	    'autoplay' => true,
	    'smartSpeed' => 1000,
	    'autoplayTimeout' => 5000,
	    'dots' => false,
	    'loop' => true,
	    'items' => 1
	]
 ?>
<header class="header " >
	<div class="uk-visible-large">
		<header id="header" style="width: 100%">
			<div class="top-header">
				<div class="uk-container uk-container-center">
					<div class="company-name"><?php echo $general['homepage_company'] ?></div>
					<div class="company-slogan"><?php echo $general['homepage_slogan'] ?></div>
				</div>
			</div>
			<div class="header-top-va">
				<div class="pt10 pb10">
					<div class="uk-container uk-container-center ">
						<div class="uk-flex uk-flex-middle uk-flex-space-between mb10">
							<div class="wrap-flex">
								<div class="hd-logo">
									<?php echo logo() ?>
								</div>
							</div>
							<div class="wrap-flex">
								<div class="uk-flex uk-flex-middle">
									<div class="sp-hd mr10">
										Hỗ trợ khách hàng: <a href="" title="Hỗ trợ khách hàng"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/chat_fill.svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #D8D8D8; color: #D8D8D8;"><path d="M4 4h16a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-9l-4 4v-4H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" fill-rule="evenodd"></path></svg> Trò chuyện trực tiếp</a>
									</div>
									<span class="or-hd">hoặc là</span>
									<div class="sp-hd ml10">
										<a href="tel:<?php echo $general['contact_hotline'] ?>" title="Hỗ trợ khách hàng"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/phone_fill.svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #D8D8D8; color: #D8D8D8;"><path d="M8.427 8.502l.707-.707a1.959 1.959 0 0 0 0-2.828l-.707-.707a1.971 1.971 0 0 0-2.828 0l-.708.707s-2.828 2.828 0 5.657l8.486 8.485c2.828 2.828 5.657 0 5.657 0l.707-.707a1.959 1.959 0 0 0 0-2.828l-.707-.707a1.959 1.959 0 0 0-2.829 0l-.707.707z" fill-rule="evenodd"></path></svg> <?php echo $general['contact_hotline'] ?></a>
									</div>
								</div>
							</div>
						</div>
						<nav class="main-nav">
							<ul class="menu">
								<?php if(isset($main_nav['data']) && is_array($main_nav['data']) && count($main_nav['data'])){
									foreach ($main_nav['data'] as $key => $value) {
								?>
									<li class="<?php echo (isset($value['children']) && is_array($value['children']) && count($value['children'])) ? 'submenu' : '' ?>">
										<a href="<?php echo $value['canonical'] ?>"><?php echo $value['title'] ?></a>
										<?php if(isset($value['children']) && is_array($value['children']) && count($value['children'])){ ?>
											<ul>
												<?php foreach ($value['children'] as $keyChild => $valueChild) { ?>
													<li style="text-transform: capitalize;" class="<?php echo (isset($valueChild['children']) && is_array($valueChild['children']) && count($valueChild['children'])) ? 'submenu submenu-2' : '' ?>">
														<a href="<?php echo $valueChild['canonical'] ?>"><?php echo $valueChild['title'] ?></a>
														<?php if(isset($valueChild['children']) && is_array($valueChild['children']) && count($valueChild['children'])){ ?>
															<ul>
																<?php foreach ($valueChild['children'] as $keyChildren => $valueChildren) { ?>
																	<li style="text-transform: capitalize;" >
																		<a href="<?php echo $valueChildren['canonical'] ?>"><?php echo $valueChildren['title'] ?></a>
																	</li>
																<?php } ?>
															</ul>
														<?php } ?>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
									</li>
								<?php }} ?>
							</ul>
						</nav>
					</div>
				</div>
				<div class="uk-container uk-container-center">
					<hr class="line-hd">
				</div>
				<div class="pt10 pb10">
					<div class="uk-container uk-container-center ">
						<div class="uk-flex uk-flex-middle uk-flex-space-between">
							<div class="wrap-flex">
								<div class="header-search hs-simple">
									<form action="<?php echo site_url('tim-kiem'.HTSUFFIX) ?>" class="input-wrapper">
										<input type="text" class="form-control" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" name="keyword" autocomplete="off" placeholder="Tìm kiếm..." required="">
										<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
										</button>
									</form>
								</div>
							</div>
							<div class="wrap-flex">
								<div class="cart-offcanvas dropdown cart-dropdown">
									<div class="abc-cal-header-cart cart-toggle loadding-cart">
										<div class="abc-header-cart-wrap">
											<span class="ab-icon">
												<span>
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/cart.svg" xmlns:xlink="http://www.w3.org/1999/xlink" ><path d="M1.906 3h3l3 12-1 2s-.486 1 1 1h13v-1H8.912c-.006 0-1.006 0-.512-.988-.006-.02.506-1.012.506-1.012l12-1 1-6c.335-2.007.335-2-1-2h-13v1h13l-1 6-11 1-3-12h-4v1zm6.5 16a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm11 0a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5z" fill-rule="evenodd"></path></svg>
												</span>
											</span>
										</div>
										<strong class="abc-cal-header-cart-text">Giỏ hàng</strong>
									</div>
									<div class="cart-overlay"></div>
									<!-- End Cart Toggle -->
									<div class="dropdown-box">
										<div class="cart-header">
											<h4 class="cart-title">Giỏ hàng</h4>
											<a class="btn btn-dark btn-link btn-icon-right btn-close">Đóng<i class="d-icon-arrow-right"></i><span class="sr-only">Giỏ hàng</span></a>
										</div>
										<div class="products scrollable list-cart__loadding">
											<p style="margin-top: 25px;">Không có sản phẩm nào trong giỏ hàng!</p>
										</div>
									</div>
									<!-- End Dropdown Box -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>

	<div class="sticky-content-wrapper header-mobile-va uk-hidden-large">
		<div class="header-middle sticky-header fix-top sticky-content">
			<div class="container">
				<div class="header-left uk-flex uk-flex-middle uk-flex-space-between">
					<a href="#" class="mobile-menu-toggle" onclick="return false;">
						<i class="d-icon-bars2"></i>
					</a>
					<a href="/" class="logo">
						<img src="<?php echo $general['homepage_logo'] ?>" alt="<?php echo $general['homepage_logo'] ?>" width="153" height="44">
					</a>
					<div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
						<a class="cart-toggle label-block link loadding-cart">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/cart.svg" xmlns:xlink="http://www.w3.org/1999/xlink" ><path d="M1.906 3h3l3 12-1 2s-.486 1 1 1h13v-1H8.912c-.006 0-1.006 0-.512-.988-.006-.02.506-1.012.506-1.012l12-1 1-6c.335-2.007.335-2-1-2h-13v1h13l-1 6-11 1-3-12h-4v1zm6.5 16a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm11 0a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5z" fill-rule="evenodd"></path></svg>
						</a>
						<div class="cart-overlay"></div>
						<!-- End Cart Toggle -->
						<div class="dropdown-box">
							<div class="cart-header">
								<h4 class="cart-title">Giỏ hàng</h4>
								<a class="btn btn-dark btn-link btn-icon-right btn-close">Đóng<i class="d-icon-arrow-right"></i><span class="sr-only">Giỏ hàng</span></a>
							</div>
							<div class="products scrollable list-cart__loadding">
								<p style="margin-top: 25px;">Không có sản phẩm nào trong giỏ hàng!</p>
							</div>
						</div>
						<!-- End Dropdown Box -->
					</div>
				</div>
			</div>
		</div>
		<div class="uk-container uk-container-center">
			<div class="header-search hs-simple">
				<form action="<?php echo site_url('tim-kiem'.HTSUFFIX) ?>" class="input-wrapper">
					<input type="text" class="form-control" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" name="keyword" autocomplete="off" placeholder="Tìm kiếm..." required="">
					<button class="btn btn-search" type="submit">
					<i class="d-icon-search"></i>
					</button>
				</form>
			</div>
		</div>
	</div>

</header>

<!-- MobileMenu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay">
    </div>
    <!-- End of Overlay -->
    <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
    <!-- End of CloseButton -->
    <div class="mobile-menu-container scrollable">

        <form action="<?php echo site_url('tim-kiem'.HTSUFFIX) ?>" class="input-wrapper">
            <input type="text" class="form-control" name="keyword" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>" autocomplete="off" placeholder="Tìm kiếm..." required />
            <button class="btn btn-search" type="submit">
            <i class="d-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <ul class="mobile-menu mmenu-anim">
        	<?php if(isset($main_nav['data']) && is_array($main_nav['data']) && count($main_nav['data'])){
				foreach ($main_nav['data'] as $key => $value) {
			?>
	            <li>
	                <a <?php echo (isset($value['children']) && is_array($value['children']) && count($value['children'])) ? 'class="show-menu-level2" data-show="1"' : '' ?> href="<?php echo $value['canonical'] ?>" ><?php echo $value['title'] ?></a>
	                <?php if(isset($value['children']) && is_array($value['children']) && count($value['children'])){ ?>
						<ul>
							<?php foreach ($value['children'] as $keyChild => $valueChild) { ?>
								<li >
									<a href="<?php echo $valueChild['canonical'] ?>" <?php echo (isset($valueChild['children']) && is_array($valueChild['children']) && count($valueChild['children'])) ? 'class="show-menu-level3" data-show="1"' : '' ?>><?php echo $valueChild['title'] ?></a>
									<?php if(isset($valueChild['children']) && is_array($valueChild['children']) && count($valueChild['children'])){ ?>
										<ul>
											<?php foreach ($valueChild['children'] as $keyChild_3 => $valueChild_3) { ?>
												<li >
													<a href="<?php echo $valueChild_3['canonical'] ?>" ><?php echo $valueChild_3['title'] ?></a>
												</li>
											<?php } ?>
										</ul>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					<?php } ?>
	            </li>
	        <?php }} ?>
        </ul>
    </div>
</div>

<script>
	if($('.js_dt_language').length  > 0){
		$('.js_dt_language a').on('click', function(){
			let language = $(this).attr('data-language');
			$.post('ajax/frontend/dashboard/change_language',{
				language : language
			}, function(data){
				// console.log(data);
				// return false;
                location.reload();
            });
			return false;
		});
	}
</script>
