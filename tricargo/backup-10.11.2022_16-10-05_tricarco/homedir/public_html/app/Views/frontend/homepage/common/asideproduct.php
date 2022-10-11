<?php 
    $panel = get_panel([
        'locate' => 'article',
        'language' => $this->data['language']
    ]);
    foreach ($panel as $key => $value) {
        $panel_list[$value['keyword']] = $value;
    }

 ?>
<div class="uk-panel margin-bottom-25px news ">
    <?php if(isset($panel_list['category']['data']) && is_array($panel_list['category']['data']) && count($panel_list['category']['data'])){ ?>
        <div class="uk-panel-title"><h3 class="heading"><i class="fa fa-bars uk-margin-small-right"></i><span class="uk-text-bold fc-text-uppercase"><?php echo $panel_list['category']['title'] ?></span></h3></div>
        <div class="fc-panel-body">
            <div class="catalogue-list">
                <ul class="uk-list uk-margin-remove l1">
                    <?php foreach ($panel_list['category']['data'] as $key => $value) { ?>
                        <?php if($key == 0) continue; ?>
                        <li class="l1 ">
                            <a href="<?php echo $value['canonical'].HTSUFFIX ?>" title="<?php echo $value['title'] ?>"><?php echo $value['title'] ?> </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>