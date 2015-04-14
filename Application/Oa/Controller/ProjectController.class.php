<?php
namespace Oa\Controller;
use Think\Controller;
class ProjectController extends Controller {
	
	Public function _initialize(){
		// 初始化的时候检查用户权限
		if(!session('oa_user')) $this->redirect('Index/login');
// 		dump(ACTION_NAME);
	}
	
    public function index(){
    	$this->display();
    }
    
    public function plist(){
    	$count      = M('Project')->where('state=1')->count();// 查询满足要求的总记录数
    	$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show       = $Page->show();// 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = M('Project')->where('state=1')->order('createDate desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	
    	$this->display();
    }
    
    public function detail(){
    	if($_GET['pid']){
    		//项目详情数据加载
    		$info=M('project')->where('pid='.$_GET['pid'])->find();
    		$totalin=M('tally')->where('pid='.$_GET['pid']." and state=1")->sum('moneyin');
    		$totalout=M('tally')->where('pid='.$_GET['pid']." and state=1")->sum('moneyout');
    		$info['toGet']=$info['amount']-$totalin;
    		$info['toGive']=$info['cost']-$totalout;
    		$this->assign('info',$info);
    		
    		//状态数组数据加载
    		$this->assign('statuslist',D('Project')->statuslist);
    		
    		//项目记录数据加载
    		$tallylist=M('tally')->where('pid='.$_GET['pid']." and state=1")->select();
    		$this->assign('tallylist',$tallylist);
    		
    		$operatelist=M('operate')->where('pid='.$_GET['pid'])->select();
    		$this->assign('operatelist',$operatelist);
    		
	    	$this->display();
    	}else{
    		$this->error('访问地址出错','',1);
    	}
    }
    
    public function addproject(){
    	$this->assign('typelist',D('Project')->getTypelist());
    	$this->assign('fromlist',D('Project')->getPfromlist());
    	$this->assign('statuslist',D('Project')->statuslist);
    	$this->assign('outsourcinglist',D('Project')->getOutsourcinglist());
    	$this->assign('executelist',D('Project')->getExecutelist());
    	$this->display();
    }
    
    //新增项目
    public function submit(){
    	$Project = D("Project");
    	if (!$Project->create()){
    		$this->ajaxReturn($Project->getError());
    	}else{
    		//新增
    		$pid=$Project->add();
    		$operate="项目创建";
    		D('Operate')->addOperate($pid,$operate);//添加操作
    		echo 1;
    	}
    }
    
    //更新项目
    public function updateProject(){
    	$data=$_POST;
    	$cdt['pid']=$data['pid'];
    	$Project=D('Project');
    	$data = $Project->field('name,type,pfrom,status,amount,outsourcing,cost,execute,remark')->create($data);
    	if(!data){
    		$this->ajaxReturn($Project->getError());
    	}else{
    		D('Operate')->saveOperate($cdt['pid'],$data);
    		$Project->where($cdt)->save($data);
    		echo 1;
    	}
    }
    
    //添加记录
    public function addTally(){
    	$Tally=D('Tally');
    	if (!$Tally->create()){
    		$this->ajaxReturn($Tally->getError());
    	}else{
    		$Tally->add();
    		echo 1;
    	}
    }
    
    //删除记录
    public function deleteTally(){
    	if($_POST['tid']){
    		$data['state']=0;
    		M('Tally')->where('tid='.$_POST['tid'])->save($data);
    		echo 1;
    	}
    }
    
    
}