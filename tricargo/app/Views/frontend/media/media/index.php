<?php
    $owlInit = array(
        'loop' => false,
        'nav' => true,
        'dots' => false,
        'center' => true,
        'margin' => 20,
        'autoplay' => false,
        'autoplayHoverPause' => true,
        'items' => 1.5,
    );
?>
<div class="pt50 pb50">
    <div class="wrap-slide-media mb30">
        <div class="media-title uk-text-center mb30">
            <?php echo $object['title'] ?>
        </div>
        <div class="wrap-slide">
            <div class="owl-slide">
                <div class="owl-carousel owl-theme" data-owl="<?php echo base64_encode(json_encode($owlInit)); ?>" data-disabled="0">
                    <?php if(isset($object['album']) && is_array($object['album']) && count($object['album'])){
                        foreach ($object['album'] as $value) {
                    ?>
                        <div class="wrap-slide">
                            <img src="<?php echo $value ?>" alt="">
                            <img src="public/over.png" alt="" class="wrap-overlay-media">
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>

    <?php
        $owlInit = array(
            'loop' => false,
            'nav' => true,
            'dots' => false,
            'margin' => 20,
            'autoplay' => false,
            'autoplayHoverPause' => true,
            'items' => 4,
            'responsive' => array(
                0 => array(
                    'items' => 1,
                ),
                480 => array(
                    'items' => 2,
                ),
                768 => array(
                    'items' => 3,
                ),
                960 => array(
                    'items' => 4,
                ),
            )
        );
    ?>
    <div class="uk-container uk-container-center">
        
        <hr>
        <div class="wrap-media-relate">
            <div class="head-media mb30"><?php echo $language == 'vi' ? 'Các dự án khác' : 'Other projects' ?></div>
            <div class="wrap-project">
                <div class="owl-slide">
                    <div class="owl-carousel owl-theme" data-owl="<?php echo base64_encode(json_encode($owlInit)); ?>" data-disabled="0">
                        <?php if(isset($articleRelate) && is_array($articleRelate) && count($articleRelate)){ ?>
                            <?php foreach ($articleRelate as $value) { ?>
                                <div class="project-item">
                                    <div class="item-pic mb10">
                                        <a href="<?php echo !empty($value['iframe']) ? $value['iframe'] : $value['canonical'].HTSUFFIX ?>"  class="img img-cover">
                                            <?php echo render_img(['src' => $value['image']]) ?>
                                        </a>
                                        <a href="<?php echo !empty($value['iframe']) ? $value['iframe'] : $value['canonical'].HTSUFFIX ?>"  class="img-over img-scaledown">
                                            <img src="public/over.png">
                                        </a>
                                    </div>
                                    <div class="item-title">
                                        <a href="<?php echo !empty($value['iframe']) ? $value['iframe'] : $value['canonical'].HTSUFFIX ?>" >
                                            <?php echo $value['title'] ?>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>