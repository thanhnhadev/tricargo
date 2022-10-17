<?php
    $model = new App\Models\AutoloadModel();
    $category = $model->_get_where([
        'select' => 'tb1.id, tb2.title, tb2.canonical, tb1.image',
        'table' => 'product_catalogue as tb1',
        'join' => [
            ['product_translate as tb2','tb2.objectid = tb1.id AND tb2.module = "product_catalogue"','inner']
        ],
        'where' => ['publish' => 1,'tb1.deleted_at' => 0],
        'order_by' => 'order desc, id desc'
    ], TRUE);

?>
<?php
	$owlInit = [
		'margin' => 10,
	    'lazyload' => true,
	    'nav' => true,
	    'autoplay' => true,
	    'smartSpeed' => 1000,
	    'autoplayTimeout' => 3000,
	    'dots' => true,
	    'loop' => true,
	    'responsive' => array(
			0 => array(
				'items' => 1,
			),
			768 => array(
				'items' => 2,
			),
			960 => array(
				'items' => 3,
			),

		)
	]
 ?>
<?php $banner = get_slide(['keyword' => 'slide-home' , 'language' => $language, ]); ?>
<section id="body" class="mt5 mb5">
	<section class="uk-margin-bottom index-slide mb20">
		<div class="uk-container uk-container-center">
			<?php if(isset($banner) && is_array($banner) && count($banner)){ ?>
			<div class="uk-slidenav-position" data-uk-slideshow="{animation: 'scroll', autoplay: true, autoplayInterval: 5000}">
				<ul class="uk-slideshow">
					<?php foreach ($banner as $value) { ?>
					<li><a href="<?php echo $value['canonical'] ?>" title="<?php echo $value['title'] ?>" class="uk-display-block img-cover" ><img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" class="slide-img uk-width-1-1 "></a></li>
					<?php } ?>
				</ul>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
				<a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
				<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center mb20">
					<?php foreach ($banner as $key =>  $value) { ?>
					<li data-uk-slideshow-item="<?php echo $key ?>"><a href=""></a></li>
					<?php } ?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</section>
	<section class="wrap-product-home">
		<div class="uk-container uk-container-center">
			<div class="uk-grid uk-grid-medium uk-clearfix">
				<div class="uk-width-large-1-4">
					<?php echo view('frontend/homepage/common/aside') ?>
				</div>
				<div class="uk-width-large-3-4">
					<div class="wrap-grid">
						<?php if(isset($category) && is_array($category) && count($category)){ ?>
						<div class="list-category">
							<div class="uk-grid uk-grid-small">
								<?php foreach($category as $key => $val){ ?>
								<div class="uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-6">
									<div class="category-item mb10">
										<a href="<?php echo write_url($val['canonical']) ?>" class="image img-scaledown"><img src="<?php echo $val['image'] ?>" alt="<?php echo $val['title'] ?>"></a>
										<h3 class="name"><a href="<?php echo write_url($val['canonical']) ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a></h3>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="cal-home-article mb20">
							<h2 class="cal-home-list-title">Phụ tùng và phụ kiện chính hãng Honda phổ biến</h2>
							<?php if(isset($brandCatalogueList) && is_array($brandCatalogueList) && count($brandCatalogueList)){ ?>
								<ul class="cal-home-list pl0">
									<?php foreach ($brandCatalogueList as $valueCat) { ?>
										<li class="home-part-list">
											<div class="home-part-head home-part-head-wrap">
												<div class="uk-flex uk-flex-middle mb10">
													<a href="<?php echo $valueCat['canonical'].HTSUFFIX ?>" class="home-part-head-category"><?php echo $valueCat['title'] ?></a>
													<?php if(count($valueCat['data']) == 9){ ?>
														<a href="<?php echo $valueCat['canonical'].HTSUFFIX ?>" class="home-part-head-show-all">Xem thêm ></a>
													<?php } ?>
												</div>
											</div>
											<ul class="home-part-list-content">
												<?php if(isset($valueCat['data']) && is_array($valueCat['data']) && count($valueCat['data'])){
													foreach ($valueCat['data'] as $key => $value) {
														if($key == 8) break;
												?>
													<li>
														<a href="<?php echo $value['canonical'].HTSUFFIX ?>">
															<img alt="<?php echo $value['title'] ?>" src="<?php echo (!empty($value['image']) ? $value['image'] : $general['homepage_logo']) ?>" class="ab-lazy-image home-part-list-img" loading="lazy" style="opacity: 1;">
														</a>
														<a class="ab-ellipsis ab-ellipsis-line3 ab-ellipsis-m-line3 home-part-list-link" href="<?php echo $value['canonical'].HTSUFFIX ?>"><?php echo $value['title'] ?></a>
													</li>
												<?php }} ?>
											</ul>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					    <div class="about-honda">
					        <h2 class="mc_title">Về Honda</h2>
					        <div class="honda-desc">
					            Honda được thành lập bởi Soichiro Honda vào năm 1948 để sản xuất xe máy và xe tay ga. 8 năm sau khi thành lập, công ty bắt đầu sản xuất ô tô, chủ yếu dành cho thị trường Nhật Bản. Sau hai năm nữa, Honda tìm đường vào thị trường Mỹ với những mẫu xe cỡ nhỏ vốn chỉ phổ biến ở Nhật Bản. Trong những năm qua, công ty luôn nỗ lực phát triển các công nghệ tiên tiến hàng đầu. Mãi đến năm 1972, Honda mới bắt đầu nổi tiếng với người tiêu dùng Mỹ với sự ra đời của Civic. Động cơ CVCC của Civic là động cơ đầu tiên vượt qua tiêu chuẩn Xe phát thải thấp mà không có bộ chuyển đổi xúc tác trong cuộc khủng hoảng năng lượng và nó đã giành được Giải thưởng Xe của năm năm 1973 do tạp chí Motor Fan tài trợ, đồng thời nó cũng đã vượt qua EPA. Với sự ra đời của Accord vào năm 1976, Phụ tùng chính hãng OEM của Honda sẽ tối đa hóa hiệu suất cho chiếc xe của bạn. Tìm các bộ phận chính xác cho chiếc xe của bạn từ danh mục trực tuyến của chúng tôi.
					        </div>
					    </div>
					    <div class="ab-link-list cal-home-link">
						    <div class="ab-link-list-title ab-link-list-divider">
						        <h2 class="cal-home-link-title">Các mẫu xe Honda nổi bật</h2>
						        <span class="ab-link-list-icon">+</span>
						    </div>
						    <div class="ab-link-list-body va-ab-link-list-body">
						        <div class="ab-link-list-content ab-link-list-col4">
						        	<?php if(isset($productCatalogueList) && is_array($productCatalogueList) && count($productCatalogueList)){
						        		foreach ($productCatalogueList as $value) {
						        	 ?>
							            <a href="<?php echo $value['canonical'].HTSUFFIX ?>" target="_self"><?php echo $value['title'] ?> </a>
							        <?php }} ?>
						        </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</section>
