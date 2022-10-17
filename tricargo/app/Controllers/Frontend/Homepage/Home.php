<?php
namespace App\Controllers\Frontend\Homepage;
use App\Controllers\FrontendController;

class Home extends FrontendController{

	public $data = [];

	public function __construct(){
		$this->data['module'] = 'home';
		$this->data['language'] = $this->currentLanguage();
	}

	public function index(){
        $session = session();
		$this->data['general'] = $this->general;
		$this->data['meta_title'] = (isset($this->data['general']['seo_meta_title']) ? $this->data['general']['seo_meta_title'] : '');
		$this->data['meta_description'] = (isset($this->data['general']['seo_meta_description']) ? $this->data['general']['seo_meta_description'] : '');
		$this->data['og_type'] = 'website';
		$this->data['canonical'] = BASE_URL;
		// $panel = get_panel([
		// 	'locate' => 'home',
		// 	'language' => $this->data['language']
		// ]);
		// foreach ($panel as $key => $value) {
		// 	if(isset($this->data['panel'][$value['keyword']]) && is_array($this->data['panel'][$value['keyword']]) && count($this->data['panel'][$value['keyword']])){
		// 		$temp = $this->data['panel'][$value['keyword']];
		// 		$this->data['panel'][$value['keyword']] = [$temp, $value];
		// 	}else{
		// 		$this->data['panel'][$value['keyword']] = $value;
		// 	}
		// }

		$this->data['productCatalogueList'] = $this->AutoloadModel->_get_where([
				'select' => 'tb1.id, tb2.title,  tb2.canonical,  ',
				'table' => 'product_catalogue as tb1',
				'join' =>  [
					[
						'product_translate as tb2','tb1.id = tb2.objectid AND tb2.module = "product_catalogue"   AND tb2.language = \''.$this->currentLanguage().'\' ','inner'
					],
				],
				'where' => [
					'tb1.deleted_at' => 0,
					'tb1.publish' => 1
				],
				'order_by'=> 'tb2.title asc'
			], TRUE);

		$this->data['brandCatalogueList'] = $this->AutoloadModel->_get_where([
			'select' => 'tb1.id, tb2.title, tb2.canonical, ',
			'table' => 'brand_catalogue as tb1',
			'join' =>  [
				[
					'brand_translate as tb2','tb1.id = tb2.objectid AND tb2.module = "brand_catalogue"   AND tb2.language = \''.$this->data['language'].'\' ','inner'
				],
			],
			'where' => [
				'tb1.deleted_at' => 0,
				'tb1.publish' => 1
			],
			'order_by'=> 'tb2.title asc'
		], TRUE);
		if(isset($this->data['brandCatalogueList']) && is_array($this->data['brandCatalogueList']) && count($this->data['brandCatalogueList'])){
			foreach ($this->data['brandCatalogueList'] as $key =>  $value) {
				$this->data['brandCatalogueList'][$key]['data'] = [];
			}
			foreach ($this->data['brandCatalogueList'] as $key =>  $value) {
			    $this->data['brandCatalogueList'][$key]['data'] = $this->AutoloadModel->_get_where([
					'select' => 'tb1.id,  tb1.image,  tb4.title , tb4.canonical, tb1.catalogueid,  ',
					'table' => 'brand as tb1',
					'where' => [
						'tb1.deleted_at' => 0,
						'tb1.catalogueid' => $value['id'],
						'tb1.publish' => 1
					],
					'join' => [
						[
							'brand_translate as tb4','tb1.id = tb4.objectid  AND tb4.module = "brand"  AND tb4.language = \''.$this->currentLanguage().'\' ','inner'
						],
					],
					'limit' => 9,
					'order_by'=> 'tb4.title asc',
				], TRUE);
			}
		}


		// $this->data['category_home'] = (isset($this->data['panel']['category-home']) ? $this->data['panel']['category-home'] : []);

		$this->data['home'] = 'home';
		$this->data['template'] = 'frontend/homepage/home/index';
		return view('frontend/homepage/layout/home', $this->data);
	}

