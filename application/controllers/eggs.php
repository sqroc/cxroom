<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Eggs extends CI_Controller {

	public function index() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/eggs/homepage');
		}

		$data = array('title' => '轻创新', 'js' => 'eggs_index.js');

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
		$data['ideas'] = $this -> Projects_model -> showIdeas();
		$data['ideascomment'] = $this -> Projects_model -> showIdeascomment();
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['uid'] = $this -> session -> userdata('uid');
		$data['eggcommentnum'] = $this -> Projects_model -> select_num_rowsforEggcomment();;
		$data['eggnum'] = $this -> Projects_model -> select_num_rowsforEgg();
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('eggs/header.php', $data);
		$this -> load -> view('eggs/index.php', $data);

	}

	public function api() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/eggs/homepage');
		}

		$data['email'] = $this -> session -> userdata('email');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$row = $this -> Users_model -> queryuser($data['email']);
		
		$data['ideas'] = $this -> Projects_model -> showIdeas();
		$data['ideascomment'] = $this -> Projects_model -> showIdeascomment();
		
		$data['uid'] = $this -> session -> userdata('uid');
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$data = array_merge($data, $this -> Common_model -> global_data());
		
		$this -> load -> view('eggs/eggs_api.php', $data);

	}
	

	public function homepage() {
		$sta = $this -> session -> userdata('user');
		$data = array('title' => 'Eggs-创新空间', 'css' => 'home_page.css', 'js' => 'home_page.js', );
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
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('header', $data);
		$this -> load -> view('eggs/home');

		$this -> load -> view('footer');
	}

	public function more() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}
		$data['idea'] = $this -> Projects_model -> showIdeasrand();
		$data['ideacomment'] = $this -> Projects_model -> showIdeascommentrand($data['idea'] -> ideaid);
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$this -> load -> view('eggs/more.php', $data);

	}

	public function topic() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			$ideaid = $this -> uri -> segment(3, 0);
			$data = array('title' => '轻创新', 'css' => 'eggs_dis.css', 'js' => 'eggs_dis.js');
			$data['ideaattention'] = $this -> Projects_model -> showIdeaattention($ideaid);
			$data['ideacontribute'] = $this -> Projects_model -> showIdeacontribute($ideaid);
			$data['ideajoin'] = $this -> Projects_model -> showIdeajoin($ideaid);
			$data['comment1'] = $this -> Projects_model -> showcomment($ideaid, 1);
			$data['comment2'] = $this -> Projects_model -> showcomment($ideaid, 2);
			$data['comment3'] = $this -> Projects_model -> showcomment($ideaid, 3);
			$data['commentReply1'] = $this -> Projects_model -> showreply($ideaid, 1);
			$data['commentReply2'] = $this -> Projects_model -> showreply($ideaid, 2);
			$data['commentReply3'] = $this -> Projects_model -> showreply($ideaid, 3);
			$data['idea'] = $this -> Projects_model -> showIdeaByPid($ideaid);
			$data['title'] = $data['idea'] -> ideaname . "  -轻创新";
			$data['totalsupport'] = $data['idea'] -> supportnumber + $data['idea'] -> criticizenumber + $data['idea'] -> neutralnumber;
			if ($data['totalsupport'] == 0) {
				$data['totalsupport'] = 1;
			}
			$data = array_merge($data, $this -> Common_model -> global_data());
			$this -> load -> view('eggs/header.php', $data);
			$this -> load -> view('eggs/topic_unlogin.php', $data);
		} else {
			$ideaid = $this -> uri -> segment(3, 0);
			$data = array('title' => '轻创新', 'css' => 'eggs_dis.css', 'js' => 'eggs_dis.js');
			$data['ideaattention'] = $this -> Projects_model -> showIdeaattention($ideaid);
			$data['ideacontribute'] = $this -> Projects_model -> showIdeacontribute($ideaid);
			$data['ideajoin'] = $this -> Projects_model -> showIdeajoin($ideaid);
			$data['comment1'] = $this -> Projects_model -> showcomment($ideaid, 1);
			$data['comment2'] = $this -> Projects_model -> showcomment($ideaid, 2);
			$data['comment3'] = $this -> Projects_model -> showcomment($ideaid, 3);
			$data['commentReply1'] = $this -> Projects_model -> showreply($ideaid, 1);
			$data['commentReply2'] = $this -> Projects_model -> showreply($ideaid, 2);
			$data['commentReply3'] = $this -> Projects_model -> showreply($ideaid, 3);
			$data['idea'] = $this -> Projects_model -> showIdeaByPid($ideaid);
			$data['title'] = $data['idea'] -> ideaname . "  -轻创新";
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
			$data['totalsupport'] = $data['idea'] -> supportnumber + $data['idea'] -> criticizenumber + $data['idea'] -> neutralnumber;
			if ($data['totalsupport'] == 0) {
				$data['totalsupport'] = 1;
			}
			$data['username'] = $this -> session -> userdata('username');
			$data['randvalue'] = rand(0, 10000000000);
			$data['uid'] = $this -> session -> userdata('uid');
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
			$data = array_merge($data, $this -> Common_model -> global_data());
			$this -> load -> view('eggs/header.php', $data);
			$this -> load -> view('eggs/topic.php', $data);
		}
	}

	public function new_topic() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}

		$data = array('title' => '发布新创意', 'css' => 'eggs_dis.css');
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
		$data['uid'] = $this -> session -> userdata('uid');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
		$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		$data = array_merge($data, $this -> Common_model -> global_data());
		$this -> load -> view('eggs/header.php', $data);
		$this -> load -> view('eggs/new.php', $data);

	}


