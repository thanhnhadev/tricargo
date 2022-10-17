<section id="body">
    <section class="index-section uk-margin-large-bottom">
        <div class="uk-container uk-container-center">
            <div class="uk-grid uk-grid-medium margin-top-25px">
                <section class="right-panel uk-width-medium-2-3 uk-width-large-3-4 fc-push-medium-1-3 fc-push-large-1-4">
                    <div class="uk-panel product-catalogue-grid uk-margin-large-bottom">
                        <nav class="breadcrumb-nav">
                            <div class="container">
                                <ul class="breadcrumb">
                                    <li><a href="/"><i class="d-icon-home"></i></a></li>
                                    <?php if(isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb)){
                                    foreach ($breadcrumb as $value) {
                                    ?>
                                    <li><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>"><?php echo $value['title'] ?></a></li>
                                    <?php }} ?>
                                </ul>
                            </div>
                        </nav>
                        <div class="fc-panel-body  ">
                            <div class="uk-grid uk-grid-small uk-grid-width-large-1-2 uk-grid-width-small-1-1">
                                <?php if(isset($articleList) && is_array($articleList) && count($articleList)){
                                    foreach ($articleList as $value) {
                                 ?>
                                <article class="fc-article">
                                    <div class="fc-article-thumb uk-margin-bottom"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>" class=""><img src="<?php echo $value['image'] ?>" class=" lazyloaded" alt="<?php echo $value['title'] ?>" src="<?php echo $value['image'] ?>"></a></div>
                                    <div class="fc-article-title uk-margin-bottom"><a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>" class="uk-text-bold"><?php echo $value['title'] ?></a></div>
                                    <div class="fc-article-lead uk-margin-bottom"><?php echo base64_decode($value['description']) ?></div>
                                </article>
                                <?php }} ?>
                                
                            </div>
                            <?php if(isset($pagination) && !empty($pagination)){ ?>
                                <section class="fc-pagination uk-clearfix uk-margin-top">
                                    <?php echo (isset($pagination)) ? $pagination : ''; ?>
                                </section>                    
                            <?php } ?>  
                        </div>
                    </div>
                    
                </section>
                <aside class="left-panel uk-width-medium-1-3 uk-width-large-1-4 fc-pull-medium-2-3 fc-pull-large-3-4">
                    <?php echo view('frontend/homepage/common/asideproduct') ?>
                </aside>
            </div>
        </div>
    </section>
</section>