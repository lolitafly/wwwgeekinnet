<?php
namespace Oa\Controller;
use Think\Controller;
use Com\WechatCorp;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller {
	
	private $userId='';
	private $deviceId='';
	
	/**
	 * 微信菜单点击无感知登陆
	 */
    public function index(){
    	if($_GET['code']){
    		$corp=new WechatCorp(C('CorpID'), C('CorpSecret'));
    		$access_token=$corp->getAccessToken();
    		$user=$corp->getUserInfo($access_token, $_GET['code'],1);//1为应用id
    		$cdt['userId']=$user['UserId'];
    		$cdt['deviceId']=$user['DeviceId'];
    		
    		$this->userId=$user['UserId'];
    		$this->deviceId=$user['DeviceId'];
    		
    		$r=M('User')->where($cdt)->find();
    		if($r){
    			session('oa_user',$r);
    			$this->redirect('Project/index');
    		}else{
    			$this->redirect('login');
    		}
    	}else{
	    	$this->redirect('login');
    	}
    }
    
    /**
     * 登陆页
     */
    public function login(){
    	if(cookie('oa_username')&&$this->userId==''){//PC端登陆
    		$returninfo=D('user')->checkLogin(cookie('oa_username'),cookie('oa_password'),true);
    		if($returninfo['status']==1){
    			$this->redirect('Project/index');
    		}
    	}
    	$this->display();
    }
    
    /**
     * 登陆提交
     */
    public function submit(){
    	$returninfo=D('user')->checkLogin($_POST['username'],$_POST['password'],false);
    	
    	if($returninfo['status']==1&&$_POST['remember']&&$this->userId==''){//PC端登陆成功
    		cookie('oa_username',$_POST['username'],172800);
    		cookie('oa_password',D('user')->pwdEncrypt($_POST['password']),172800);
    	}
    	if($returninfo['status']==1&&$_POST['remember']&&$this->userId){//移动端登陆
    		$data['userId']=$this->userId;
    		$data['deviceId']=$this->deviceId;
    		M('User')->where('username='.$_POST['username'])->save($data);
    	}
    	
    	$this->ajaxReturn($returninfo,'json');
    }
    
    /**
     * 登出
     */
    public function logout(){
    	session('oa_user',null);
    	cookie('oa_username',null);
    	cookie('oa_password',null);
    	$this->redirect('login');
    }
    
    
    
    
    /**
     * temp functions
     */
    public function adduser(){
    	$data['username']="sunzhenlong";
    	$data['password']=md5(C('SECRET_KEY')."sun123");
    	$data['nickname']="孙振龙";
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
    	if($this->userId)echo 1;
    }
    
}