<?php
namespace MarvelCinema\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller {
	
    public function index(){
    	$this->display();
    }
    
    
    public function submit(){
    	if(IS_POST){
	    	$User = D("User");
	    	
	    	$cdt['phone']=$_POST['phone'];
	    	$myRecord=$User->where($cdt)->find();
	    	
	    	//创建数据
	    	if (!$User->create()){
	    		$this->ajaxReturn($User->getError());
	    		exit(0);
	    	}
	    	//若没有该手机用户则添加，若有且分数比原来高则更新
	    	if(!$myRecord){
	    		$User->add();
	    	}elseif($myRecord['score']<$_POST['score']){
	    		$User->where($cdt)->save();
	    	}
	    	$data=$User->getRank($_POST['phone']);
	    	$str="您的最高分为：".$data['score']."，当前排名：".$data['rank'];
	    	$this->ajaxReturn($str);
    	}
    }
    
    public function emptyUser($t){
    	if($t=="369"){
    		M('User')->where(1)->delete();
    		echo M('User')->count();
    	}
    }
    
}