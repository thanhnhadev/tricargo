<?php

namespace App\Controllers\Backend\Panel\Libraries;
use App\Controllers\BaseController;

class ConfigBie{

	function __construct($params = NULL){
		$this->params = $params;
	}
	public function panel(){
		$data['locate'] =  array(
			0 => '-- Chọn vị trí Panel --',
            'home' => 'Trang chủ',
            'article' => 'Bài viết',
            'tuyendung' => 'Tuyển dụng',
            // 'product' => 'Sản phẩm',
            // 'media' => 'Dự án',
            'intro' => 'Giới thiệu'
		);
		$data['dropdown'] =  array(
			0 => '-- Chọn danh mục --',
            'product' => 'Sản phẩm',
            'product_catalogue' => 'Danh mục Sản phẩm',
            'article' => 'Bài viết',
            'article_catalogue' => 'Danh mục Bài viết',
            // 'media' => 'Thiết kế và dự án',
            // 'media_catalogue' => 'Danh mục Thiết kế và dự án',
		);

		return $data;
	}
}
