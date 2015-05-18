<?php
namespace Reader\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller {
    public function index(){
    	$this->redirect('readerlist');
    }
    
    /**
     * 主播列表
     */
    public function readerlist(){
    	$count      = M('Reader')->count();
    	$Page       = new \Think\Page($count,10);
    	$show       = $Page->show();
    	$list = M('Reader')->limit($Page->firstRow.','.$Page->listRows)->order("exp desc")->select();
    	$this->assign('list',$list);// 主播列表
    	$this->assign('page',$show);
    	
    	$this->display();
    }
    
    /**
     * 主播详情
     */
    public function readerdetail(){
    	if($_GET['rid']){
    		$info=M('Reader')->where('rid='.$_GET['rid'])->find();
    		$this->assign('info',$info);//主播信息
    		
    		$count      = M('Plan')->join("Book ON Plan.bid=Book.bid and Plan.rid=".$_GET['rid'])
    						->join("Static ON Static.value= Plan.perform and Static.type='perform'")->count();
    		$Page       = new \Think\Page($count,10);
    		$show       = $Page->show();
    		$list		= M('Plan')->join("Book ON Plan.bid=Book.bid and Plan.rid=".$_GET['rid'])
    						->join("Static ON Static.value= Plan.perform and Static.type='perform'")
    						->limit($Page->firstRow.','.$Page->listRows)->select();
    		$this->assign('list',$list);//任务信息
    		$this->assign('page',$show);
    		
	    	$this->display(); 
    	}else{
    		$this->error();
    	}
    }
    
    /**
     * 朗读内容列表
     */
    public function booklist(){
    	$count      = M('Book')->count();
    	$Page       = new \Think\Page($count,10);
    	$show       = $Page->show();
    	$list = M('Book')->join("Reader ON Reader.rid=Book.rid")->limit($Page->firstRow.','.$Page->listRows)->select();
    	$this->assign('list',$list);// 书名列表
    	$this->assign('page',$show);
    	
    	$this->display();
    }
    
    /**
     * 朗读内容详情
     */
    public function bookdetail(){
    	if($_GET['bid']){
    		$info=M('Book')->join("Reader ON Book.rid=Reader.rid and Book.bid=".$_GET['bid'])->find();
    		$this->assign('info',$info);
    		
    		$count      = M('Plan')->join("Static ON Static.value= Plan.perform and Static.type='perform'")
						    		->join("Reader ON Plan.rid=Reader.rid")
						    		->where("bid=".$_GET['bid'])
						    		->count();
    		$Page       = new \Think\Page($count,10);
    		$show       = $Page->show();
    		$list		= M('Plan')->join("Static ON Static.value= Plan.perform and Static.type='perform'")
						    		->join("Reader ON Plan.rid=Reader.rid")
						    		->where("bid=".$_GET['bid'])
						    		->limit($Page->firstRow.','.$Page->listRows)
						    		->order("pid asc")
						    		->select();
    		
    		$this->assign('list',$list);//任务信息
    		$this->assign('page',$show);
    		
	    	$this->display();
    	}else{
    		$this->error();
    	}
    }
    
    
    
    
}