<?php
namespace app\admin\widget;
use think\Controller;
use think\Session;
class Layout extends Controller {
	public function head($title) {
		return $this->fetch('widget/head', ['title'=>$title]);
	}

}