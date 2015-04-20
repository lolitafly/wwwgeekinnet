<?php
namespace Marvel2\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//可获奖最低分
    	$this->assign('minScore',D('User')->getScore());
    	//奖品顺序随机
    	$prize1="恭喜！获得商城购物券一份！代码为：000001";
    	$prize2="恭喜！获得快的打车券一份！代码为：XXXXXX";
    	if(rand(1,2)==1){
    		$this->assign('prize1',$prize1);
    		$this->assign('prize2',$prize2);
    	}else{
    		$this->assign('prize1',$prize2);
    		$this->assign('prize2',$prize1);
    	}
    	
    	$this->display();
    }
    
    public function rank(){
    	$list=D('User')->getRank();
    	$this->assign('list',$list);
    	$this->display();
    }
    
    public function submit(){
   		$User = D("User");
    	if (!$User->create()){
    		$this->ajaxReturn($User->getError());
    	}else{
    		$User->add();
    		echo 1;
    	}
    }
    
    public function test(){
    	dump(D('User')->getScore());
    	$today=date('Y-m-d',time());
    	$cdt['createDate']=array('egt',$today);
    	$list=M('User')->field('phone,max(score)')->where($cdt)->group('phone')->order('score desc,createDate desc')->limit(30)->select();
    	dump($list);
    }
    
    public function add(){
    	
    	$data['phone']="13701653154";
    	$data['score']=500;
    	$data['ip']=20;
    	M('User')->add($data);
    }
}