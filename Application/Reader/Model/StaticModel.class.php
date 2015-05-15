<?php
namespace Reader\Model;
use Think\Model;
class StaticModel extends Model {
	protected $_validate = array(
			array('type','require','类型不能为空！'),
			array('value','number','序号必须是数字！',2),
			array('text','require','描述不能为空！'),
	);
	
	private $power=array(
			array("value"=>1,"text"=>"管理员"),
			array("value"=>2,"text"=>"信息维护员"),
			array("value"=>3,"text"=>"成员"),
	);
	
	public $perform=array(
			array("value"=>1,"text"=>"提前交工","exp"=>10),
			array("value"=>2,"text"=>"按时交工","exp"=>5),
			array("value"=>3,"text"=>"延期交工","exp"=>2),
			array("value"=>4,"text"=>"未交工","exp"=>0),
			array("value"=>5,"text"=>"救火队员","exp"=>20),
			array("value"=>6,"text"=>"项目经理","exp"=>10),
	);
	
	/**
	 * 在静态数据表中添加权限
	 */
	public function AddPower(){
		$data['type']="power";
		$arr=$this->power;
		for($i=0;$i<count($arr);$i++){
			$data['value']=$arr[$i]['value'];
			$data['text']=$arr[$i]['text'];
			$this->add($data);
		}
	}
	
	/**
	 * 在静态数据表中添加完成情况
	 */
	public function AddPerform(){
		$data['type']="perform";
		$arr=$this->perform;
		for($i=0;$i<count($arr);$i++){
			$data['value']=$arr[$i]['value'];
			$data['text']=$arr[$i]['text'];
			$this->add($data);
		}
	}
	
	/**
	 * 获取权限数组
	 */
	public function GetPower(){
		return $this->where("type='power'")->order("value desc")->select();
	}
	
	/**
	 * 获取完成情况数组
	 */
	public function GetPerform(){
		return $this->where("type='perform'")->limit(5)->select();
	}

}