<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '项目列表-创新二场', 'css' => 'projects_list.css', 'js' => 'projects.js', );
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/projects/homepage');
		} else {
			$data['email'] = $this -> session -> userdata('email');
			$data['username'] = $this -> session -> userdata('username');
			$data['randvalue'] = rand(0, 10000000000);
			//分页配置开始
			$config['base_url'] = base_url() . 'projects/projectlist/';
			$config['total_rows'] = $this -> Projects_model -> select_num_rows();
			$config['per_page'] = 6;
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
			$data['projects'] = $this -> Projects_model -> showProjectsByLimit($this -> uri -> segment(3, 0), $config['per_page']);
		}
		$row = $this -> Users_model -> queryuser($this -> session -> userdata('email'));
		$data['person_pic'] = $row -> person_pic;
		$data['projectsrec'] = $this -> Projects_model -> showProjectsRecommend();
		$data['myattentionpro'] = $this -> Projects_model -> showAttentionProjectIndex();
		$data['myjoinpro'] = $this -> Projects_model -> showJoinProjectIndex();
		$data['applaudmembertotal'] = $this -> Projects_model -> applaudmembertotal();
		$data['attentionmembertotal'] = $this -> Projects_model -> attentionmembertotal();
		$data['promembermembertotal'] = $this -> Projects_model -> promembermembertotal();
		$data['projecttotal'] = $this -> Projects_model -> projecttotal();
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('header', $data);
		$this -> load -> view('projects/project_list');
		$this -> load -> view('projects/project_sidebar');
		$this -> load -> view('footer');
	}

	public function homepage() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '项目中心-创新空间', 'css' => 'home_page.css', 'js' => 'home_page.js', );
		if (!isset($sta) || $sta != "login_ok") {
			//redirect('/login');
		} else {
			$data['username'] = $this -> session -> userdata('username');
		}
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		if ($this -> session -> userdata('uid') != NULL) {
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		}

		$data['username'] = $this -> session -> userdata('username');
		$this -> load -> view('header', $data);
		$this -> load -> view('projects/home');

		$this -> load -> view('footer');
	}

	public function projectlist() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '项目列表-创新二场', 'css' => 'projects_list.css', 'js' => 'projects.js', );
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			$data['email'] = $this -> session -> userdata('email');
			$data['username'] = $this -> session -> userdata('username');
			$data['randvalue'] = rand(0, 10000000000);
			//分页配置开始
			$config['base_url'] = base_url() . 'projects/projectlist/';
			$config['total_rows'] = $this -> Projects_model -> select_num_rows();
			$config['per_page'] = 6;
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
			$data['projects'] = $this -> Projects_model -> showProjectsByLimit($this -> uri -> segment(3, 0), $config['per_page']);
		}
		$row = $this -> Users_model -> queryuser($this -> session -> userdata('email'));
		$data['person_pic'] = $row -> person_pic;
		$data['projectsrec'] = $this -> Projects_model -> showProjectsRecommend();
		$data['myattentionpro'] = $this -> Projects_model -> showAttentionProjectIndex();
		$data['myjoinpro'] = $this -> Projects_model -> showJoinProjectIndex();
		$data['applaudmembertotal'] = $this -> Projects_model -> applaudmembertotal();
		$data['attentionmembertotal'] = $this -> Projects_model -> attentionmembertotal();
		$data['promembermembertotal'] = $this -> Projects_model -> promembermembertotal();
		$data['projecttotal'] = $this -> Projects_model -> projecttotal();
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('header', $data);
		$this -> load -> view('projects/project_list');
		$this -> load -> view('projects/project_sidebar');
		$this -> load -> view('footer');
	}

	public function home() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '项目主页-创新二场', 'css' => 'projects.css', 'js' => 'projects.js', );
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			$data['email'] = $this -> session -> userdata('email');
			$data['username'] = $this -> session -> userdata('username');
			$user = $this -> Users_model -> queryuser_byuid($this -> session -> userdata('uid'));
			$data['userpic'] = $user -> person_pic;
			$data['uid'] = $this -> session -> userdata('uid');
			$data['randvalue'] = rand(0, 10000000000);
			$data['project'] = $this -> Projects_model -> showProjectsByPid($this -> uri -> segment(3, 0));
			$nowtime = time();
			$days = ceil(($nowtime - $data['project'] -> adddate) / (60 * 60 * 24));
			$data['days'] = $days;
			$data['prousers'] = $this -> Projects_model -> showUsersByPid($this -> uri -> segment(3, 0));
		}
		$pid = $data['project'] -> pid;
		$data['commentNumber'] = $this -> Messages_model -> getpcommentnumber($pid);

		//分页配置开始
		$config['base_url'] = base_url() . 'projects/home/' . $this -> uri -> segment(3, 0) . '/';
		$config['total_rows'] = $this -> Messages_model -> getpcommentnumber($pid);
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
		$row = $this -> Users_model -> queryuser($this -> session -> userdata('email'));
		$data['person_pic'] = $row -> person_pic;
		$data['comment'] = $this -> Messages_model -> showPCommentsByLimitByUid($this -> uri -> segment(4, 0), $config['per_page'], $pid);
		$data['commentReply'] = $this -> Messages_model -> getpcommentReply($pid);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('header', $data);
		$this -> load -> view('projects/project_index');
		$this -> load -> view('footer');
	}

	public function works() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => '找工作-创新二场', 'css' => 'projects_list.css', 'js' => 'projects.js', );
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			$data['username'] = $this -> session -> userdata('username');
		}
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('header', $data);
		$this -> load -> view('projects/project_works');
		$this -> load -> view('projects/project_sidebar');
		$this -> load -> view('footer');
	}

	public function attention() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			if ($this -> Projects_model -> attention()) {
				echo json_encode(array("state" => "ok"));
			} else {
				echo json_encode(array("state" => "no"));
			}
		}

	}

	public function applaud() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			if ($this -> Projects_model -> applaud()) {
				echo json_encode(array("state" => "ok"));
			} else {
				echo json_encode(array("state" => "no"));
			}
		}

	}

	public function addProjectcomment() {
		if ($this -> Messages_model -> addProjectcomment()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

	public function replyProjectcomment() {
		if ($this -> Messages_model -> replyProjectcomment()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}
	}

}
?>