public function eggedit() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		}

		$data = array('title' => '发布新创意', 'css' => 'eggs_dis.css');
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
		$data['uid'] = $this -> session -> userdata('uid');
		$data['username'] = $this -> session -> userdata('username');
		$data['randvalue'] = rand(0, 10000000000);
		$pid = $this -> uri -> segment(3, 0);
		$data['egg'] = $this -> Projects_model -> showIdeaByPid($pid);
		$data = array_merge($data, $this -> Common_model -> global_data());
	
		$this -> load -> view('eggs/header.php', $data);
		$this -> load -> view('eggs/edit.php', $data);
	}

	public function addidea() {
		$pathimage = $this -> input -> post('coverimage');
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $_SERVER['DOCUMENT_ROOT'].$pathimage;
		$config2['create_thumb'] = FALSE;
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 195;
		$config2['height'] = 280;

		$this -> load -> library('image_lib', $config2);

		if (!$this -> image_lib -> resize()) {
			echo $this -> image_lib -> display_errors();
			exit(1);
		}
		if ($this -> Projects_model -> addidea()) {
			$data_notice['information'] = "添加成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/eggs";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
		}

	}
	
	public function editidea() {
		$pathimage = $this -> input -> post('coverimage');
		$config2['image_library'] = 'gd2';
		$config2['source_image'] = $_SERVER['DOCUMENT_ROOT'].$pathimage;
		$config2['create_thumb'] = FALSE;
		$config2['maintain_ratio'] = TRUE;
		$config2['width'] = 195;
		$config2['height'] = 280;

		$this -> load -> library('image_lib', $config2);

		if (!$this -> image_lib -> resize()) {
			echo $this -> image_lib -> display_errors();
			exit(1);
		}
		if ($this -> Projects_model -> editidea()) {
			$data_notice['information'] = "修改成功！该页面将在三秒后自动跳转...";
			$data_notice['url'] = base_url() . "/eggs";
			$data_notice['title'] = "提示信息";
			$data_notice['mode'] = "yes";
			$this -> load -> view('common_notice', $data_notice);
		} else {
			$data = array('title' => '友情提示', 'warm' => '对不起，由于某种原因本次信息更新失败了！您可以选择以下入口进入！', 'pic' => 'wrong.gif');
			$this -> load -> view("wrong", $data);
		}

	}

	public function updatesupport() {
		$sta = $this -> session -> userdata('user');
		if (!isset($sta) || $sta != "login_ok") {
			redirect('/login');
		} else {
			$typeid = $this -> input -> post('typeid');
			if ($typeid == 1) {
				if ($this -> Projects_model -> updatesupport1()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}
			if ($typeid == 2) {
				if ($this -> Projects_model -> updatesupport2()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}
			if ($typeid == 3) {
				if ($this -> Projects_model -> updatesupport3()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}
			if ($typeid == 4) {
				if ($this -> Projects_model -> updatesupport4()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}
			if ($typeid == 5) {
				if ($this -> Projects_model -> updatesupport5()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}
			if ($typeid == 6) {
				if ($this -> Projects_model -> updatesupport6()) {
					echo json_encode(array("state" => "ok"));
				} else {
					echo json_encode(array("state" => "no"));
				}
			}

		}

	}

	public function addcomment() {
		if ($this -> Projects_model -> addcomment()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

	public function addreply() {
		if ($this -> Projects_model -> addreply()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}
	
	public function addreply2() {
		if ($this -> Projects_model -> addreply2()) {
			echo json_encode(array("state" => "ok"));

		} else {
			echo json_encode(array("state" => "no"));

		}

	}

}
