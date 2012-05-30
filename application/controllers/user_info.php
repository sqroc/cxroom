<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_info extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '用户资料', 'css' => 'space.css');
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
		$data['mypointall'] =  ($data['mypoint']->contributionnum*0.55+$data['mypoint']->activenum*0.9+$data['mypoint']->creativitynum*0.65)/10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/user_info');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function baseinfo() {
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
			if ($this -> Users_model -> baseinfo()) {
				$data_notice['information'] = "修改成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "/user_info";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

	public function addskills() {
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
			if ($this -> Users_model -> addskills()) {
				$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "/user_info/skills";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

	public function skills() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '用户资料', 'css' => 'space.css');
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
		$data['myskills'] = $this -> Users_model -> queryskill();
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
		$data['mypointall'] =  ($data['mypoint']->contributionnum*0.55+$data['mypoint']->activenum*0.9+$data['mypoint']->creativitynum*0.65)/10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/user_skills');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function photo() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '用户资料', 'css' => 'space.css');
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
		$data['mypointall'] =  ($data['mypoint']->contributionnum*0.55+$data['mypoint']->activenum*0.9+$data['mypoint']->creativitynum*0.65)/10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/user_photo');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function contact() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '用户资料', 'css' => 'space.css');
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
		$data['mypointall'] =  ($data['mypoint']->contributionnum*0.55+$data['mypoint']->activenum*0.9+$data['mypoint']->creativitynum*0.65)/10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/user_contact');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function contactinfo() {
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
			if ($this -> Users_model -> contactinfo()) {
				$data_notice['information'] = "修改成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "/user_info/contact";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

	public function do_upload_pic() {
		$config['upload_path'] = 'uploads/tpic/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['encrypt_name'] = TRUE;
		$this -> load -> library('upload', $config);

		if (!$this -> upload -> do_upload()) {
			$error = array('error' => $this -> upload -> display_errors());
			$data = array('title' => '友情提示', 'warm' => '对不起，您上传的图片过大！您可以选择以下入口返回！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
			//print_r($error);
			//$this -> load -> view('upload_form', $error);
		} else {
			$data = array('upload_data' => $this -> upload -> data());
			$path = 'uploads/tpic/';
			$full_path = $path . $data['upload_data']['file_name'];
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = $data['upload_data']['full_path'];
			$config2['create_thumb'] = FALSE;
			$config2['maintain_ratio'] = FALSE;
			$config2['width'] = 110;
			$config2['height'] = 110;

			$this -> load -> library('image_lib', $config2);

			if (!$this -> image_lib -> resize()) {
				echo $this -> image_lib -> display_errors();
				exit(1);
			}

			if ($this -> Users_model -> do_upload_pic($full_path)) {
				$data_notice['information'] = "修改成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "/user_info/photo";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
			//$this -> load -> view('upload_success', $data);
		}
	}

	public function nineask() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '九问-创新空间个人资料', 'css' => 'space.css');
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
		$data['nineaskinfo'] = $this -> Users_model -> queryusernineask_byuid($this -> session -> userdata('uid'));
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] =  ($data['mypoint']->contributionnum*0.55+$data['mypoint']->activenum*0.9+$data['mypoint']->creativitynum*0.65)/10;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/user_9ask');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function nineaskinfo() {
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
			if ($this -> Users_model -> nineaskinfo()) {
				$data_notice['information'] = "修改成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url() . "/user_info";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}
	}

}
