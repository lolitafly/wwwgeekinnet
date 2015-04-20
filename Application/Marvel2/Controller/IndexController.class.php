<?php
namespace Marvel2\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	//可获奖最低分
    	$this->assign('minScore',D('User')->getScore());
    	//快的打车券
    	$tickt=D('Kuaidiquan')->getCode();
    	//奖品顺序随机
    	$prize1="恭喜！获得商城购物券一份！代码为：000001";
    	$prize2="恭喜！获得快的".$tickt['price']."元专车券一张！代码为：".$tickt['code'];
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
// 		dump($list);
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
    	dump(D('Kuaidiquan')->getCode());
    	echo 1;
    }
    
    public function add(){
    	
    	$data['phone']="13701653154";
    	$data['score']=500;
    	$data['ip']=20;
    	M('User')->add($data);
    }
}