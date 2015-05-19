<?php
namespace Oa\Model;
use Think\Model;
class OperateModel extends Model {
	
	/**
	 * 添加项目操作记录
	 * @param int $pid
	 * @param string $operate
	 */
	public function addOperate($pid,$operate){
		$data['pid']=$pid;
		$data['operate']=$operate;
		$data['createBy']=session("oa_user.nickname");
		$this->add($data);
	}
	
	public function saveOperate($pid,$newData){
		$oldData=M('project')->where('pid='.$pid)->find();
		$data['pid']=$pid;
		$data['createBy']=session("oa_user.nickname");
		$fm=D('project')->fieldmap;
		foreach ($newData as $k=>$v){
			if($newData[$k]!=$oldData[$k]){
				$data['operate']=$fm[$k]." 从 ".$oldData[$k]." 修改为 ".$newData[$k];
				$this->add($data);
			}
		}
	}
	
}