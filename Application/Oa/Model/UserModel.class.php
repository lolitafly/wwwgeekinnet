<?php
namespace Oa\Model;
use Think\Model;
class UserModel extends Model {
	
	public function pwdEncrypt($pwd){
		return md5((C('SECRET_KEY').$pwd));
	}
	
	public function checkLogin($username,$password,$isCookie){
		$cdt['username']=$username;
		$e=$this->where($cdt)->find();
		$cdt['password']=$isCookie?$password:$this->pwdEncrypt($password);
		$r=$this->where($cdt)->find();
		if($r){
			session('oa_user',$r);
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

}