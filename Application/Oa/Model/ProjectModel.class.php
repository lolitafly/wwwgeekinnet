<?php
namespace Oa\Model;
use Think\Model;
class ProjectModel extends Model {
	
	protected $_validate = array(
			array('name','require','项目名称不能为空！'),
			array('type','require','项目类型不能为空！'),
			array('pfrom','require','项目来源不能为空！'),
			array('outsouring','require','外包方不能为空！'),
			array('execute','require','执行人不能为空！'),
			array('status','require','项目状态不能为空！'),
			array('amount','require','项目金额不能为空！'),
			array('amount','number','金额必须是数字！',2),
			array('cost','number','成本必须是数字！',2),
	);
	protected $_auto = array (
			array('createBy','getNickname',3,'callback'),
	);
	
	protected function getNickname(){
		return session("oa_user.nickname");
	}
	
	public $fieldmap=array(
			'name'=>'名称',
			'type'=>'类别',
			'pfrom'=>'来源',
			'status'=>'状态',
			'amount'=>'金额',
			'outsourcing'=>'外包方',
			'cost'=>'成本',
			'execute'=>'执行人',
			'remark'=>'备注'
	);
	
	public $statuslist=array('进行中','待收款','已结束');
	
	public function getTypelist(){
		return $this->field('type')->group('type')->select();
	}
	
	public function getPfromlist(){
		return $this->field('pfrom')->group('pfrom')->select();
	}
	
	public function getOutsourcinglist(){
		return $this->field('outsourcing')->group('outsourcing')->select();
	}
	
	public function getExecutelist(){
		return $this->field('execute')->group('execute')->select();
	}
}