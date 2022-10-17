<div class="page-wrapper">
    <!-- End Header -->
    <main class="main">
        <div class="page-content">
            <main class="main">
                <nav class="breadcrumb-nav">
                    <div class="container">
                        <ul class="breadcrumb">
                            <li><a href="/"><i class="d-icon-home"></i></a></li>
                            <?php foreach($breadcrumb as $key => $val){ ?>
                            <li><a href="<?php echo $val['canonical'].HTSUFFIX ?>" class="<?php echo $detailCatalogue['canonical'] == $val['canonical'] ? 'active' : '' ?>"><?php echo $val['title'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
                <div class="uk-container uk-container-center">
                    <div class="pt50 pb50">
                        <div class="wrap-text-title mb30">
                            <h2 class="title title-simple text-uppercase title-center uk-position-relative" >
                                <div class="img-scaledown logo-absolute">
                                    <img src="<?php echo $general['homepage_logo'] ?>" alt="logo">
                                </div>
                                <?php echo $detailCatalogue['title'] ?>
                            </h2>
                            <div class="line-under uk-flex uk-flex-middle uk-flex-center">
                                <span class="uk-position-relative img-scaledown">
                                    <img src="public/frontend/resources/img/icon.png" alt="icon" class="">
                                </span>
                            </div>
                        </div>
                        <ul class="nav-filters filter-underline justify-content-center mb30" data-target=".posts">
                            <?php if(isset($child) && is_array($child) && count($child)){
                            foreach ($child as $key => $value) {
                            ?>
                            <li><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>" class="nav-filter <?php echo '/'.$value['canonical'].HTSUFFIX == $_SERVER['REDIRECT_URL'] ? 'active' : '' ?>"><?php echo $value['title'] ?></a></li>
                            <?php }} ?>
                        </ul>
                        <?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
                            <div class="post-grid gallery-xuong mb20 uk-grid uk-grid-collapse uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid="">
                                <?php 
                                    foreach ($articleList as $key => $value) {
                                        if($key == 10) break;
                                ?>
                                    <div class="item">
                                        <div class="va-thumb-1-1">
                                            <a href="<?php echo $value['canonical'].HTSUFFIX ?>" data-fancybox="xuong" class="img-cover image">
                                                <img class="lazy" alt="<?php echo $value['image'] ?>" data-src="<?php echo $value['image'] ?>" width="180" height="180" />
                                            </a>
                                        </div>
                                        <a href="<?php echo $value['canonical'].HTSUFFIX ?>" class="title-xuong"><?php echo $value['title'] ?></a>
                                    </div>
                                <?php }?>
                            </div>
                        <?php } ?>
                        <?php if(isset($articleList) && is_array($articleList) && count($articleList) == $perpage){ ?>
                            <?php if(isset($detailCatalogue['id'])){ ?>
                        <nav class="view-more default readmore-by-va">
                            <button style="display: initial;" data-page="1" data-id="<?php echo $detailCatalogue['id'] ?>" data-canonical="<?php echo $canonical ?>" data-get="<?php echo (isset($_GET) ? base64_encode(json_encode($_GET)) : '') ?>" data-start="<?php echo $perpage ?>" id="view-more-designs">Xem thêm</button>
                        </nav>
                        <?php }} ?>
                        <?php if(base64_decode($detailCatalogue['description']) != '' || base64_decode($detailCatalogue['content']) != ''){ ?>
                            <div class="category-detail default">
                                <div class="css-content">
                                    <?php echo base64_decode($detailCatalogue['description']) ?>
                                    <?php echo base64_decode($detailCatalogue['content']) ?>
                                </div>
                            </div>
                            <div class="category-shadow"></div>
                            <div class="category-button default">
                                <button class="category-button__viewadd">Xem thêm nội dung</button>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</main>

<script type="text/javascript">
    $(document).on('click', '#view-more-designs', function(){
        let _this = $(this);
        let nextPage = _this.attr('data-page');
        let id = _this.attr('data-id');
        let get = _this.attr('data-get');
        let canonical = _this.attr('data-canonical');
        let start = _this.attr('data-start');

        $("#loading_box").css({visibility:"visible", opacity: 0.0}).animate({opacity: 1.0},200);

        setTimeout(function() {
            $.post('frontend/media/catalogue/load_website_gallery',{
                nextPage : nextPage,id : id, start:start, get:get, canonical:canonical
            }, function(data){ 
                $("#loading_box").animate({opacity: 0.0}, 200, function(){
                    $("#loading_box").css("visibility","hidden");
                });
                let json = JSON.parse(data);
                history.pushState({}, '<?php echo $detailCatalogue['title'] ?>', json.canonical)
                if(json.html.length > 0){
                    $('.post-grid').after(json.html);
                }
                if(json.viewmore == false){
                    $('.readmore-by-va').hide()
                }
                let page = parseInt(nextPage)  + 1;
                _this.attr('data-page', page);
                start = page * 12 + 1;
                _this.attr('data-start', start);
            });
        }, 500)
        return false;
    });
</script>