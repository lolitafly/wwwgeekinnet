<?php
namespace H5demo\Controller;
use Think\Controller;
class IndexController extends Controller {
	
	public function index(){
		$this->assign('list',$this->get_demo());
		$this->display();
	}
	
    private function get_demo(){
//     	$demo[0]['img']='0.jpg';
//     	$demo[0]['title']='吉列微信推广';
//     	$demo[0]['desc']='吉列购买的微信推广业务中的h5详情页面';
    	
//     	$demo[1]['img']='1.jpg';
//     	$demo[1]['title']='吉列超级英雄连连看';
//     	$demo[1]['desc']='与漫威合作，以复仇者联盟英雄为元素，制作的营销推广游戏';
    	
//     	$demo[2]['img']='2.jpg';
//     	$demo[2]['title']='你就是我们的珍藏';
//     	$demo[2]['desc']='2015年赛诺菲肿瘤事业部春季校园招聘H5';
    	
//     	$demo[3]['img']='2.jpg';
//     	$demo[3]['title']='你就是我们的珍藏';
//     	$demo[3]['desc']='2015年赛诺菲肿瘤事业部春季校园招聘H5';
    	
    	$demo=array(
    			array(
    				'img'=>'0.jpg',		
    				'url'=>'http://wximg.qq.com/tmt/_events/20150511-promo-gillette/dist/index.html',		
    				'title'=>'吉列微信推广',		
    				'desc'=>'吉列购买的微信推广业务中的h5详情页面'		
    			),
    			array(
    				'img'=>'1.jpg',	
    				'url'=>	'http://www.geek-in.net/marvel2.php',
    				'title'=>'吉列超级英雄连连看',		
    				'desc'=>'与漫威合作，以复仇者联盟英雄为元素，制作的营销推广游戏'		
    			),
    			array(
    				'img'=>'2.jpg',	
    				'url'=>	'http://www.geek-in.net/html/sanofi/index.html',
    				'title'=>'你就是我们的珍藏',		
    				'desc'=>'2015年赛诺菲肿瘤事业部春季校园招聘H5'		
    			),
    			array(
    				'img'=>'3.jpg',	
    				'url'=>	'http://www.geek-in.net/html/zjgz/index.html',
    				'title'=>'默家白皮书',		
    				'desc'=>'2015年中国最佳雇主默沙东默家白皮书'		
    			),
    			array(
    				'img'=>'4.jpg',	
    				'url'=>	'http://www.geek-in.net/html/depuy/index.html',
    				'title'=>'MITEK产品手册',		
    				'desc'=>'强生MITEK产品手册，用于现场活动二维码查看'		
    			),
    	);
    	
    	
    	return $demo;
    }
}