<?php
namespace Reader\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class SystemController extends Controller {
	
	/**
	 * 构造函数，验证是否登陆
	 */
	Public function _initialize(){
		if (!session('reader')&&ACTION_NAME!="login"&&ACTION_NAME!="login_submit"){
			$this->redirect('login');
		}
	}
	
	/**
	 * 登陆页
	 */
	public function login(){
		$this->display();
	}
	
	/**
	 * 登陆页提交
	 */
	public function login_submit(){
		$returninfo=D('Reader')->login_submit($_POST['username'],$_POST['password']);
		$this->ajaxReturn($returninfo,'json');
	}
	
	/**
	 * 登出
	 */
	public function logout(){
		session('reader',null);
		$this->redirect('login');
	}
	
	/**
	 * 首页
	 */
	public function index(){
		$this->redirect('reader');
	}
	
	/**
	 * 主播列表页
	 */
    public function reader(){
    	$count      = M('Reader')->count();
    	$Page       = new \Think\Page($count,10);
    	$show       = $Page->show();
    	$list = M('Reader')->join("Static ON Static.value= Reader.power and Static.type='power'")->order('rid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 主播列表
    	$this->assign('page',$show);
    	
    	$this->assign('powerlist',D('static')->GetPower());//权限数组
    	
    	$this->display();
    }
    
    /**
     * ajax添加主播
     */
    public function reader_add(){
    	$this->ajaxReturn(D('reader')->reader_add($_POST),'json');
    }
    
    /**
     * ajax删除主播
     */
    public function reader_delete(){
    	$this->ajaxReturn(D('reader')->reader_delete($_POST['rid']),'json');
    }
    /**
     * ajax编辑主播
     */
    public function reader_update(){
    	$this->ajaxReturn(D('reader')->reader_update($_POST),'json');
    }
    
    
	/**
	 * temp functions
	 */    
    public function add_power(){
//     	D('Static')->AddPower();
    }
    
    public function add_perform(){
//     	D('Static')->AddPerform();
    }
    
    public function addR(){
    	$data['username']="yanhan";
    	$data['password']="111111";
    	$data['power']=1;
    	$data['nickname']="闫寒";
    	
    	$Reader=D("Reader");
    	if(!$Reader->create($data)){
    		exit($Reader->getError());
    	}
    	echo $Reader->add();
    }
    
    public function showsession(){
    	dump(session('reader.power'));
    }
    
    public function clearsession(){
    	session(null);
    }
    
    public function test(){
    	$cdt['rid']=4;
    	$r=M('Reader')->where($cdt)->find();
    	dump($r);
    }
    
}