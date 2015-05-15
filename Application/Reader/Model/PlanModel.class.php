<?php
namespace Reader\Model;
use Think\Model;
class PlanModel extends Model {
	
	protected $_validate = array(
			array('rid','require','主播编号不能为空！'),
			array('rid','number','主播编号必须是数字！'),
			array('bid','require','书名编号不能为空！'),
			array('bid','number','书名编号必须是数字！'),
			array('chapter','require','章节不能为空！'),
			array('perform','require','完成情况不能为空！'),
			array('perform','number','书名编号必须是数字！'),
			array('zan','number','赞数量必须是数字！'),
	);
	
	/**
	 * 添加朗读任务
	 * @param object $data:bid,rid,chapter,startpage,endpage,perform,zan
	 * @return string|number
	 */
	public function plan_add($data){
		if (!$this->create($data)){
			return $this->getError();
		}else{
			$this->add();
			return 1;
		}
	}
	
	
	/**
	 * 删除任务
	 * @param int $pid
	 * @return string|number
	 */
	public function plan_delete($pid){
		$cdt['pid']=$pid;
		$this->where($cdt)->delete();
		return 1;
	}
	
	/**
	 * 编辑任务
	 * @param object $data:chapter,startpage,endpage,perform,zan
	 * @return string|number
	 */
	public function plan_update($data){
		$cdt['pid']=$data['pid'];
		unset($data['pid']);
		$r=$this->where($cdt)->find();
		if (!$this->field('chapter,startpage,endpage,perform,zan')->create($data)){
			return $this->getError();
		}else{
			$this->where($cdt)->save();
			return 1;
		}
	
	}

}