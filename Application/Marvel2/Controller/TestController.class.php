<?php
namespace Marvel2\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class TestController extends Controller {
	public function index($score){
		$cdt['score']=array('gt',$score);
		$result=M('user')->where($cdt)->select();
		dump($result);
	}
	
	public function stat($start,$end,$day){
		if($day&&$start&&$end){
			$today=date('Y-m-d',time());
			$a=$day;
			$b=date('Y-m-d',strtotime($a)+24*60*60);
			$cdt['createDate']=array('between',array($a,$b));
			$list=M('user')->field('phone,max(score)')->where($cdt)->group('phone')->select();
			for($i=0;$i<count($list);$i++){
				for($j=$i+1;$j<count($list);$j++){
					if($list[$i]['max(score)']<$list[$j]['max(score)']){
						$temp=$list[$i];
						$list[$i]=$list[$j];
						$list[$j]=$temp;
					}
				}
			}
			if(count($list)>($end-$start+1)) $list=array_slice($list,$start-1,$end);
			for($i=0;$i<count($list);$i++){
				$phones=$phones."<br/>".$list[$i]['phone'];
			}
			$this->assign('day',$day);
			$this->assign('s',$start);
			$this->assign('e',$end);
			$this->assign('phones',$phones);
			$this->assign('list',$list);
			$this->display();
// 			for($k=0;$k<=$days;$k++){
// 				$a=date('Y-m-d',strtotime($startDay)+$k*24*60*60);
// 				$b=date('Y-m-d',strtotime($startDay)+($k+1)*24*60*60);
// 				$cdt['createDate']=array('between',array($a,$b));
// 				$list=M('user')->where($cdt)->group('phone')->select();
// 				//冒泡排序
// 				for($i=0;$i<count($list);$i++){
// 					for($j=$i+1;$j<count($list);$j++){
// 						if($list[$i]['max(score)']<$list[$j]['max(score)']){
// 							$temp=$list[$i];
// 							$list[$i]=$list[$j];
// 							$list[$j]=$temp;
// 						}
// 					}
// 				}
// 				if(count($list)>$s) $list=array_slice($list,0,$s);
// 				$out[$k]=$list;
// 				dump($a);
// 			}
// 			dump($out);
		}
	}
	
	public function phone($num){
		$number = "13701653158";
		$url = 'http://webservice.webxml.com.cn/WebServices/MobileCodeWS.asmx/getMobileCodeInfo';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		$data = simplexml_load_string($data);
		if (strpos($data, 'http://')) {
			echo  '手机号码格式错误!';
		} else {
			echo $data;
		}
	}
	
	public function test(){
		echo date('Y-m-d H:i:s',1431006438);
	}
	
	public function show1($p){
		$today=strtotime(date('2015-5-6 22:00',time()));
// 		echo date("Y-m-d H:i:s",$today);
		$cdt['price']=$p;
		$cdt['sendDate']=array('gt',$today);
		$out=M('Kuaidiquan')->where($cdt)->find();
		dump($out);
	}
	
	public function show2($p){
		$cdt['state']=1;
		$cdt['price']=$p;
		$out=M('Kuaidiquan')->where($cdt)->find();
		dump($out);
	}
	
	
	
}