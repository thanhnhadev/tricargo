<?php
    $model = new App\Models\AutoloadModel();
    $category = $model->_get_where([
        'select' => 'tb1.id, tb2.title, tb2.canonical',
        'table' => 'product_catalogue as tb1',
        'join' => [
            ['product_translate as tb2','tb2.objectid = tb1.id AND tb2.module = "product_catalogue"','inner']
        ],
        'where' => ['publish' => 1,'tb1.deleted_at' => 0],
        'order_by' => 'order desc, id desc'
    ], TRUE);

?>
<div class="wrap-grid">
    <div class="aside-category">
        <div class="category-heading">Parts Catalogue</div>
        <?php if(isset($category) && is_array($category) && count($category)){ ?>
        <div class="category-body">
            <ul class="uk-list uk-clearfix">
                <?php foreach($category as $key => $val){ ?>
                <li><a href="<?php echo write_url($val['canonical']) ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <?php } ?>
    </div>
    <div class="cal-home-aside">
        <div class="home-word-side-shipping-delay">
            <?php echo $general['aside_note'] ?>
        </div>
        <div class="home-word-side-title">
            <h2 class="home-word-side-title-text">
            Tại sao chọn
            <span class="home-word-side-title-highlight">
                <?php echo $general['homepage_company'] ?>
            </span>
            </h2>
        </div>
        <ul class="home-word-side-list">
            <li>
                <div class="home-word-side-subtitle flex-row">
                    <span  class="ab-icon"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/prices_circle.svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #607090; color: #607090;"><path d="M12 0A12 12 0 1 1 0 12 12 12 0 0 1 12 0zm1 9h3V8a2.938 2.938 0 0 0-3-3V4h-2v1a2.938 2.938 0 0 0-3 3c0 2 1 3 3 4s2 2 2 2v1a1 1 0 0 1-2 0v-1H8v1c0 3 2 4 3 4v1h2v-1c1 0 3-1 3-4 0-2 0-3-2-4s-3-2-3-3a1 1 0 0 1 2 0v1z" fill-rule="evenodd"></path></svg></span></span>
                    <h3 class="home-word-side-tip"><?php echo $general['aside_title_1'] ?></h3>
                </div>
                <p class="home-word-side-text">
                    <?php echo $general['aside_desc_1'] ?>
                </p>
            </li>
            <li>
                <div class="home-word-side-subtitle flex-row">
                    <span  class="ab-icon"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/service_circle.svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #607090; color: #607090;"><path d="M12 0A12 12 0 1 1 0 12 12 12 0 0 1 12 0zM6 9h3v9H6V9zm4 0l4-4c2 0 0 4-1 4h4c2 0 2 1 2 2 0 6-3 7-3 7h-6V9z" fill-rule="evenodd"></path></svg></span></span>
                    <h3 class="home-word-side-tip"><?php echo $general['aside_title_2'] ?></h3>
                </div>
                <p class="home-word-side-text"><?php echo $general['aside_desc_2'] ?></p>
            </li>
            <li>
                <div class="home-word-side-subtitle flex-row">
                    <span  class="ab-icon"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="injected-svg" data-src="/common-uiasset/svg/delivery_circle.svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #607090; color: #607090;"><path d="M12 24a12 12 0 1 1 12-12 12 12 0 0 1-12 12zm6-15h-2V7H5v9h1a2.003 2.003 0 0 0 4.007 0H15a2 2 0 0 0 4 0h1v-5zm-1 1l2 2h-2v-2z" fill-rule="evenodd"></path></svg></span></span>
                    <h3 class="home-word-side-tip"><?php echo $general['aside_title_3'] ?></h3>
                </div>
                <p class="home-word-side-text"><?php echo $general['aside_desc_3'] ?></p>
            </li>
        </ul>
    </div>
</div>
