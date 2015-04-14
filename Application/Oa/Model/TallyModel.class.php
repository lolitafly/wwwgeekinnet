<?php
namespace Oa\Model;
use Think\Model;
class TallyModel extends Model {
	protected $_validate = array(
			array('pid','require','项目编号不能为空！'),
			array('moneyin','number','进账必须是数字！',2),
			array('moneyout','number','出账必须是数字！',2),
	);
	protected $_auto = array (
			array('createBy','getNickname',3,'callback'),
	);
	
	protected function getNickname(){
		return session("oa_user.nickname");
	}
	
}