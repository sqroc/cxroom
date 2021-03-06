<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index() {
		$data = array('title' => '用户注册', 'css' => 'register.css', 'js' => 'reg_check.js');
		$data['randvalue'] = rand(0, 10000000000);
		$data['username'] = NULL;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this -> load -> view('header', $data);
		$this -> load -> view('register');
		$this -> load -> view('footer');
	}

	public function guide() {
		$data = array('title' => '用户注册向导', 'css' => 'reg_guide.css', 'js' => 'reg_guide.js');
		$data['randvalue'] = rand(0, 10000000000);
		$data['username'] = NULL;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this -> load -> view('header', $data);
		$this -> load -> view('reg/reg_step_1');
		$this -> load -> view('footer2');
	}

	function reg_guide_upload() {
		$full_path = $this -> input -> post('imageurl');
		$real_path = $this -> input -> post('realurl');
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $real_path;
		$config2['maintain_ratio'] = FALSE;
		$config2['width'] = $this -> input -> post('w');
		$config2['height'] = $this -> input -> post('h');
		$config2['x_axis'] = $this -> input -> post('x');
		$config2['y_axis'] = $this -> input -> post('y');

		$this -> load -> library('image_lib', $config2);

		if (!$this -> image_lib -> crop()) {
			echo $this -> image_lib -> display_errors();
			exit(1);
		}
		if ($this -> Users_model -> do_upload_pic($full_path)) {
			if ($this -> Users_model -> reg_guide_upload()) {
				echo json_encode(array("state" => "ok"));
			} else {
				echo json_encode(array("state" => "err"));
			}
		}
	}

	function reg() {
		$flag = 1;
		$randvalue = $this -> input -> post('randvalue');
		$sta = $this -> session -> userdata('randvalue');
		if (!isset($sta)) {
			$this -> session -> set_userdata('randvalue', $randvalue);
		} else {
			if ($randvalue != $sta) {
				$this -> session -> set_userdata('randvalue', $randvalue);
			} else {
				//重复提交
				$flag = 0;
				$data = array('title' => '友情提示', 'warm' => '您的表单已经成功提交！请勿重复刷新，您可以选择以下入口进入！', 'pic' => 'warm.gif');
				$this -> load -> view("wrong", $data);
			}
		}
		if ($flag == 1) {
			if ($this -> Users_model -> reg()) {
				/*
				 $data = array('title' => '娉ㄥ唽鎴愬姛', 'css' => 'register.css');
				 $data['email'] = $this -> session -> userdata('email');
				 $data['username'] = $this -> session -> userdata('username');
				 $data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
				 $data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
				 $uid = $this -> session -> userdata('uid');
				 $data['uid'] = $uid;
				 $data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
				 $data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
				 $this -> load -> view('header', $data);
				 $this -> load -> view('reg_succeed');
				 $this -> load -> view('footer');*/
				$data = array('title' => '用户注册向导', 'css' => 'reg_guide.css', 'js' => 'reg_guide.js');
				$data['email'] = $this -> session -> userdata('email');
				$data['username'] = $this -> session -> userdata('username');
				$uid = $this -> session -> userdata('uid');
				$data['uid'] = $uid;
				$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
				$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
				$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
				$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
				$this -> load -> view('header', $data);
				$this -> load -> view('reg/reg_step_1');
				$this -> load -> view('footer2');
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，邀请码不正确！本次注册失败了！您可以选择以下入口进入重新注册！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

	function checkmail() {
		if ($this -> Users_model -> checkmail()) {
			echo json_encode(array("state" => "T"));
		} else {
			echo json_encode(array("state" => "F"));
		}
	}

	function checkcode() {
		if ($this -> Users_model -> check_invite_code()) {
			echo json_encode(array("state" => "T"));
		} else {
			echo json_encode(array("state" => "F"));
		}
	}

}
?>