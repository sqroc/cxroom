<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Objects_form extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		$data = array('title' => '项目基本信息', 'css' => 'space.css', );
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
		$classresult = $this -> Projects_model -> showclass();
		$data['classresult'] = $classresult;
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['myprojectnumber'] = $this -> Projects_model -> select_num_rowsByUid();
		$data['myattentionprojectnumber'] = $this -> Projects_model -> select_num_rowsByAttention();
		$data['myfriendnumber'] = $this -> Users_model -> select_friends_num_rows($this -> session -> userdata('uid'));
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$data['clickdata'] = $this -> Users_model -> queryuserclick_byuid($uid);
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/objects_form');
		//$this -> load -> view('space/projects_form_notice');
		//$this -> load -> view('space/user_sidebar');
		$this -> load -> view('space/footer');
	}

	public function add() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
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
			$path_logo = $this -> input -> post('path_logo');
			$path_file = $this -> input -> post('path_file');
			if ($this -> Projects_model -> add($path_file,$path_logo)) {
				$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
				$data_notice['url'] = base_url()."/space/space_projectlist";
				$data_notice['title'] = "提示信息";
				$data_notice['mode'] = "yes";
				$this -> load -> view('common_notice', $data_notice);
			} else {
				$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
				$this -> load -> view("wrong", $data);
			}
		}

	}
	
	//发布招募文件
	public function talent(){
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		$data = array('title' => '招募文件-项目发布', 'css' => 'space.css', );
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_form_team');
		$this -> load -> view('space/footer');
		
	}
	
	public function talentupdate(){
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		
		
	}
	
	//募资文件
	public function invest(){
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		$data = array('title' => '募资文件-项目发布', 'css' => 'space.css', );
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_form_invest');
		$this -> load -> view('space/footer');
		
	}
	
	//口号公告
	public function notice(){
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		$data = array('title' => '口号公告-项目发布', 'css' => 'space.css', );
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_form_notice');
		$this -> load -> view('space/footer');
		
	}
	
	//计划目标
	public function aim(){
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		}
		$data = array('title' => '计划目标-项目发布', 'css' => 'space.css', );
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$row2 = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
		$data['username2'] = $this -> session -> userdata('username');
		$data['person_pic2'] = $row2 -> person_pic;
		$data['username2'] = $this -> session -> userdata('username');
		$this -> load -> view('space/space_header', $data);
		$this -> load -> view('space/space_menu');
		$this -> load -> view('space/projects_form_aim');
		$this -> load -> view('space/footer');
		
	}

}
