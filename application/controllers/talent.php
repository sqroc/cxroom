<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class talent extends CI_Controller {
	
	public function index(){
		$data = array('css' => 'talent_list.css', 'title' => '找人才-创新空间人', 'js' => 'talent_index.js');
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('header', $data);
		$this -> load -> view('talent/list');
	}
	
	public function friends(){
		$data = array('css' => 'talent_list.css', 'title' => '找朋友-创新空间', 'js' => 'talent_index.js');
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('header', $data);
		$this -> load -> view('talent/list_friends');
	}
	
	public function newtalent(){
		$data = array('css' => 'talent_list.css', 'title' => '最新加入-创新空间', 'js' => 'talent_index.js');
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		//分页配置开始
		$config['base_url'] = base_url() . 'talent/newtalent/';
		$config['total_rows'] = $this -> Users_model -> select_num_rows();
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
		$data['userlists'] = $this -> Users_model -> queryuserByLimit($this -> uri -> segment(3, 0), $config['per_page']);
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('header', $data);
		$this -> load -> view('talent/list_new');
	}
	
	public function search_condition(){

		$data['userlists'] = $this -> Users_model -> search_condition();
		$this -> load -> view('talent/list_user', $data);
	}
	
	
	
}
	