	public function quantri(){
        $session = session();
		$this->data['general'] = $this->general;
		$this->data['meta_title'] = (isset($this->data['general']['seo_meta_title']) ? $this->data['general']['seo_meta_title'] : '');
		$this->data['meta_description'] = (isset($this->data['general']['seo_meta_description']) ? $this->data['general']['seo_meta_description'] : '');
		$this->data['og_type'] = 'website';
		$this->data['canonical'] = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$this->data['template'] = 'frontend/homepage/home/quantri';
		return view('frontend/homepage/layout/home', $this->data);
	}

	public function customer(){
        $session = session();
		$this->data['general'] = $this->general;
		$this->data['meta_title'] = (isset($this->data['general']['seo_meta_title']) ? $this->data['general']['seo_meta_title'] : '');
		$this->data['meta_description'] = (isset($this->data['general']['seo_meta_description']) ? $this->data['general']['seo_meta_description'] : '');
		$this->data['og_type'] = 'website';
		$this->data['canonical'] = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$this->data['template'] = 'frontend/homepage/home/customer';
		return view('frontend/homepage/layout/home', $this->data);
	}

	public function wishlist(){
        $session = session();
        $cookie = (isset($_COOKIE['product_wishlist']) ? explode(',', $_COOKIE['product_wishlist']) : []);
		$this->data['general'] = $this->general;
		$this->data['meta_title'] = (isset($this->data['general']['seo_meta_title']) ? $this->data['general']['seo_meta_title'] : '');
		$this->data['meta_description'] = (isset($this->data['general']['seo_meta_description']) ? $this->data['general']['seo_meta_description'] : '');
		$this->data['og_type'] = 'website';
		$this->data['canonical'] = BASE_URL;
		if(isset($cookie) && is_array($cookie) && count($cookie)){
			$this->data['productList'] = $this->AutoloadModel->_get_where([
				'select' => 'tb1.id, tb1.catalogueid as cat_id, tb1.price,tb1.hot,tb1.order, tb1.price_promotion, tb1.bar_code,  tb1.image,   tb1.publish, tb3.title ,   tb3.content, tb3.sub_title, tb3.sub_content, tb3.canonical, tb3.meta_title, tb3.meta_description, tb3.made_in ',
				'table' => 'product as tb1',
				'where' => [
					'tb1.deleted_at' => 0,
					'tb1.publish' => 1
				],
				'where_in' => $cookie,
				'where_in_field' => 'tb1.id',
				'join' => [
					[
						'product_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
					]
				],
				'order_by'=> 'tb1.order desc, tb1.id desc',
				'group_by' => 'tb1.id'
			], TRUE);
		}


		$this->data['home'] = 'home';
		$this->data['template'] = 'frontend/homepage/home/wishlist';
		return view('frontend/homepage/layout/home', $this->data);
	}

	private function handle_category($panel){
		$where_in = [];
		if(isset($panel['category-home']) && is_array($panel['category-home']) && count($panel['category-home'])){
			foreach ($panel['category-home'] as $keyCategory => $valueCategory) {
				if(isset($valueCategory) && is_array($valueCategory) && count($valueCategory)){
					foreach($panel['category-home'][$keyCategory]['data'] as $key => $val){
						$where_in[] = $val['id'];
					}

					$panel['category-home'][$keyCategory]['data'] = recursive($panel['category-home'][$keyCategory]['data']);
				}

				if(isset($panel['category-home'][$keyCategory]['data']) && is_array($panel['category-home'][$keyCategory]['data']) && count($panel['category-home'][$keyCategory]['data'])){
					foreach($panel['category-home'][$keyCategory]['data'] as $key => $val){
						if(isset($val['post']) && is_array($val['post']) && count($val['post'])){
							$panel['category-home'][$keyCategory]['data'][$key]['post'] = array_merge($panel['category-home'][$keyCategory]['data'][$key]['post'], $val['post']);
						}
						if(isset($val['children']) && is_array($val['children']) && count($val['children'])){
							$new_array = $this->get_child_panel($val['children']);
						}
					}
				}
			}
		}
		return $panel['category-home'];
	}

	private function get_child_panel($param = []){
		$arr = [];
		foreach ($param as $key => $value) {

			if(isset($value['post']) && is_array($value['post']) && count($value['post'])){
				$arr = array_merge($arr, $value['post']);
			}
		    if(isset($value['children']) && is_array($value['children']) && count($value['children'])){
		    	$new_array = $this->get_child_panel($value['children']);
		    	$arr = array_merge($arr, $new_array);
		    }
		}
		return $arr;
	}
}
