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

namespace Marvel2\Controller;

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
        	
        }
    }
     
    
    
    
}
