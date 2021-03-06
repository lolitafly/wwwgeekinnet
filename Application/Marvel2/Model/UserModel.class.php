<?php
namespace Marvel2\Model;
use Think\Model;
class UserModel extends Model {
	
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
	
	
	public $getRankNum=500;
	
	//获取今日当前可领奖的分数
	public function getScore(){
		$today=date('Y-m-d',time());
    	$cdt['createDate']=array('egt',$today);
		$list=$this->field('phone,max(score)')->where($cdt)->group('phone')->select();
		//冒泡排序
		for($i=0;$i<count($list);$i++){
			for($j=$i+1;$j<count($list);$j++){
				if($list[$i]['max(score)']<$list[$j]['max(score)']){
					$temp=$list[$i];
					$list[$i]=$list[$j];
					$list[$j]=$temp;
				}
			}
		}
		$score=count($list)>$this->getRankNum?$list[$this->getRankNum-1]['max(score)']:0;
		if($score==0) $score=10;
		return $score;
	}
	
	
	//获取排名
	public function getRank(){
		$today=date('Y-m-d',time());
    	$cdt['createDate']=array('egt',$today);
    	$cdt['score']=array("lt",1980);
		$list=$this->field('phone,max(score)')->where($cdt)->group('phone')->select();
		for($i=0;$i<count($list);$i++){
			$list[$i]['phone']=substr_replace($list[$i]['phone'],'****',3,4);
		}
		//冒泡排序
		for($i=0;$i<count($list);$i++){
			for($j=$i+1;$j<count($list);$j++){
				if($list[$i]['max(score)']<$list[$j]['max(score)']){
					$temp=$list[$i];
					$list[$i]=$list[$j];
					$list[$j]=$temp;
				}
			}
		}
		if(count($list)>30) $list=array_slice($list,0,30);
		return $list;
	}
	

}