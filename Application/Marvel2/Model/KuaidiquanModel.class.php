<?php
namespace Marvel2\Model;
use Think\Model;
class KuaidiquanModel extends Model {
	
	public function getCode(){
		//查找发过的
		$now=time();
		$hourBefore=$now-1*60*60;//同一IP一小时只能领取一张
		$cdt['ip']=get_client_ip();
		$cdt['sendDate']=array('gt',$hourBefore);
		$cdt['state']=0;
		$r=$this->field('id,code,price')->where($cdt)->find();
		if($r){
			return $r;
		}
		
		unset($cdt);
		//查找新的
		$cdt['state']=1;
		if(rand(1,2)==1){
			$cdt['id']=array('gt',100000);
			$cdt['id']=array('elt',200000);
		}else{
			$cdt['id']=array('egt',1);
			$cdt['id']=array('elt',100000);
		}
		$rr=$this->field('id,code,price')->where($cdt)->find();
		//更新该券信息
		unset($cdt);
		$cdt['id']=$rr['id'];
		$data['ip']=get_client_ip();
		$data['sendDate']=time();
		$data['state']=0;
		$this->where($cdt)->save($data);
		
		return $rr;
	}

}