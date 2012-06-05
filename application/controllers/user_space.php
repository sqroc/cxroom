<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_space extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$uid = $this -> session -> userdata('uid');

		$data = array('title' => '用户空间', 'css' => 'space.css', 'js' => 'space_index.js');
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['username2'] = $this -> session -> userdata('username');
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$data['randvalue'] = rand(0, 10000000000);
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['person_pic'] = $row -> person_pic;
		$data['person_pic2'] = $row -> person_pic;
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myskills'] = $this -> Users_model -> queryskillByUid();
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['comment'] = $this -> Messages_model -> getcomment($uid);
		$data['commentReply'] = $this -> Messages_model -> getcommentReply($uid);
		$data['commentNumber'] = $this -> Messages_model -> getcommentnumber($uid);
		$data['userreply'] = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['replyspace'] = 2;
		$data['uid'] = $uid;
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;

		//分页配置开始
		$config['base_url'] = base_url() . 'user_space/spacenotice/';
		$config['total_rows'] = $this -> Messages_model -> select_num_rowsSnsnoticeByUid();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current_page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this -> pagination -> initialize($config);
		//分页配置结束
		$data['snsnotices'] = $this -> Messages_model -> getsnsnoticeByLimitByUid($this -> uri -> segment(3, 0), $config['per_page']);
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/space_myhome');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function spacenotice() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$uid = $this -> session -> userdata('uid');

		$data = array('title' => '用户空间', 'css' => 'space.css', 'js' => 'space_index.js');
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['username2'] = $this -> session -> userdata('username');
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
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
		$data['person_pic2'] = $row -> person_pic;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myskills'] = $this -> Users_model -> queryskillByUid();
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['comment'] = $this -> Messages_model -> getcomment($uid);
		$data['commentReply'] = $this -> Messages_model -> getcommentReply($uid);
		$data['commentNumber'] = $this -> Messages_model -> getcommentnumber($uid);
		$data['userreply'] = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['replyspace'] = 2;
		$data['uid'] = $uid;
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($uid);
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($uid);
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;

		//分页配置开始
		$config['base_url'] = base_url() . 'user_space/spacenotice/';
		$config['total_rows'] = $this -> Messages_model -> select_num_rowsSnsnoticeByUid();
		$config['per_page'] = 5;
		$config['uri_segment'] = 3;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current_page">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this -> pagination -> initialize($config);
		//分页配置结束
		$data['snsnotices'] = $this -> Messages_model -> getsnsnoticeByLimitByUid($this -> uri -> segment(3, 0), $config['per_page']);
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/space_myhome');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function uid() {
		if ($this -> uri -> segment(3) === FALSE) {
			$uid = 0;
		} else {
			$uid = $this -> uri -> segment(3);
		}
		$data = array('title' => '用户空间', 'css' => 'space.css', 'js' => 'space_index.js');
		$row = $this -> Users_model -> queryuser_byuid($uid);
		if ($this -> session -> userdata('uid') != NULL) {
			$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		} else {
			$row2 = NULL;
		}
		$this -> Users_model -> userclick($uid);
		$data['nineaskinfo'] = $this -> Users_model -> queryusernineask_byuid($uid);
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$data['uid'] = $uid;
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		if ($row2 != NULL) {
			$data['person_pic2'] = $row2 -> person_pic;
		} else {

		}

		$data['username'] = $row -> username;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['username2'] = $this -> session -> userdata('username');
		
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myskills'] = $this -> Users_model -> queryskillByOtherUid($uid);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['comment'] = $this -> Messages_model -> getcomment($uid);
		$data['commentReply'] = $this -> Messages_model -> getcommentReply($uid);
		$data['commentNumber'] = $this -> Messages_model -> getcommentnumber($uid);
		$data['replyspace'] = 1;
		if ($this -> session -> userdata('uid') != NULL) {
			$data['userreply'] = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
			$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
			$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
			$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		}
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($uid);
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;
		$data['title'] = $row -> username . "的用户中心  - 创新空间";
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu2');
		$this -> load -> view('space/space_home');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function aid() {
		if ($this -> uri -> segment(3) === FALSE) {
			$uid = 0;
		} else {
			$uid = $this -> uri -> segment(3);
		}
		$row = $this -> Users_model -> queryuser_byuid($uid);
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		//$this -> Users_model -> userclick($uid);
		$data['nineaskinfo'] = $this -> Users_model -> queryusernineask_byuid($uid);
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$data['uid'] = $uid;
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['person_pic2'] = $row2 -> person_pic;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;
		$data['username'] = $row -> username;
		$data['username2'] = $this -> session -> userdata('username');
		//$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$data['myskills'] = $this -> Users_model -> queryskillByOtherUid($uid);
		$data['comment'] = $this -> Messages_model -> getcomment($uid);
		$data['commentReply'] = $this -> Messages_model -> getcommentReply($uid);
		$data['commentNumber'] = $this -> Messages_model -> getcommentnumber($uid);
		$data['replyspace'] = 1;
		$data['userreply'] = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($this -> session -> userdata('uid'));
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;

		$this -> load -> view('space/api_doctor', $data);

	}

	public function userinfo_api() {
		if ($this -> uri -> segment(3) === FALSE) {
			$uid = 0;
		} else {
			$uid = $this -> uri -> segment(3);
		}
		
		$row = $this -> Users_model -> queryuser_byuid($uid);			
		$this -> Users_model -> userclick($uid);	
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$data['uid'] = $uid;
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;		
		$data['person_pic'] = $row -> person_pic;
		$data['username'] = $row -> username;
		$data['ctype'] = $row -> ctype;
		$data['cname'] = $row -> cname;	
		$data['myskills'] = $this -> Users_model -> queryskillByOtherUid($uid);
		$data['replyspace'] = 1;	
		$data['mypoint'] = $this -> Users_model -> queryuserpoint_byuid($uid);
		$data['mypointall'] = ($data['mypoint'] -> contributionnum * 0.55 + $data['mypoint'] -> activenum * 0.9 + $data['mypoint'] -> creativitynum * 0.65) / 10;
		
		$this -> load -> view('space/api_userinfo', $data);

	}
	

	public function addcomment() {
		if ($this -> Messages_model -> addcomment()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

	public function addmessage() {
		if ($this -> Messages_model -> addmessage()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

	//发送多人信息add by tgoooo
	public function addmessage2() {
		$otheruids = $this -> input -> post('otheruid');
		$otheruid = explode("-", $otheruids);

		if ($this -> Messages_model -> addmessage2($otheruid)) {
			echo json_encode(array("state" => "ok"));
		} else {
			echo json_encode(array("state" => "no"));
		}

	}

	//发送分享add by tgoooo
	public function addshare() {
		$otheruids = $this -> input -> post('otheruid');
		$otheruid = explode("-", $otheruids);

		if ($this -> Messages_model -> addshare($otheruid)) {
			echo json_encode(array("state" => "ok"));
		} else {
			echo json_encode(array("state" => "no"));
		}

	}

	public function addfriend() {
		if ($this -> Messages_model -> addfriend()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

	public function addcomment2() {
		if ($this -> Messages_model -> addcomment()) {
			echo json_encode(array("state" => "ok"));
			//$data_notice['information'] = "成功添加留言！该页面将在三秒后自动跳转...";
			//$data_notice['url'] = base_url() . "/space/commentslist/uid/" . $this -> input -> post('uid');
			//$data_notice['title'] = "提示信息";
			//$data_notice['mode'] = "yes";
			//$this -> load -> view('common_notice', $data_notice);
		} else {
			echo json_encode(array("state" => "no"));
			//$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
			//$this -> load -> view("wrong", $data);
		}

	}

	public function replycomment() {
		$replyspace = $this -> input -> post('replyspace');
		if ($replyspace == 1) {
			if ($this -> Messages_model -> replycomment()) {
				echo json_encode(array("state" => "ok"));
				//$data_notice['information'] = "成功回复留言！该页面将在三秒后自动跳转...";
				//$data_notice['url'] = base_url() . "/user_space/uid/" . $this -> input -> post('uid');
				//$data_notice['title'] = "提示信息";
				//$data_notice['mode'] = "yes";
				//$this -> load -> view('common_notice', $data_notice);
			} else {
				echo json_encode(array("state" => "no"));
				//$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				//$this -> load -> view("wrong", $data);
			}
		}
		if ($replyspace == 2) {
			if ($this -> Messages_model -> replycomment()) {
				echo json_encode(array("state" => "ok"));
				//$data_notice['information'] = "成功回复留言！该页面将在三秒后自动跳转...";
				//$data_notice['url'] = base_url() . "/user_space";
				//$data_notice['title'] = "提示信息";
				//$data_notice['mode'] = "yes";
				//$this -> load -> view('common_notice', $data_notice);
			} else {
				echo json_encode(array("state" => "no"));
				//$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				//$this -> load -> view("wrong", $data);
			}
		}
		if ($replyspace == 3) {
			//别人留言列表页
			if ($this -> Messages_model -> replycomment()) {
				echo json_encode(array("state" => "ok"));
				//$data_notice['information'] = "成功回复留言！该页面将在三秒后自动跳转...";
				//$data_notice['url'] = base_url() . "/space/commentslist/uid/" . $this -> input -> post('uid');
				//$data_notice['title'] = "提示信息";
				//$data_notice['mode'] = "yes";
				//$this -> load -> view('common_notice', $data_notice);
			} else {
				echo json_encode(array("state" => "no"));
				//$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				//$this -> load -> view("wrong", $data);
			}
		}

		if ($replyspace == 4) {
			//自己空间列表页
			if ($this -> Messages_model -> replycomment()) {
				echo json_encode(array("state" => "ok"));
				//$data_notice['information'] = "成功回复留言！该页面将在三秒后自动跳转...";
				//$data_notice['url'] = base_url() . "/space/commentslist";
				//$data_notice['title'] = "提示信息";
				//$data_notice['mode'] = "yes";
				//$this -> load -> view('common_notice', $data_notice);
			} else {
				echo json_encode(array("state" => "no"));
				//$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				//$this -> load -> view("wrong", $data);
			}
		}

	}

}
