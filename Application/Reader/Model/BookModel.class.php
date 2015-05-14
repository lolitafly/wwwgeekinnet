<?php
namespace Reader\Model;
use Think\Model;
class BookModel extends Model {

	protected $_validate = array(
			array('title','require','书名不能为空！'),
			array('rid','number','主播编号必须是数字！',2),
	);
	
}