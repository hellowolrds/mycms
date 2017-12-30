<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Captcha;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch('index');
    }

    public function check(Request $request)
    {
        if ( !$request->isPOST() ) {
            return json(['status'=>200, 'flag'=>false, 'msg'=>'请求错误']);
        }

        $name = input('post.name');
        $password = input('post.password');
        $code = input('post.code');

        if ( !captcha_check($code) ) {
            return json(['status'=>200, 'flag'=>false, 'msg'=>'验证码错误']);
        }
        $result = Db::name('user')->where(['user_name'=>$name, 'password'=>md5($password)])->find();
        if ( !$result ) {
            return json(['status'=>200, 'flag'=>false, 'msg'=>'用户名或密码错误']);
        }
        return json(['status'=>200, 'flag'=>true, 'msg'=>'ok']);
    }
}
