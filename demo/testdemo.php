<?php
ini_set("memory_limit", "1024M");
require dirname(__FILE__).'/../core/init.php';

$url = "http://jihepifa.com/product-9483.html";
$html = requests::get($url);


// ѡ��������
$selector = '//*[@id="goods-viewer"]/table/tbody/tr/td[2]/form/h1';
// ��ȡ���
$result = selector::select($html, $selector);
echo $result;
echo 123213123123;