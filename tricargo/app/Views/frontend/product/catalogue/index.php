<section id="body" class="pt30 pb30">
	<section class="index-section uk-margin-large-bottom">
		<div class="uk-container uk-container-center">
			<nav class="breadcrumb-nav fc-breadcrumb mb15">
                <ul class="breadcrumb">
                    <li>Trang chủ</a></li>
                    <?php if(isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)){
                    foreach ($breadcrumb as $value) {
                    ?>
                    <li><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>"><?php echo $value['title'] ?></a></li>
                    <?php }} ?>
                </ul>
            </nav>
            <h1 class="pd-landing-main-title"><?php echo isset($module) && $module == 'brand' ? $object['title'] : $detailCatalogue['title'] ?></h1>
            <div class="desc-prd">
            	<?php echo isset($module) && $module == 'brand' ? base64_decode($object['description']) : base64_decode($detailCatalogue['description'] ) ?>
            </div>
			<h2 class="pd-landing-result"><strong><?php echo $count_product ?></strong> <?php echo isset($module) && $module == 'brand' ? $object['title'] : $detailCatalogue['title'] ?> được tìm thấy</h2>
			<div class="pd-landing-loading ab-loading-container">
                <ul class="pd-ll">
                	<?php if(isset($productList) && is_array($productList) && count($productList)){
                		foreach ($productList as $value) {
                	 ?>
	                    <li class="product">
	                        <div class="pd-ll-left-wrap">
	                            <div class="img-with-rel">
	                                <a href="<?php echo $value['canonical'].HTSUFFIX ?>" class="product-media">
	                                    <img alt="<?php echo $value['title'] ?>" src="<?php echo $value['image'] ?>" class="ab-lazy-image img-with-rel-img" loading="lazy" />
	                                </a>
	                            </div>
	                        </div>
	                        <div class="pd-ll-detail-wrap">
	                        	<div class="product-name">
	                            	<a class="pd-ll-desc-url-n pd-ll-link" href="<?php echo $value['canonical'].HTSUFFIX ?>" class=""><?php echo $value['title'] ?></a>
	                        	</div>
	                            <div class="pd-ll-sub-n">
	                                Mã sản phẩm:<!-- -->
	                                <a class="pd-ll-number-url-n pd-ll-link uk-text-uppercase" href="<?php echo $value['canonical'].HTSUFFIX ?>"><?php echo $value['productid'] ?></a>
	                            </div>
	                            <!-- <button class="vs-btn pd-ll-tip vs-btn-trigger">Vehicle Specific</button> -->
	                            <div class="pd-ll-detail-info">
	                                <span>
	                                    Tên khác:
	                                    <!-- --><?php echo $value['bar_code'] ?>
	                                </span>
	                                <span>
	                                    Thay thế:
	                                    <!-- --><?php echo $value['model'] ?>
	                                </span>
	                            </div>
	                            <div class="">
	                                <div class="pd-ll-mb-price pd-price-wrap product-price">
	                                    <div class="price-section-price new-price">Giá : <?php echo number_format($value['price_promotion'],0,',','.') ?> VND</div>
	                                    <div class="price-section-discount">
	                                        <div class="price-section-retail">
	                                            <span class="price-section-retail-left">Giá gốc: </span><span><?php echo number_format($value['price'],0,',','.') ?> VND</span>
	                                        </div>
	                                        <div class="price-section-save">
	                                            <span class="price-section-save-left">Tiết kiệm: </span><span><?php echo number_format(($value['price'] - $value['price_promotion']),0,',','.') ?> VND</span>
	                                        </div>
	                                    </div>
	                                    <div class="cart-button btn btn-red buy_now " data-sku="SKU_<?php echo $value['id'] ?>" data-id="<?php echo $value['id'] ?>"  title="" aria-label="add to cart">
	                                        <span style="width: 24px; min-width: 24px; max-width: 24px; height: 24px; min-height: 24px; max-height: 24px;" class="ab-icon cart-button-icon">
	                                            <span>
	                                                <svg
	                                                    xmlns="http://www.w3.org/2000/svg"
	                                                    width="24"
	                                                    height="24"
	                                                    viewBox="0 0 24 24"
	                                                    class="injected-svg"
	                                                    data-src="/common-uiasset/svg/cart.svg"
	                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
	                                                    style="fill: white; color: white; width: 24px; height: 24px;"
	                                                >
	                                                    <path
	                                                        d="M1.906 3h3l3 12-1 2s-.486 1 1 1h13v-1H8.912c-.006 0-1.006 0-.512-.988-.006-.02.506-1.012.506-1.012l12-1 1-6c.335-2.007.335-2-1-2h-13v1h13l-1 6-11 1-3-12h-4v1zm6.5 16a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5zm11 0a1.5 1.5 0 1 1-1.5 1.5 1.5 1.5 0 0 1 1.5-1.5z"
	                                                        fill-rule="evenodd"
	                                                    ></path>
	                                                </svg>
	                                            </span>
	                                        </span>
	                                        Thêm giỏ hàng
	                                    </div>
	                                </div>
	                                <div class="pd-ll-more-info-wrap">
	                                    <span class="more-info-button more-info-more-button more-info-visible">More Info</span>
	                                    <div class="html-show-more-content more-info-content more-info-hidden more-info-expand-list" style="height: 84px; max-height: none;">
	                                        <div class="fit-message-title">Mô tả:</div>
	                                        <div class=" fit-message-list list-style-dot" >
	                                            <?php echo base64_decode($value['description']) ?>
	                                        </div>
	                                    </div>
                                        <span class="show-more-list-button">Xem thêm</span>
	                                </div>
	                            </div>
	                        </div>
	                    </li>
	                <?php }} ?>
                </ul>
                <div id="pagination">
                    <?php echo (isset($pagination)) ? $pagination : ''; ?>
                </div>
            </div>
		</div>
	</section>
</section>