<section class="project-panel">
    <div class="uk-container uk-container-center">
        <div class="project-des">
            <?php echo base64_decode($detailCatalogue['description']) ?>
        </div>
        <div class="project-search uk-flex uk-flex-middle mb30">
            <div class="mr20" style="font-size: 16px; font-weight: 400;">
                TỪ KHÓA
            </div>
            <div>
                <?php if(isset($child) && is_array($child) && count($child)){ ?>
                    <select id="dynamic_select" class="niceSelect" >
                        <?php if(isset($breadcrumb[0]) && is_array($breadcrumb[0]) && count($breadcrumb[0])){ ?>
                            <option value="<?php echo $breadcrumb[0]['canonical'].HTSUFFIX ?>" <?php echo (base_url($breadcrumb[0]['canonical'].HTSUFFIX) == $canonical ? 'selected' : '') ?>>
                                <?php echo $breadcrumb[0]['title'] ?>
                            </option>
                        <?php } ?>
                        <?php foreach($child as $key => $value){ ?>
                            <option value="<?php echo $value['canonical'].HTSUFFIX ?>" <?php echo (base_url($value['canonical'].HTSUFFIX) == $canonical ? 'selected' : '') ?>>
                                <?php echo $value['title'] ?>
                            </option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </div>
        </div>
        <div class="project-body">
            <?php if(isset($articleList) && is_array($articleList) && count($articleList)){ ?>
                <div class="uk-grid uk-grid-medium uk-clearfix">
                    <?php foreach ($articleList as $value) { ?>
                        <div class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-3">
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
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="page-list">
            <?php echo (isset($pagination)) ? $pagination : ''; ?>
        </div>
    </div>
</section>

<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
</script>