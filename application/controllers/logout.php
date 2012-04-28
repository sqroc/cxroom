<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index() {
		$data = array('username' => '', 'email' => '', 'user' => '');
		$this -> session -> unset_userdata($data);
		$data_notice['information'] = "成功退出系统，欢迎您下次访问！<br>该页面将在三秒后自动跳转...";
		$data_notice['url'] = base_url();
		$data_notice['title'] = "提示信息";
		$data_notice['mode'] = "yes";
		$this -> load -> view('common_notice', $data_notice);
	}

}
?>