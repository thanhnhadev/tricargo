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
                                <li><a href="<?php echo $object['canonical'].HTSUFFIX ?>" title="<?php echo $object['title'] ?>"><?php echo $object['title'] ?></a></li>
                            </ul>
                        </nav>
                        <div class="fc-panel-body read" >
                            <div class="fc-article-title mb10"><h1 style="font-size:17px;" class="uk-text-bold uk-margin-small-bottom pb10"><?php echo $object['title'] ?></h1></div>
                            <div class="fc-article-meta uk-margin-bottom uk-text-muted"><?php echo date('Y-m-d H:i:s', strtotime($object['created_at'])) ?></div>
                            <div class="fc-article-lead margin-bottom-25px uk-text-bold"><?php echo $object['description'] ?></div>
                            <div class="fc-article-content uk-margin-bottom">
                                <?php echo $object['content'] ?>
                            </div>
                        </div>
                        <div class="uk-panel mb30">
                            <h3 class="uk-text-bold">Rất mong được hợp tác với Quý khách:</h3>
                            <div class="uk-panel uk-panel-box" style="background:#E0F5FF;border:1px solid #19568D"><h3><span>Liên hệ với <strong><?php echo $general['homepage_company'] ?> </strong><big>để có báo giá tốt nhất</big></span></h3>
                            <p><big><?php echo $general['homepage_company'] ?></big></p>
                            <p><strong><span style="font-size:16px">Tel: <a href="tel:<?php echo $general['contact_hotline'] ?>"><span style="color:#FF0000"><?php echo $general['contact_hotline'] ?></span></a></span></strong></p>
                            <p><big><span style="color:rgb(0, 0, 0); font-family:roboto; font-size:14px">✓&nbsp;</span><span style="color:#000000">Zalo:</span><strong><span style="color:#0000CD"> <?php echo $general['social_zalo'] ?></span></strong></big></p>
                            <p><span style="color:rgb(0, 0, 0); font-family:roboto; font-size:14px">✓&nbsp;</span><big>Email: <strong>C</strong></big><strong><span style="font-size:16px"><?php echo $general['contact_email'] ?></span>,&nbsp;</strong><br></span></p>
                            <p><span style="color:rgb(0, 0, 0); font-family:roboto; font-size:14px">✓&nbsp;</span><big><span style="line-height:20.8px">Chat Skype:&nbsp;</span></big><span style="font-size:16px"><strong><a href="skype:<?php echo $general['social_skype'] ?>?chat"><?php echo $general['social_skype'] ?></a>&nbsp;</strong></span><br>
                            <span style="color:rgb(0, 0, 0); font-family:roboto; font-size:14px">✓&nbsp;</span><span style="font-size:16px">Facebook: <a href="<?php echo $general['social_facebook'] ?>"><strong><?php echo $general['social_facebook'] ?></strong></a></span></p>
                            <p><big>Xưởng sản xuất 1: <?php echo $general['contact_address_1'] ?></big></p>
                            <p><big>Xưởng sản xuất 2: <?php echo $general['contact_address_2'] ?></big></p>
                        </div>
                        <div class="uk-panel related-article-panel mt30">
                            <header class="uk-margin-bottom"><span>Bài viết liên quan</span></header>
                            <ul class="article-list uk-grid uk-grid-medium uk-grid-width-medium-1-2">
                                <?php if(isset($articleRelate) && is_array($articleRelate) && count($articleRelate)){
                                    foreach ($articleRelate as $value) {
                                    ?>
                                <li><a href="<?php echo $value['canonical'].HTSUFFIX ?>"><?php echo $value['title'] ?></a></li>
                            <?php }} ?>
                            </ul>
                        </div>
                        <div class="uk-panel related-article-panel mt30">
                            <header class="uk-margin-bottom"><span style="color:red;font-size:16px;font-weight:bold;">Sản phẩm In</span></header>
                            <div class="fc-panel-body">
                                <div class="uk-grid uk-grid-small uk-grid-width-large-1-5 uk-grid-width-medium-1-3 uk-grid-width-small-1-1  fc-product-grid" data-uk-grid-match="{target:'.grid-match'}">
                                    <?php if(isset($product_best) && is_array($product_best) && count($product_best)){
                                    foreach ($product_best as $value) {
                                    ?>
                                    <div class="uk-panel">
                                        <a class="uk-display-block" href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>"><img style="width:100%;height:135px;" src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>"></a>
                                        <div class="fc-article-title uk-margin-bottom" style="text-align:center;"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" style="color:#0b5c8d;" title="<?php echo $value['title'] ?>" class="uk-text-bold"><?php echo $value['title'] ?></a></div>
                                    </div>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="left-panel uk-width-medium-1-3 uk-width-large-1-4 fc-pull-medium-2-3 fc-pull-large-3-4">
                <?php echo view('frontend/homepage/common/asideproduct') ?>
            </aside>
        </div>
    </div>
</section>