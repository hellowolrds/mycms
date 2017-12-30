<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
class Index extends Controller
{
    public function _initialize()
    {
        if ( !session::get('name')) {
            $this->error('请先登录', '/');
        }
    }

    public function index()
    {
        return $this->fetch('index');
    }
}
