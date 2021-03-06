<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '创新空间认证申请', 'css' => 'space.css');
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['uid'] = $this -> session -> userdata('uid');
		$uid = $this -> session -> userdata('uid');
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/authentication');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function team() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '创新空间认证申请', 'css' => 'space.css');
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['uid'] = $this -> session -> userdata('uid');
		$uid = $this -> session -> userdata('uid');
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/authentication2');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function checkauth() {
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
			if ($this -> Users_model -> checkauth()) {
				$data_notice['information'] = "提交成功！请耐心等待审核通过。该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "space/authentication";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息提交失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

}
