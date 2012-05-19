<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {

		$this -> load -> view('login');

	}

	function check() {

		$url = base_url()."/user_space";

		if ($this -> Users_model -> check()) {
			$data_notice['information'] = "登录成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = $url;
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "登录失败！请检查您的用户名和密码是否正确！<br>该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/login";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}
	}

}
?>