<div class="blog-post mb20">
    <div class="post-product">
        <article class="post post-frame overlay-zoom">
            <figure class="post-media  " style="background-color: #e9e9e9;">
                <div class="va-thumb-1-1">
                    <a href="<?php echo $value['canonical'].HTSUFFIX ?>">
                        <img class="lazy" data-src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" width="340" height="206" style="background-color: #919fbc;" />
                    </a>
                </div>
                <?php /*<div class="post-calendar">
                    <span class="post-day"><?php echo date('d', strtotime($value['created_at'])) ?></span>
                    <span class="post-month">Tháng <?php echo date('m', strtotime($value['created_at'])) ?></span>
                </div>*/ ?>
            </figure>
            <div class="post-details home-title__detail">
                <h4 class="post-title home-title__blog"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" class="uk-display-block uk-text-center limit-line-2" style="height: 40px;"><?php echo $value['title'] ?></a></h4>
                <div class="product-price uk-text-center">
                    <label class="price"><?php echo (isset($value['price_promotion']) && $value['price_promotion'] != 0 ? number_format($value['price'], 0, ',', '.').'đ' : '') ?></label>
                    <span class="price"><?php echo (isset($value['price_promotion']) && $value['price_promotion'] != 0 ? number_format($value['price_promotion'], 0, ',', '.').'đ' : (isset($value['price']) && $value['price'] != 0 ? number_format($value['price'], 0, ',', '.').'đ' : 'Liên hệ')) ?></span>
                </div>
            </div>
        </article>
    </div>
</div>