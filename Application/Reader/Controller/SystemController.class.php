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
     * 朗读内容页
     */
    public function book(){
    	$count      = M('Book')->count();
    	$Page       = new \Think\Page($count,10);
    	$show       = $Page->show();
    	$list = M('Book')->join("Reader ON Reader.rid= Book.rid")->order('bid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 主播列表
    	$this->assign('page',$show);
    	 
    	
    	$readerlist=M('Reader')->order("rid desc")->select();
    	$this->assign('readerlist',$readerlist);//主播数组
    	
    	$this->display();
    }
    
    /**
     * ajax添加朗读内容
     */
    public function book_add(){
    	$this->ajaxReturn(D('Book')->book_add($_POST),'json');
    }
    
    /**
     * ajax删除朗读内容
     */
    public function book_delete(){
    	$this->ajaxReturn(D('Book')->book_delete($_POST['bid']),'json');
    }
    
    
    /**
     * 任务页
     */
    public function plan(){
    	if($_GET['bid']){
    		$info=M('Book')->where("bid=".$_GET['bid'])->find();
    	}
    	if($info){
    		$cdt['bid']=$_GET['bid'];
    	}else{
    		$info=M('Book')->order("bid desc")->find();
    		$cdt['bid']=$info['bid'];//初始化书本序号，若不存在则查询最新的朗读内容
    	}
    	$this->assign("info",$info);//初始化书的信息
    	
    	$count      = M('Plan')->where($cdt)->count();
    	$Page       = new \Think\Page($count,10);
    	$show       = $Page->show();
    	$list = M('Plan')->where($cdt)->join("Reader ON Reader.rid= Plan.rid")
    				->join("Static ON Static.value= Plan.perform and Static.type='perform'")
    				->order('pid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 任务列表
    	$this->assign('page',$show);
    
    	 
    	$booklist=M('book')->order("bid desc")->select();
    	$this->assign('booklist',$booklist);//书名数组
    	
    	$readerlist=M('Reader')->order("rid desc")->select();
    	$this->assign('readerlist',$readerlist);//主播数组

    	$this->assign('performlist',D('static')->GetPerform());//完成情况数组
    	
    	$this->display();
    }
    
    /**
     * ajax添加任务
     */
    public function plan_add(){
    	$this->ajaxReturn(D('Plan')->plan_add($_POST),'json');
    }
    
    /**
     * ajax删除任务
     */
    public function plan_delete(){
    	$this->ajaxReturn(D('Plan')->plan_delete($_POST['pid']),'json');
    }
    
    /**
     * ajax编辑任务
     */
    public function plan_update(){
    	$this->ajaxReturn(D('Plan')->plan_update($_POST),'json');
    }
    
    /**
     * 系统页
     */
    public function sys(){
    	$list=M('Freshexp')->order("fid desc")->limit(5)->select();
    	$this->assign('list',$list);
    	
    	$this->display();
    }
    
    /**
     * ajax修改密码
     */
    public function password_update(){
    	$this->ajaxReturn(D('Reader')->password_update($_POST),'json');
    }
    
    /**
     * ajax修改昵称
     */
    public function nickname_update(){
    	$this->ajaxReturn(D('Reader')->nickname_update($_POST),'json');
    }
    
    /**
     * 重新计算用户exp
     */
    public function freshexp(){
    	if(IS_POST){
	    	$lastFresh=M('Freshexp')->order('fid desc')->find();//获取最后次计算时间
	    	
	    	$time_flag=time();//计时开始
	    	
	    	if($time_flag-strtotime($lastFresh['createDate'])<10*60){//刷新周期为10min
	    		$this->ajaxReturn("距上次更新时间小于10分钟，请稍后再试！",'json');
	    		exit(1);
	    	}
	    	
	    	$perform=D('Static')->perform;
	    	$rlist=M('Reader')->select();//主播数组
	    	for($i=0;$i<count($rlist);$i++){
	    		$cdt['rid']=$rlist[$i]['rid'];
	    		$tempList=M('Plan')->where($cdt)->select();//该主播任务数组
	    		$tempExp=0;
	    		for($j=0;$j<count($tempList);$j++){
	    			$tempExp=$tempExp+$tempList[$j]['zan']+$perform[$tempList[$j]['perform']-1]['exp'];//类和exp（赞+完成情况）
	    		}
	    		$update['exp']=$tempExp;
	    		M('Reader')->where($cdt)->save($update);
	    	}
	    	
	    	$data['detail']="耗时：".(time()-$time_flag)."s";
	    	$data['createBy']=session('reader.nickname');
	    	M('Freshexp')->add($data);
	    	$this->ajaxReturn(1,'json');
    	}else{
    		$this->error();
    	}
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
    
    private function addR(){
    	$data['username']="yanhan";
    	$data['password']="111111";
    	$data['power']=1;
    	$data['nickname']="闫寒";
    	
    	$Reader=D("Reader");
    	if(!$Reader->create($data)){
    		exit($Reader->getError());
    	}
    	$Reader->add();
    	
    	$data['username']="fuxiaoyu";
    	$data['password']="111111";
    	$data['power']=1;
    	$data['nickname']="符啸愚";
    	 
    	$Reader=D("Reader");
    	if(!$Reader->create($data)){
    		exit($Reader->getError());
    	}
    	$Reader->add();
    	
    	$data['username']="shenli";
    	$data['password']="111111";
    	$data['power']=1;
    	$data['nickname']="沈笠";
    	
    	$Reader=D("Reader");
    	if(!$Reader->create($data)){
    		exit($Reader->getError());
    	}
    	$Reader->add();
    }
    
    public function test(){
    	
    }
    
}