<?php
namespace Oa\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller {
    public function index(){
    	echo C('MIX');
    }
    
    public function login(){
    	if(cookie('oa_username')){
    		$returninfo=D('user')->checkLogin(cookie('oa_username'),cookie('oa_password'),true);
    		if($returninfo['status']==1){
    			$this->redirect('Project/index');
    		}
    	}
    	$this->display();
    }
    
    public function submit(){
    	$returninfo=D('user')->checkLogin($_POST['username'],$_POST['password'],false);
    	
    	if($returninfo['status']==1&&$_POST['remember']){
    		cookie('oa_username',$_POST['username'],172800);
    		cookie('oa_password',D('user')->pwdEncrypt($_POST['password']),172800);
    	}
    	$this->ajaxReturn($returninfo,'json');
    }
    
    public function logout(){
    	session('oa_user',null);
    	cookie('oa_username',null);
    	cookie('oa_password',null);
    	$this->redirect('login');
    }
    
    
    public function adduser(){
    	$data['username']="shenli";
    	$data['password']=md5(C('MIX')."sun123");
    	$data['nickname']="沈笠";
    	M('user')->add($data);
    }
    
    public function getc(){
    	echo cookie('oa_password');
    }
    
    public function putc(){
    	cookie('name','321',15);
    	cookie('pwd','321',15);
    	echo "put cookie";
    }
    
    public function test(){
    	$newData['name']="test111";
    	D('operate')->saveOperate(4,$newData);
    }
    
}