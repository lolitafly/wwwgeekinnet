<?php
namespace Marvel2\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller {
    public function index(){
    	//可获奖最低分
    	$this->assign('minScore',D('User')->getScore());
    	//快的打车券
    	$tickt=D('Kuaidiquan')->getCode1();
//     	$tickt['code']="券已发完，我们会尽快补充！";
    	//奖品顺序随机
    	$prize1="恭喜英雄！<br/>获得吉列京东商城优惠券！";
    	$prize2="恭喜英雄！获得一号专车".$tickt['price']."元专车券一张！长按复制编码<br/>编码为：".$tickt['code'];
    	$this->assign('flag',"2");
    	$this->assign('prize1',$prize2);
    	$this->assign('prize2',$prize1);
    	$this->assign('ticket',$tickt);
//     	if(rand(1,2)==1){
//     		$this->assign('flag',"1");
//     		$this->assign('prize1',$prize1);
//     		$this->assign('prize2',$prize2);
//     	}else{
//     		$this->assign('flag',"2");
//     		$this->assign('prize1',$prize2);
//     		$this->assign('prize2',$prize1);
//     	}
    	
//     	$this->redirect('Temp/index');
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
    
    //watsons获得代码
    public function watsons(){
    	$code=D('Kuaidiquan')->watsonsCode();
//     	$code=D('Kuaidiquan')->getCode();
    	$this->ajaxReturn($code);
    }
    
    public function showInventory(){
    	$cdt['price']=15;
    	$cdt['state']=1;
    	$rest15=M('kuaidiquan')->where($cdt)->count();
    	$rest215=M('fifteen')->where($cdt)->count();
    	$cdt['price']=10;
    	$rest10=M('kuaidiquan')->where($cdt)->count();
    	$rest210=M('fifteen')->where($cdt)->count();
    	echo "第一批券》》》》10元券剩余".$rest10."张\n"."15元券剩余".$rest15."张<br/>";
    	echo "第二批券》》》》10元券剩余".$rest210."张\n"."15元券剩余".$rest215."张";
    }
    
}