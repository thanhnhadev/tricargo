<section id="body">
    <section class="index-section uk-margin-large-bottom">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium margin-top-25px">
                <section class="right-panel uk-width-medium-2-3 uk-width-large-3-4 fc-push-medium-1-3 fc-push-large-1-4">
                    <div class="uk-panel product-catalogue-grid uk-margin-large-bottom">
                        <nav class="breadcrumb-nav fc-breadcrumb mb15">
                            <ul class="breadcrumb">
                                <li><a href="/"><i class="d-icon-home"></i></a></li>
                                <?php if(isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)){
                                foreach ($breadcrumb as $value) {
                                ?>
                                <li><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>"><?php echo $value['title'] ?></a></li>
                                <?php }} ?>
                            </ul>
                        </nav>
                        <div class="fc-panel-body " style="background:#f8ffed;border:1px solid #e2e2e2;padding:10px;">
                            <ul class="uk-list fc-article-list">
                                <?php if(isset($articleList) && is_array($articleList) && count($articleList)){
                                    foreach ($articleList as $value) {
                                 ?>
                                    <li class="margin-bottom-35px ">
                                        <article class="fc-article uk-grid uk-grid-medium">
                                            <div class="fc-article-thumb uk-width-small-1-3 uk-width-medium-2-5 uk-width-large-1-3 uk-margin-bottom">
                                                <a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="" class="fc-crop-center-img-h"><img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" /></a>
                                            </div>
                                            <div class="fc-group uk-width-small-2-3 uk-width-medium-3-5 uk-width-large-2-3">
                                                <div class="fc-article-title uk-margin-bottom"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>" class="uk-text-bold"><?php echo $value['title'] ?></a></div>
                                                <div class="fc-article-meta uk-margin-bottom uk-text-muted"><?php echo date('Y-m-d H:i:s', strtotime($value['created_at'])) ?></div>
                                                <div class="fc-article-lead uk-margin-bottom"><?php echo base64_decode($value['description']) ?></div>
                                                <div class="fc-article-readmore"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="Đọc tiếp" class="uk-button uk-float-right">Xem thêm &raquo;</a></div>
                                            </div>
                                        </article>
                                    </li>
                                <?php }} ?>
                            </ul>
                            <?php if(isset($pagination) && !empty($pagination)){ ?>
                                <section class="fc-pagination uk-clearfix uk-margin-top">
                                    <?php echo (isset($pagination)) ? $pagination : ''; ?>
                                </section>                    
                            <?php } ?>  
                        </div>
                    </div>
                    
                </section>
                <aside class="left-panel uk-width-medium-1-3 uk-width-large-1-4 fc-pull-medium-2-3 fc-pull-large-3-4">
                    <?php echo view('frontend/homepage/common/aside') ?>
                </aside>
            </div>
        </div>
    </section>