<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Oa\Controller;

use Think\Controller;
use Com\Wechat;
use Com\WechatAuth;
header("Content-type: text/html; charset=utf-8");
class WechatController extends Controller{
	
    /**
     * 微信消息接口入口
     * 所有发送到微信的消息都会推送到该操作
     * 所以，微信公众平台后台填写的api地址则为该操作的访问地址
     */
    public function index($id = ''){
        $token = 'geekin'; //微信后台填写的TOKEN

        /* 加载微信SDK */
        $wechat = new Wechat($token);
        /* 获取请求信息 */
        $data = $wechat->request();

        if($data && is_array($data)){

            /**
             * 你可以在这里分析数据，决定要返回给用户什么样的信息
             * 接受到的信息类型有9种，分别使用下面九个常量标识
             * Wechat::MSG_TYPE_TEXT       //文本消息
             * Wechat::MSG_TYPE_IMAGE      //图片消息
             * Wechat::MSG_TYPE_VOICE      //音频消息
             * Wechat::MSG_TYPE_VIDEO      //视频消息
             * Wechat::MSG_TYPE_MUSIC      //音乐消息
             * Wechat::MSG_TYPE_NEWS       //图文消息（推送过来的应该不存在这种类型，但是可以给用户回复该类型消息）
             * Wechat::MSG_TYPE_LOCATION   //位置消息
             * Wechat::MSG_TYPE_LINK       //连接消息
             * Wechat::MSG_TYPE_EVENT      //事件消息
             *
             * 事件消息又分为下面五种
             * Wechat::MSG_EVENT_SUBSCRIBE          //订阅
             * Wechat::MSG_EVENT_SCAN               //二维码扫描
             * Wechat::MSG_EVENT_LOCATION           //报告位置
             * Wechat::MSG_EVENT_CLICK              //菜单点击
             * Wechat::MSG_EVENT_MASSSENDJOBFINISH  //群发消息成功
             */
        	
        	
        	$type    = Wechat::MSG_TYPE_TEXT; //回复消息的类型
        	/* 响应当前请求(自动回复) */
//         	$wechat->response($content, $type);
            
            /**
             * 响应当前请求还有以下方法可以只使用
             * 具体参数格式说明请参考文档
             * 
             * $wechat->replyText($text); //回复文本消息
             * $wechat->replyImage($media_id); //回复图片消息
             * $wechat->replyVoice($media_id); //回复音频消息
             * $wechat->replyVideo($media_id, $title, $discription); //回复视频消息
             * $wechat->replyMusic($title, $discription, $musicurl, $hqmusicurl, $thumb_media_id); //回复音乐消息
             * $wechat->replyNews($news, $news1, $news2, $news3); //回复多条图文消息
             * $wechat->replyNewsOnce($title, $discription, $url, $picurl); //回复单条图文消息
             * 
             */
        }
    }
     
     /**
     * 创建自定义菜单
     */
    public function menu(){
    	$auth=new WechatAuth(C('APPID'),C('SECRET'));
    	var_dump($auth->getAccessToken());
    	var_dump($auth->menuCreate($this->mybutton($auth)));
    }
    
    private function mybutton($auth){
    	$redirect_uri='http://wx.zydazhao.com/index.php/Index/login';
    	$url1=$auth->getRequestCodeURL($redirect_uri,'1','snsapi_base');//众音招聘
    	$url2=$auth->getRequestCodeURL($redirect_uri,'2','snsapi_base');//众音人才库
    	$url3=$auth->getRequestCodeURL($redirect_uri,'3','snsapi_base');//HR绑定
    	$url4=$auth->getRequestCodeURL($redirect_uri,'4','snsapi_base');//收到的简历
    	$url5=$auth->getRequestCodeURL($redirect_uri,'5','snsapi_base');//发布职位
    	$url6=$auth->getRequestCodeURL($redirect_uri,'6','snsapi_base');//查看我的申请
    	$url7=$auth->getRequestCodeURL($redirect_uri,'7','snsapi_base');//我要领奖
    	$url8=$auth->getRequestCodeURL($redirect_uri,'8','snsapi_base');//领奖方式
    	$url9=$auth->getRequestCodeURL($redirect_uri,'9','snsapi_base');//查看返利历史
    	
    	$button=array();
    	$item1=array(
    			"name"=>"找工作",
    			"sub_button"=>array(
    					array(
    							"type"=>"view",
    							"name"=>"查看招聘职位",
    							"url"=>$url1
    					),
    					array(
    							"type"=>"view",
    							"name"=>"我的简历库",
    							"url"=>$url2
    					),
    					array(
    							"type"=>"view",
    							"name"=>"职位申请进度",
    							"url"=>$url6
    					)
    			)
    	);
    	$button[]=$item1;
    	
    	$item2=array(
    			"name"=>"小金库",
    			"sub_button"=>array(
    					array(
    							"type"=>"view",
    							"name"=>"返现信息绑定",
    							"url"=>$url8
    					),
    					array(
    							"type"=>"view",
    							"name"=>"提交返现申请",
    							"url"=>$url7
    					),
    					array(
    							"type"=>"view",
    							"name"=>"查看返利历史",
    							"url"=>$url9
    					)
    			)
    	);
    	$button[]=$item2;
    	
    	$item3=array(
    			"name"=>"发职位",
    			"sub_button"=>array(
    					array(
    							"type"=>"view",
    							"name"=>"发布权限绑定",
    							"url"=>$url3
    					),
    					array(
    							"type"=>"view",
    							"name"=>"发布空缺职位",
    							"url"=>$url5
    					),
    					array(
    							"type"=>"view",
    							"name"=>"我收到的简历",
    							"url"=>$url4
    					)
    			)
    	);
    	$button[]=$item3;
    	return $button;
    }
    
    
}
