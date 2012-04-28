<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Space_codelist extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data = array('title' => '用户空间', 'css' => 'space.css', );
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
		$data['lab'] = $this -> Articles_model -> showLabsByRandOne();
		
		$data['codes'] = $this -> Users_model -> space_code_list();
		$data['usedcodenumber'] = $this -> Users_model -> space_used_codenumber();
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
		$this -> load -> view('space/codes_list');
		$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}



	

}
