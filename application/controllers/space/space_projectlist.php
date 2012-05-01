<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Space_projectlist extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '我的项目', 'css' => 'space.css', );
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
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		//分页配置开始
		$config['base_url'] = base_url() . 'space/space_projectlist/projectlist/';
		$config['total_rows'] = $this -> Projects_model -> select_num_rowsByUid();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
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
		$data['projects'] = $this -> Projects_model -> showProjectsByLimitByUid($this -> uri -> segment(4, 0), $config['per_page']);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
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
		$data['ismy'] = 1;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_list');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function projectlist() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '我的项目', 'css' => 'space.css', );
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		//分页配置开始
		$config['base_url'] = base_url() . 'space/space_projectlist/projectlist/';
		$config['total_rows'] = $this -> Projects_model -> select_num_rowsByUid();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
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
		$data['projects'] = $this -> Projects_model -> showProjectsByLimitByUid($this -> uri -> segment(4, 0), $config['per_page']);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
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
		$data['ismy'] = 1;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_list');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function attentionProjectlist() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '收藏项目', 'css' => 'space.css', );
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		//分页配置开始
		$config['base_url'] = base_url() . 'space/space_projectlist/attentionProjectlist/';
		$config['total_rows'] = $this -> Projects_model -> select_num_rowsByAttention();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
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
		$data['projects'] = $this -> Projects_model -> showProjectsByLimitByAttention($this -> uri -> segment(4, 0), $config['per_page']);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
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
		$data['ismy'] = 0;
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_list');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

	public function attentionTiplist() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '收藏词条', 'css' => 'space.css', );
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		$row = $this -> Users_model -> queryuser($data['email']);
		$data['intro'] = $row -> intro;
		$data['gender'] = $row -> gender;
		$data['province'] = $row -> province;
		$data['contact_email'] = $row -> contact_email;
		$data['qq'] = $row -> qq;
		$data['telphone'] = $row -> telphone;
		$data['phone'] = $row -> phone;
		$data['person_pic'] = $row -> person_pic;
		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		//分页配置开始
		$config['base_url'] = base_url() . 'space/space_projectlist/attentionTiplist/';
		$config['total_rows'] = $this -> Projects_model -> select_num_rowsTipsByAttention();
		$config['per_page'] = 5;
		$config['uri_segment'] = 4;
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
		$data['tips'] = $this -> Projects_model -> showTipsByLimitByAttention($this -> uri -> segment(4, 0), $config['per_page']);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
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
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/tips_list');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');

	}

}
