<?php
namespace Reader\Model;
use Think\Model;
class ReaderModel extends Model {
	
	protected $_validate = array(
			array('username','require','该账号已存在！',0,'unique'),
			array('password','require','密码不能为空！'),
			array('power','number','权限必须是数字！'),
			array('nickname','require','昵称不能为空！'),
	);
	
	protected $_auto = array (
			array('password','md5',1,'function') ,
			array('password','',2,'ignore'),
	);
	
	/**
	 * 登陆
	 * @param string $username
	 * @param string $password
	 * @return array
	 */
	public function login_submit($username,$password){
		$cdt['power']=array('in',array(1,2));//权限
		
		$cdt['username']=$username;
		$e=$this->where($cdt)->find();
		$cdt['password']=md5($password);
		$r=$this->where($cdt)->find();
		if($r){
			session('reader',$r);
			$returninfo['status']=1;
			$returninfo['info']="账号密码正确！";
		}else if($e){
			$returninfo['status']=2;
			$returninfo['info']="密码错误！";
		}else{
			$returninfo['status']=3;
			$returninfo['info']="账号不存在！";
		}
		return $returninfo;
	}
	
	/**
	 * 添加主播，并验证权限
	 * @param object $data:username,nickname,power
	 * @return string|number
	 */
	public function reader_add($data){
		$data['password']="111111";//默认密码
		if (!$this->create($data)){
			return $this->getError();
		}elseif($data['power']<=session('reader.power')){
			return "您的权限不够！";
		}else{
			$this->add();
			return 1;
		}
	}
	
	/**
	 * 删除主播，并验证权限
	 * @param int $rid
	 * @return string|number
	 */
	public function reader_delete($rid){
		$cdt['rid']=$rid;
		$r=$this->where($cdt)->find();
		if($r['power']<=session('reader.power')){
			return "您的权限不够！";
		}else{
			$this->where($cdt)->delete();
			return 1;
		}
	}
	
	/**
	 * 编辑主播，并验证权限
	 * @param object $data:nickname,power
	 * @return string|number
	 */
	public function reader_update($data){
		$cdt['rid']=$data['rid'];
		unset($data['rid']);
		$r=$this->where($cdt)->find();
		if (!$this->field('nickname,power')->create($data,2)){
			return $this->getError();
		}elseif($data['power']<=session('reader.power')||$r['power']<=session('reader.power')){
			return "您的权限不够！";
		}else{
			$this->where($cdt)->save();
			return 1;
		}
	}
	
	/**
	 * 修改密码
	 * @param object $data：password,newPassword,rePassword
	 * @return string|number
	 */
	public function password_update($data){
		$update['password']=$data['newPassword'];
		
		$cdt['password']=md5($data['password']);
		$cdt['rid']=session("reader.rid");
		if(!$this->where($cdt)->find()){
			return "原密码错误";
		}elseif($data['newPassword']!=$data['rePassword']){
			return "两次密码输入不一致！";
		}elseif(!$this->create($update)){
			return $this->getError();
		}else{
			$this->where($cdt)->save();
			return 1;
		}
	}
	
	/**
	 * 修改昵称
	 * @param object $data：password,newPassword,rePassword
	 * @return string|number
	 */
	public function nickname_update($data){
		$cdt['rid']=session("reader.rid");
		if(!$this->create($data,2)){
			return $this->getError();
		}else{
			$this->where($cdt)->save();
			$r=$this->where($cdt)->find();
			session('reader',$r);//重置session
			return 1;
		}
	}
	
}