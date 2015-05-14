<?php
namespace Reader\Model;
use Think\Model;
class PlanModel extends Model {
	
	protected $_validate = array(
			array('rid','require','主播编号不能为空！'),
			array('bid','require','书名编号不能为空！'),
			array('chapter','require','章节不能为空！'),
			array('perform','require','完成情况不能为空！'),
	);
	

}