<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

$configs = array(
	'name' 		=> '�����̳�',
	'log_show' 	=> true,
	'log_file' 	=> 'data/qiushibaike.log',
	'interval' 	=> 1000,
	'timeout' 	=> 5,
	'max_try' 	=> 3,	// �ظ���ȡ5��
	'export' 	=> array(
					'type'  => 'sql',
					'file'  => PATH_DATA.'/qiushibaike.sql',
					'table' => '���ݱ�',
	),
	'domains' 	=> array(
					'jihepifa.com',
					'www.jihepifa.com'
	),
	'scan_urls' => array(
					'http://www.jihepifa.com/'
	),
    'content_url_regexes' => array(
					"http://jihepifa.com/product-\d+.html",
	),
	'fields' 	=> array(
		array(
			'name' => "goodsname",
			'selector' => '//*[@id="goods-viewer"]/table/tbody/tr/td[2]/form/h1',
			'required' => true,
		),
		array(
			'name' => "author",
			'selector' => "//div[contains(@class,'author')]//h2",
		)
	)	
	);

$spider = new phpspider($configs);

$spider->on_start = function($phpspider) 
{
    $url = "http://jihepifa.com/product-9483.html";
	$html = requests::get($url);


	// ѡ��������
	$selector = '//*[@id="goods-viewer"]/table/tbody/tr/td[2]/form/h1';
	// ��ȡ���
	$result = selector::select($html, $selector);
	echo $result;
};

$spider->start();