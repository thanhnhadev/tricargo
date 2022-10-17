<?php
    $footer_menu = get_menu(['keyword' => 'footer-menu','language' => $language,'output' => 'array']);
    $footer_menu_2 = get_menu(['keyword' => 'footer-2','language' => $language,'output' => 'array']);
?>

<footer id="footer" class="lazyloading show">
    <div class="uk-container uk-container-center">
        <div class="abc-cal-footer-inner-links">
            <div class="uk-grid uk-grid-collapse uk-clearfix">
                <div class="uk-width-large-2-3">
                    <ul class="abc-cal-footer-accordion uk-grid-collapse uk-grid uk-grid-width-small-1-2 uk-grid-width-large-1-4 uk-clearfix">
                        <?php if(isset($footer_menu['data']) && is_array($footer_menu['data']) && count($footer_menu['data'])){ ?>
                            <?php foreach ($footer_menu['data'] as $value) { ?>
                                <li>
                                    <div class="abc-cal-footer-link-title">
                                        <h3><?php echo $value['title'] ?></h3>
                                    </div>
                                    <?php if(isset($value['children']) && is_array($value['children']) && count($value['children'])){ ?>
                                            <ul class="abc-cal-footer-link-content abc-cal-footer-hidden">
                                                <?php foreach ($value['children'] as $valueChild) { ?>
                                                    <li><a href="<?php echo $valueChild['canonical'].HTSUFFIX ?>"><?php echo $valueChild['title'] ?></a></li>
                                                <?php } ?>
                                            </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="uk-width-large-1-3">
                    <div class="abc-cal-footer-payment-logo">
                        <strong class="abc-cal-footer-payment-title">Payment Options</strong>
                        <div class="abc-cal-footer-payment-content">
                            <img alt="Flexible Payment Options: PayPal, Visa, MasterCard, Discover, American Express" src="public/frontend/resources/img/footer_payment_options.png" class="ab-lazy-image abc-cal-footer-support-payment" loading="lazy">
                            <div class="abc-cal-footer-other-logo"><div>
                            <div class="abc-cal-footer-follow-us"><strong>Follow Us: </strong><a class="abc-cal-footer-facebook-logo" href="<?php echo $general['social_facebook'] ?>" target="_blank"><img alt="Become a Fan on Facebook" src="public/frontend/resources/img/footer_facebook.png" class="ab-lazy-image" loading="lazy"></a></div><a href="https://trustlogo.com/ttb_searcher/trustlogo?v_querytype=W&amp;v_shortname=posdv&amp;v_search=https://www.hondapartsnow.com&amp;x=6&amp;y=5" class="abc-footer-comodo" target="_blank"><img alt="Sectigo - Security (SSL Certificates) Provider" src="public/frontend/resources/img/sectigo_trust_seal_md.png" class="ab-lazy-image" loading="lazy"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="uk-container uk-container-center">
        <?php if(isset($footer_menu_2['data']) && is_array($footer_menu_2['data']) && count($footer_menu_2['data'])){ ?>
        <div class="footer-lower">
            <div class="recommend-text">Recommend sites for genuine OEM parts with greate saving</div>
            <div class="uk-grid uk-grid-medium">
                <?php foreach($footer_menu_2['data'] as $key => $val){ ?>
                <div class="uk-width-large-1-5">
                    <div class="f-item">
                        <div class="f-item-link"><a href="<?php echo $val['canonical'] ?>"><?php echo $val['canonical'] ?></a></div>
                        <div class="f-item-text"><?php echo $val['title'] ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</footer>
<div class="uk-container uk-container-center">
    <div class="abc-cal-footer-copy uk-text-center pt10 pb10"><?php echo strip_tags($general['homepage_copyright']) ?></div>
</div>
