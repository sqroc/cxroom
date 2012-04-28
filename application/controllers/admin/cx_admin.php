<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Cx_admin extends CI_Controller {

	public function index() {

		$this -> load -> view('admin/admin_login');

	}

	public function home() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		} else {
			$data['usernumber'] = $this -> Users_model -> select_num_rows_users();
			$data['projectnumber'] = $this -> Users_model -> select_num_rows_projects();
			$data['noallow'] = $this -> Users_model -> select_num_rows_projects_noallow();
			$this -> load -> view('admin/admin_header', $data);
			$this -> load -> view('admin/admin_index');
		}
	}

	public function login() {
		if ($this -> Users_model -> admin_check()) {
			$data_notice['information'] = "登录成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/home";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			echo "ERROR";
		}
	}

	public function logout() {
		$data = array('name' => '', 'adminid' => '', 'admin' => '');
		$this -> session -> unset_userdata($data);
		$data_notice['information'] = "成功退出系统！该页面将在三秒后自动跳转...";
		$data_notice['url'] = base_url() . "/admin/cx_admin";
		$data_notice['title'] = "提示信息";
		$data_notice['mode'] = "yes";
		$this -> load -> view('common_notice', $data_notice);
	}

	public function admin_reg() {
		$this -> load -> view('admin/admin_reg');
	}

	public function reg() {
		if ($this -> Users_model -> admin_reg()) {
			$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "添加失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}
	}

	public function user_delete() {
		$uid = $this -> uri -> segment(4, 0);
		if ($this -> Users_model -> user_delete($uid)) {
			$data_notice['information'] = "用户删除成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/user_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "用户删除失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/user_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}

	public function project_delete() {
		$pid = $this -> uri -> segment(4, 0);
		if ($this -> Projects_model -> project_delete($pid)) {
			$data_notice['information'] = "项目删除成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "项目删除失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}
	
	public function project_rec_delete() {
		$pid = $this -> uri -> segment(4, 0);
		if ($this -> Projects_model -> project_rec_delete($pid)) {
			$data_notice['information'] = "停止推荐成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "该项目还没被推荐，不用停止推荐！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}
	
	public function project_rec() {
		$pid = $this -> uri -> segment(4, 0);
		if ($this -> Projects_model -> project_rec($pid)) {
			$data_notice['information'] = "项目推荐成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "该项目已经被推荐！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}

	public function project_allow() {
		$pid = $this -> uri -> segment(4, 0);
		if ($this -> Projects_model -> project_allow($pid)) {
			$data_notice['information'] = "项目审核通过！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "项目审核失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/project_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}

	public function user_list() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		} else {

		}
		$data['usernumber'] = $this -> Users_model -> select_num_rows_users();
		//分页配置开始
		$config['base_url'] = base_url() . 'admin/cx_admin/user_list/';
		$config['total_rows'] = $this -> Users_model -> select_num_rows();
		$config['per_page'] = 10;
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
		$data['newuser'] = $this -> Users_model -> queryuserByLimit($this -> uri -> segment(4, 0), $config['per_page']);
		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_users');
		//$this->load->view('footer');
	}

	public function project_list() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		} else {

		}
		$data['projectnumber'] = $this -> Users_model -> select_num_rows_projects();
		$data['noallow'] = $this -> Users_model -> select_num_rows_projects_noallow();
		//分页配置开始
		$config['base_url'] = base_url() . 'admin/cx_admin/project_list/';
		$config['total_rows'] = $this -> Projects_model -> select_num_rowsAll();
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
		$data['projects'] = $this -> Projects_model -> showProjectsByLimitAll($this -> uri -> segment(4, 0), $config['per_page']);
		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_projects');
		//$this->load->view('footer');
	}

	public function lab() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		} else {

		}
		$data['labnumber'] = $this -> Articles_model -> select_num_rowsLabAll();
		//分页配置开始
		$config['base_url'] = base_url() . 'admin/cx_admin/lab/';
		$config['total_rows'] = $this -> Articles_model -> select_num_rowsLabAll();
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
		$data['labs'] = $this -> Articles_model -> showLabsByLimitAll($this -> uri -> segment(4, 0), $config['per_page']);
		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_lab');
		//$this->load->view('footer');
	}

	public function lab_delete() {
		$vid = $this -> uri -> segment(4, 0);
		if ($this -> Articles_model -> lab_delete($vid)) {
			$data_notice['information'] = "词条删除成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/lab";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "词条删除失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/lab";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}

	public function lab_add() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		} else {

		}
		$data = array();

		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_lab_add');
		//$this->load->view('footer');
	}

	public function vocabulary_add() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		if ($this -> Articles_model -> vocabulary_add()) {
			$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/lab";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);

		} else {
			$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次注册失败了！您可以选择以下入口进入重新注册！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
		}
	}

	public function article_list() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		//分页配置开始
		$config['base_url'] = base_url() . 'admin/cx_admin/article_list/';
		$config['total_rows'] = $this -> Articles_model -> select_num_rowsArticleAll();
		$config['per_page'] = 8;
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
		$data['articles'] = $this -> Articles_model -> showArticlesByLimitAll($this -> uri -> segment(4, 0), $config['per_page']);

		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_articles');
		//$this->load->view('footer');
	}

	public function article_delete() {
		$articleid = $this -> uri -> segment(4, 0);
		if ($this -> Articles_model -> article_delete($articleid)) {
			$data_notice['information'] = "文章删除成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/article_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data_notice['information'] = "文章删除失败！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/article_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "no";
			$this -> load -> view('common_notice', $data_notice);
		}

	}

	public function article_add() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		$data = array();

		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_article_add');
		//$this->load->view('footer');
	}

	public function article_add2() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		if ($this -> Articles_model -> article_add2()) {
			$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/article_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);

		} else {
			$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次注册失败了！您可以选择以下入口进入重新注册！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
		}
	}
	
	
	public function code_list() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		$data['codes'] = $this -> Users_model -> code_list();
		
		$this -> load -> view('admin/admin_header', $data);
		$this -> load -> view('admin/admin_codes');
		//$this->load->view('footer');
	}
	
	public function createcodes() {
		$sta = $this -> session -> userdata('admin');
		$data = array();
		if (!isset($sta) || $sta != "login_ok") {
			redirect('admin/cx_admin');
		}
		if ($this -> Users_model -> create_invite_code()) {
			$data_notice['information'] = "生成成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/admin/cx_admin/code_list";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);

		} else {
			$data = array('title' => '友情提示', 'warm' => '生成失败！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
		}
	}

}
?>