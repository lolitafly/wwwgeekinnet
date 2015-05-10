<?php
namespace MarvelCinema\Model;
use Think\Model;
class UserModel extends Model {
	
	private $decidedNum=10;
	
	protected $_validate = array(
			array('phone','require','手机号不能为空！'),
			array('phone','number','手机号必须是数字！',2),
			array('score','require','分数不能为空！'),
			array('score','number','分数必须是数字！',2),
	);
	
	protected $_auto = array (
			array('ip','getIp',3,'callback'),
	);
	
	protected function getIp(){
		return get_client_ip();
	}
	
	//获取排名和最高分
	public function getRank($phone){
		$cdt['phone']=$phone;
		$temp=$this->where($cdt)->find();
		unset($cdt);
		$cdt['score']=array('gt',$temp['score']);
		$data['rank']=$this->where($cdt)->count()+1+$this->decidedNum;
		$data['score']=$temp['score'];
		return $data;
	}
	

}