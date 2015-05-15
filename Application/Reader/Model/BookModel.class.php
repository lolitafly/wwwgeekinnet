<?php
namespace Reader\Model;
use Think\Model;
class BookModel extends Model {

	protected $_validate = array(
			array('title','require','书名不能为空！'),
			array('title','require','该朗读任务已存在！',0,'unique'),
			array('rid','number','主播编号必须是数字！',2),
	);
	
	/**
	 * 添加朗读内容，并添加一条项目经理任务
	 * @param object $data:title,rid
	 * @return number|String
	 */
	public function book_add($data){
		if (!$this->create($data)){
			return $this->getError();
		}else{
			$r=$this->add();
			$plandata['bid']=$r;
			$plandata['rid']=$data['rid'];
			$plandata['chapter']="无";
			$plandata['perform']=6;
			D('Plan')->plan_add($plandata);//并添加一条项目经理任务
			return 1;
		}
	}
	
	/**
	 * 删除朗读内容
	 * @param int $bid
	 * @return number
	 */
	public function book_delete($bid){
		$cdt['bid']=$bid;
		$this->where($cdt)->delete();
		return 1;
	}
	
}