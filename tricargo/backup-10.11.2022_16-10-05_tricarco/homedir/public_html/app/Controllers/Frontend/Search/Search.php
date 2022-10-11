<?php
namespace App\Controllers\Frontend\Search;
use App\Controllers\FrontendController;

class Search extends FrontendController{

    protected $data;

    public function __construct(){
        $this->data = [];
        $this->data['module'] = 'article';
        $this->data['language'] = $this->currentLanguage();
    }

    public function index($page = 1, $module = ''){
        helper(['mypagination']);
        $session = session();
        $seoPage = '';
        // $article = $this->search_article($page, $module);
        // $this->data['articleList'] = $article['array'];
        // $this->data['pagination_article'] = $article['pagination'];
        $product = $this->search_product($page, $module);
        $this->data['productList'] = $product['array'];
        $this->data['pagination'] = $product['pagination'];
        // $media = $this->search_media($page, $module);
        // $this->data['mediaList'] = $media['array'];
        // $this->data['pagination_media'] = $media['pagination'];
        $this->data['count_product'] = $product['count'];

        $this->data['canonical'] = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";;
        $this->data['detailCatalogue'] = [
            'title' => 'Tìm kiếm theo từ khóa: '.$this->request->getGet('keyword'),
            'canonical' => $this->data['canonical'],
            'content' => '' ,
            'description' => ''
        ];
        $this->data['meta_title'] = 'Tìm kiếm theo từ khóa: '.$this->request->getGet('keyword');
        $this->data['meta_description'] = 'Tìm kiếm theo từ khóa: '.$this->request->getGet('keyword');
        $this->data['meta_image'] = !empty( $this->data['detailCatalogue']['image'])?base_url( $this->data['detailCatalogue']['image']):'';
        
        $this->data['general'] = $this->general;
        
        $this->data['template'] = 'frontend/product/catalogue/index';
        return view('frontend/homepage/layout/home', $this->data);
    }

    private function condition_keyword($keyword = ''): string{
        if(!empty($this->request->getGet('keyword'))){
            $keyword = $this->request->getGet('keyword');
            $keyword = '(tb3.title LIKE \'%'.$keyword.'%\')';
        }
        return $keyword;
    }

