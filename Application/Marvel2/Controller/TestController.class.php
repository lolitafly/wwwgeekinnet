<?php
namespace Marvel2\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class TestController extends Controller {
	public function index($score){
		$cdt['score']=array('gt',$score);
		$result=M('user')->where($cdt)->select();
		dump($result);
	}
}