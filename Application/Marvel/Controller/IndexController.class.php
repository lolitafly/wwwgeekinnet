<?php
namespace Marvel\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
//     	$data['phone']="1375468513";
//     	$data['score']=320;
//     	$data['ip']=get_client_ip();
//     	M('user')->add($data);
		$this->display();
    }
    
    public function login(){
    	if($_POST['phone']){
    		$phone=$_POST['phone'];
    		session('marvel_phone',$phone);
    		echo 1;
    	}
    }
    
    public function submitScore(){
    	if($_POST['score']&&session('marvel_phone')){
    		$data['phone']=session('marvel_phone');
	    	$data['score']=$_POST['score'];
	    	$data['ip']=get_client_ip();
    		M('user')->add($data);
    		echo 1;
    	}
    }
    public function show(){
    	$this->display();
    }
    
    public function test(){
    	dump(session());
    }
    
}