    private function search_article($page = 1, $module = 'article'){
        $page = ($module == 'article' ? (int)$page : 1);
        $articleList = [];
        $pagination = '';
        $perpage = ($this->request->getGet('perpage')) ? $this->request->getGet('perpage') : 12;
        $keyword = $this->condition_keyword();
        $config['total_rows'] = $this->AutoloadModel->_get_where([
            'select' => 'tb1.id',
            'table' => 'article as tb1',
            'keyword' => $keyword,
            'where' => [
                'tb1.deleted_at' => 0,
                'tb1.publish' => 1
            ],
            'join' => [
                [
                    'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "article" ', 'inner'
                ],
                [
                    'article_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "article" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                ],
                [
                    'article_translate as tb4','tb4.module = "article_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                ],
                [
                    'user as tb5','tb1.userid_created = tb5.id', 'inner'
                ]
            ],
            'count' => TRUE
        ]);
        $config['base_url'] = write_url('tim-kiem', FALSE, TRUE);
        if($config['total_rows'] > 0){
            $config = pagination_frontend_search(['url' => $config['base_url'],'perpage' => $perpage], $config, $page , 'article');

            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows']/$config['per_page']);
            $page = ($page <= 0)?1:$page;
            $page = ($page > $totalPage)?$totalPage:$page;
            $seoPage = ($page >= 2)?(' - Trang '.$page):'';
            $page = $page - 1;
            $articleList = $this->AutoloadModel->_get_where([
                'select' => 'tb1.id,tb1.viewed, tb1.image, tb4.title as cat_title,tb1.catalogue, tb4.canonical as cat_canonical, tb3.title, tb3.canonical, tb3.meta_title, tb3.meta_description,tb3.icon, tb3.viewed, tb3.description, tb3.content, tb1.created_at, tb5.fullname',
                'table' => 'article as tb1',
                'where' => [
                    'tb1.deleted_at' => 0,
                    'tb1.publish' => 1
                ],
                'keyword' => $keyword,
                'join' => [
                    [
                        'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "article" ', 'inner'
                    ],
                    [
                        'article_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "article" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                    ],
                    [
                        'article_translate as tb4','tb4.module = "article_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                    ],
                    [
                        'user as tb5','tb1.userid_created = tb5.id', 'inner'
                    ]
                ],
                'limit' => $config['per_page'],
                'start' => $page * $config['per_page'],
                'order_by'=> 'tb1.order desc, tb1.id desc',
                'group_by' => 'tb1.id'
            ], TRUE);
        }

        return [
            'array' => $articleList ,
            'pagination' => $pagination
        ];
    }

    private function search_media($page = 1, $module = 'media'){
        $page = ($module == 'media' ? (int)$page : 1);
        $mediaList = [];
        $pagination = '';
        $perpage = ($this->request->getGet('perpage')) ? $this->request->getGet('perpage') : 12;
        $keyword = $this->condition_keyword();
        $config['total_rows'] = $this->AutoloadModel->_get_where([
            'select' => 'tb1.id',
            'table' => 'media as tb1',
            'keyword' => $keyword,
            'where' => [
                'tb1.deleted_at' => 0,
                'tb1.publish' => 1
            ],
            'join' => [
                [
                    'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "media" ', 'inner'
                ],
                [
                    'media_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "media" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                ],
                [
                    'media_translate as tb4','tb4.module = "media_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                ],
                [
                    'user as tb5','tb1.userid_created = tb5.id', 'inner'
                ]
            ],
            'count' => TRUE
        ]);
        $config['base_url'] = write_url('tim-kiem', FALSE, TRUE);
        if($config['total_rows'] > 0){
            $config = pagination_frontend_search(['url' => $config['base_url'],'perpage' => $perpage], $config, $page , 'media');

            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows']/$config['per_page']);
            $page = ($page <= 0)?1:$page;
            $page = ($page > $totalPage)?$totalPage:$page;
            $seoPage = ($page >= 2)?(' - Trang '.$page):'';
            $page = $page - 1;
            $mediaList = $this->AutoloadModel->_get_where([
                'select' => 'tb1.id,tb1.viewed, tb1.image, tb4.title as cat_title,tb1.catalogue, tb4.canonical as cat_canonical, tb3.title, tb3.canonical, tb3.meta_title, tb3.meta_description,tb3.icon, tb3.viewed, tb3.description, tb3.content, tb1.created_at, tb5.fullname',
                'table' => 'media as tb1',
                'where' => [
                    'tb1.deleted_at' => 0,
                    'tb1.publish' => 1
                ],
                'keyword' => $keyword,
                'join' => [
                    [
                        'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "media" ', 'inner'
                    ],
                    [
                        'media_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "media" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                    ],
                    [
                        'media_translate as tb4','tb4.module = "media_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                    ],
                    [
                        'user as tb5','tb1.userid_created = tb5.id', 'inner'
                    ]
                ],
                'limit' => $config['per_page'],
                'start' => $page * $config['per_page'],
                'order_by'=> 'tb1.order desc, tb1.id desc',
                'group_by' => 'tb1.id'
            ], TRUE);
        }

        return [
            'array' => $mediaList ,
            'pagination' => $pagination
        ];
    }

    private function search_product($page = 1, $module = 'product'){
        $page = ($module == 'product' ? (int)$page : 1);
        $productList = [];
        $pagination = '';
        $perpage = ($this->request->getGet('perpage')) ? $this->request->getGet('perpage') : 20;
        $keyword = $this->condition_keyword();
        $config['total_rows'] = $this->AutoloadModel->_get_where([
            'select' => 'tb1.id',
            'table' => 'product as tb1',
            'keyword' => $keyword,
            'where' => [
                'tb1.deleted_at' => 0,
                'tb1.publish' => 1
            ],
            'join' => [
                [
                    'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "product" ', 'inner'
                ],
                [
                    'product_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                ],
                [
                    'product_translate as tb4','tb4.module = "product_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                ],
                [
                    'user as tb5','tb1.userid_created = tb5.id', 'inner'
                ]
            ],
            'count' => TRUE,
            'group_by' => 'tb1.id'
        ]);
        $config['base_url'] = write_url('tim-kiem', FALSE, TRUE);
        if($config['total_rows'] > 0){
            $config = pagination_frontend_search(['url' => $config['base_url'],'perpage' => $perpage], $config, $page , 'product');

            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows']/$config['per_page']);
            $page = ($page <= 0)?1:$page;
            $page = ($page > $totalPage)?$totalPage:$page;
            $seoPage = ($page >= 2)?(' - Trang '.$page):'';
            $page = $page - 1;
            $productList = $this->AutoloadModel->_get_where([
                'select' => 'tb1.id,tb1.viewed, tb1.image,tb1.price,tb1.price_promotion, tb1.productid, tb1.model, tb1.bar_code, tb1.hot, tb4.title as cat_title,tb1.catalogue, tb4.canonical as cat_canonical, tb3.title, tb3.canonical, tb3.meta_title, tb3.meta_description,tb3.icon, tb1.viewed, tb3.description, tb3.content, tb1.created_at, tb5.fullname',
                'table' => 'product as tb1',
                'where' => [
                    'tb1.deleted_at' => 0,
                    'tb1.publish' => 1
                ],
                'keyword' => $keyword,
                'join' => [
                    [
                        'object_relationship as tb2', 'tb1.id = tb2.objectid AND tb2.module = "product" ', 'inner'
                    ],
                    [
                        'product_translate as tb3','tb1.id = tb3.objectid AND tb3.module = "product" AND tb3.language = \''.$this->currentLanguage().'\' ','inner'
                    ],
                    [
                        'product_translate as tb4','tb4.module = "product_catalogue" AND tb4.objectid = tb1.catalogueid AND tb3.language = \''.$this->currentLanguage().'\'', 'inner'
                    ],
                    [
                        'user as tb5','tb1.userid_created = tb5.id', 'inner'
                    ]
                ],
                'limit' => $config['per_page'],
                'start' => $page * $config['per_page'],
                'order_by'=> 'tb1.order desc, tb1.id desc',
                'group_by' => 'tb1.id'
            ], TRUE);

        }

        return [
            'array' => $productList ,
            'pagination' => $pagination,
            'count' => $config['total_rows']
        ];
    }

}
