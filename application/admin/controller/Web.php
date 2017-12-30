<?php
/**
 * Created by PhpStorm.
 * User: 陈少俊
 * Date: 2017/12/30
 * Time: 12:39
 */

namespace app\admin\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Session;
use think\File;

class Web extends Controller {
    public function _initialize()
    {
        if ( !session::get('name')) {
            $this->error('请先登录', '/');
        }
    }
    public function index () {

        return $this->fetch('index');
    }
    public function add (Request $request) {
        if ( !$request->isPOST() ) {
            $this->error("非法操作");
        }
//        接收参数
        $stitle = input('post.stitle');
        $image_url = input('post.image_url');
        $surl = input('post.surl');
        $sentitle = input('post.sentitle');
        $skeywords = input('post.skeywords');
        $sdescription = input('post.sdescription');
        $s_name = input('post.s_name');
        $s_phone = input('post.s_phone');
        $s_tel = input('post.s_tel');
        $s_400 = input('post.s_400');
        $s_fax = input('post.s_fax');
        $s_qq = input('post.s_qq');
        $s_qqu = input('post.s_qqu');
        $s_email = input('post.s_email');
        $s_address = input('post.s_address');
        $scopyright = input('post.scopyright');

    }

//    处理图片上传
    public function upload (){
        $file = request()->file('image');
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                return json(["ext"=>$info->getExtension(), 'fileName'=>$info->getSaveName(), 'path'=>'/uploads/']);
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }
}