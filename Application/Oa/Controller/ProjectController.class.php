<?php
namespace Oa\Controller;
use Think\Controller;
class ProjectController extends Controller {
	
	/**
	 * 初始化验证权限
	 */
	Public function _initialize(){
		// 初始化的时候检查用户权限
		if(!session('oa_user')) $this->redirect('Index/login');
	}
	
	/**
	 * 数据统计页
	 */
    public function index(){
    	$cdt['state']=1;
    	
    	$info['amount']=M('project')->where($cdt)->sum("amount");
    	$info['cost']=M('project')->where($cdt)->sum("cost");
    	$info['profit']=$info['amount']-$info['cost'];
    	
    	$info['moneyin']=M('Tally')->where($cdt)->sum("moneyin");
    	$info['moneyout']=M('Tally')->where($cdt)->sum("moneyout");
    	
    	$pfrom=M('project')->field('pfrom,sum(amount),sum(cost)')->where($cdt)->group('pfrom')->order('sum(amount)-sum(cost) desc')->select();
    	$execute=M('project')->field('execute,sum(amount),sum(cost)')->where($cdt)->group('execute')->order('sum(amount)-sum(cost) desc')->select();
    	$status=M('project')->field('status,sum(amount),sum(cost)')->where($cdt)->group('status')->order('sum(amount)-sum(cost) desc')->select();
    	$type=M('project')->field('type,sum(amount),sum(cost)')->where($cdt)->group('type')->order('sum(amount)-sum(cost) desc')->select();
    	
    	$this->assign('info',$info);
    	$this->assign('pfromlist',$pfrom);
    	$this->assign('statuslist',$status);
    	$this->assign('typelist',$type);
    	$this->assign('executelist',$execute);
    	
    	$this->display();
    }
    
    /**
     * 项目列表页面
     */
    public function plist(){
    	if($_GET['name']){
    		$cdt['name']=array('like','%'.$_GET['name'].'%');
    	}
    	if($_GET['type']){
    		$cdt['type']=$_GET['type'];
    	}
    	if($_GET['pfrom']){
    		$cdt['pfrom']=$_GET['pfrom'];
    	}
    	if($_GET['status']){
    		$cdt['status']=$_GET['status'];
    	}
    	if($_GET['execute']){
    		$cdt['execute']=$_GET['execute'];
    	}
    	
    	$count      = M('Project')->where($cdt)->where('state=1')->count();// 查询满足要求的总记录数
    	$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
    	$show       = $Page->show();// 分页显示输出
    	// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
    	$list = M('Project')->where($cdt)->where('state=1')->order('createDate desc')->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 赋值数据集
    	$this->assign('page',$show);// 赋值分页输出
    	
    	$this->assign('typelist',D('Project')->getTypelist());//类型列表
    	$this->assign('pfromlist',D('Project')->getPfromlist());//来源列表
    	$this->assign('statuslist',D('Project')->statuslist);//状态列表
    	$this->assign('executelist',D('Project')->getExecutelist());//执行人列表
    	
    	$this->display();
    }
    
    /**
     * 项目详情页面
     */
    public function detail(){
    	if($_GET['pid']){
    		
    		//项目属性数据加载
    		$info=M('project')->where('pid='.$_GET['pid'])->find();
    		$totalin=M('tally')->where('pid='.$_GET['pid']." and state=1")->sum('moneyin');
    		$totalout=M('tally')->where('pid='.$_GET['pid']." and state=1")->sum('moneyout');
    		$info['toGet']=$info['amount']-$totalin;
    		$info['toGive']=$info['cost']-$totalout;
    		$this->assign('info',$info);
    		
    		$this->assign('statuslist',D('Project')->statuslist);//状态数组数据加载
    		
    		$tallylist=M('tally')->where('pid='.$_GET['pid']." and state=1")->select();
    		$this->assign('tallylist',$tallylist);//项目记录数据加载
    		
    		$operatelist=M('operate')->where('pid='.$_GET['pid'])->select();
    		$this->assign('operatelist',$operatelist);//所有操作记录数据加载
    		
	    	$this->display();
    	}else{
    		$this->error('访问地址出错','',1);
    	}
    }
    
    /**
     * 新增项目页面
     */
    
    public function addproject(){
    	$this->assign('typelist',D('Project')->getTypelist());
    	$this->assign('fromlist',D('Project')->getPfromlist());
    	$this->assign('statuslist',D('Project')->statuslist);
    	$this->assign('outsourcinglist',D('Project')->getOutsourcinglist());
    	$this->assign('executelist',D('Project')->getExecutelist());
    	$this->display();
    }
    
    /**
     * 新增项目提交
     */
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
    
    /**
     * 编辑项目属性
     */
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
    
    /**
     * 添加项目记录
     */
    public function addTally(){
    	$Tally=D('Tally');
    	if (!$Tally->create()){
    		$this->ajaxReturn($Tally->getError());
    	}else{
    		$Tally->add();
    		echo 1;
    	}
    }
    
    /**
     * 删除项目记录
     */
    public function deleteTally(){
    	if($_POST['tid']){
    		$data['state']=0;
    		M('Tally')->where('tid='.$_POST['tid'])->save($data);
    		echo 1;
    	}
    }
    
    
}