<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users_model extends CI_Model {

	function reg() {
		$data['uid'] = '';
		$data['username'] = $this -> input -> post('name');
		$data['email'] = $this -> input -> post('email');
		$data['contact_email'] = $data['email'];
		$data['person_pic'] = "images/user_head/head_default.gif";
		if ($this -> Users_model -> check_invite_code()) {
			$data10['isused'] = 1;
			$where = "code = '" . $this -> input -> post('code') . "'";
			$str = $this -> db -> update_string('invitecode', $data10, $where);
			if ($this -> input -> post('code') != NULL) {
				$this -> db -> query($str);
			}
		} else {
			return FALSE;
		}
		$password = $this -> input -> post('password');
		$uidgolbal = -1;
		$salt = 'sqrocz';
		$data['password'] = substr(md5(md5($password) . $salt), 0, 30);
		if ($data['username'] != NULL && $data['email'] != NULL && $data['password'] != NULL) {
			if ($this -> db -> insert('user', $data)) {
				$uidgolbal = $this -> db -> insert_id();
				$data2['uid'] = $this -> db -> insert_id();
				$data2['click'] = 0;
				$this -> db -> insert('userclick', $data2);
				$datamoney['uid'] = $data2['uid'];
				$datamoney['value'] = 0;
				$this -> db -> insert('money', $datamoney);
				$datapoint['uid'] = $data2['uid'];
				$this -> db -> insert('point', $datapoint);
				for ($i = 0; $i < 5; $i++) {
					$data3['code'] = md5(time() . rand());
					$data3['uid'] = $data2['uid'];
					$data3['isused'] = 0;
					$this -> db -> insert('invitecode', $data3);
				}
				$data['user'] = "login_ok";
				$data['uid'] = $uidgolbal;
				$this -> session -> set_userdata($data);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function reg_guide_upload() {
		$data['uid'] = $this -> input -> post('uid');
		$data['province'] = $this -> input -> post('province');
		$data['city'] = $this -> input -> post('city');
		$data['birthdate'] = $this -> input -> post('Date_Year')."年".$this -> input -> post('birthday_m')."月";
		$data['gender'] = $this -> input -> post('gender');
		$data['role'] = $this -> input -> post('role');
		$data['aims'] = rtrim($this -> input -> post('aims'), ",");
		$data['intro'] = $this -> input -> post('intro');
		$data['siteurl'] = $this -> input -> post('siteurl');
		$data['weibo'] = $this -> input -> post('weibo');
		$data['contact_email'] = $this -> input -> post('contact_email');
		$data['qq'] = $this -> input -> post('qq');
		$data['telphone'] = $this -> input -> post('telphone');
		$data['phone'] = $this -> input -> post('phone');
		
		$data2['uid'] = $this -> input -> post('uid');
		$data2['department'] = $this -> input -> post('department');
		$data2['post'] = $this -> input -> post('post');
		$data2['school'] = $this -> input -> post('school');
		$data2['major'] = $this -> input -> post('major');
		
		
		$where = "uid = '" . $this -> input -> post('uid') . "'";
		$str = $this -> db -> update_string('user', $data, $where);
		if ($this -> input -> post('uid') != NULL) {
			if ($this -> db -> query($str)) {
				$this -> db -> insert('user_detail', $data2);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function create_invite_code() {
		$data3['code'] = md5(time() . rand());
		$data3['uid'] = -1;
		$data3['isused'] = 0;
		if ($this -> db -> insert('invitecode', $data3)) {
			return TRUE;
		} else {
			return FALSE;
		}

	}

	function check_invite_code() {
		$data['code'] = $this -> input -> post('code');
		if ($data['code'] != NULL) {
			$query = $this -> db -> query("SELECT * FROM invitecode WHERE isused = 0 and code = '" . $data['code'] . "'");
			if ($query -> num_rows() > 0) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}

	}

	function code_list() {
		$sql = "SELECT * FROM invitecode WHERE isused = 0 and  uid = -1";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function space_code_list() {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM invitecode WHERE isused = 0 and  uid = " . $uid;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function space_used_codenumber() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM invitecode where isused = 1 and uid =" . $uid);
		return $query -> num_rows();
	}

	function admin_reg() {
		$data['name'] = $this -> input -> post('name');
		$password = $this -> input -> post('password');
		$salt = 'sqrocadmin';
		$data['password'] = substr(md5(md5($password) . $salt), 0, 30);
		if ($data['name'] != NULL && $data['password'] != NULL) {
			if ($this -> db -> insert('admin', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function baseinfo() {
		$data['username'] = $this -> input -> post('name');
		$data['gender'] = $this -> input -> post('gender');
		$data['province'] = $this -> input -> post('province');
		$data['intro'] = $this -> input -> post('intro');
		$where = "email = '" . $this -> input -> post('email') . "'";
		$str = $this -> db -> update_string('user', $data, $where);
		if ($this -> input -> post('email') != NULL) {
			if ($this -> db -> query($str)) {
				$this -> session -> set_userdata('username', $data['username']);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function nineaskinfo() {
		$uid = $this -> session -> userdata('uid');
		$data['uid'] = $uid;
		$data['q1'] = $this -> input -> post('q1');
		$data['q2'] = $this -> input -> post('q2');
		$data['q3'] = $this -> input -> post('q3');
		$data['q4'] = $this -> input -> post('q4');
		$data['q5'] = $this -> input -> post('q5');
		$data['q6'] = $this -> input -> post('q6');
		$data['q7'] = $this -> input -> post('q7');
		$data['q8'] = $this -> input -> post('q8');
		$data['q9'] = $this -> input -> post('q9');

		$query = $this -> db -> query("SELECT * FROM question WHERE uid = '" . $data['uid'] . "'");
		if ($query -> num_rows() <= 0) {
			$this -> db -> insert("question", $data);
			return TRUE;
		} else {

			$where = "uid = '" . $data['uid'] . "'";
			$str = $this -> db -> update_string('question', $data, $where);
			if ($data['uid'] != NULL) {
				if ($this -> db -> query($str)) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
	}

	function addskills() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['skillname'] = $this -> input -> post('skillname');
		$data['skillscore'] = $this -> input -> post('skillscore');
		$data['skillintro'] = $this -> input -> post('skillintro');
		if ($this -> db -> insert('userskill', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function contactinfo() {
		$data['qq'] = $this -> input -> post('qq');
		$data['contact_email'] = $this -> input -> post('contact_email');
		$data['telphone'] = $this -> input -> post('telphone');
		$data['phone'] = $this -> input -> post('phone');
		$where = "email = '" . $this -> input -> post('email') . "'";
		$str = $this -> db -> update_string('user', $data, $where);
		if ($this -> input -> post('email') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function do_upload_pic($full_path) {
		$data['person_pic'] = $full_path;
		$where = "email = '" . $this -> input -> post('email') . "'";
		$str = $this -> db -> update_string('user', $data, $where);
		if ($this -> input -> post('email') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	//add by tgoooo
	function add_c_byuid() {
		$data['ctype'] = $this -> input -> post('ctype');
		$data['cname'] = $this -> input -> post('cname');
		$where = "uid = '" . $this -> input -> post('uid') . "'";
		$str = $this -> db -> update_string('user', $data, $where);
		if ($this -> input -> post('uid') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function queryuser($email) {
		$data['email'] = $email;
		$sql = "SELECT * FROM user WHERE email = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function queryskill() {
		$data['uid'] = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM userskill WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		return $query -> result();
	}

	function queryskillByUid() {
		$data['uid'] = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM userskill WHERE uid = ? limit 5";
		$query = $this -> db -> query($sql, $data);
		return $query -> result();
	}

	function queryskillByOtherUid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM userskill WHERE uid = ? limit 5";
		$query = $this -> db -> query($sql, $data);
		return $query -> result();
	}

	function queryuserByLimit($offset, $num) {
		$sql = "SELECT * FROM user order by uid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function querymyuserByLimit($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM user,friend WHERE user.uid = friend.youruid and friend.isallow = 1 and friend.myuid = " . $uid . " order by friend.friendid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	//调用全部好友add by tgoooo
	function querymyuser() {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM user,friend WHERE user.uid = friend.youruid and friend.isallow = 1 and friend.myuid = " . $uid . " order by friend.friendid desc";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function select_num_rows() {
		$query = $this -> db -> query("SELECT * FROM user order by uid desc limit 0,100");
		return $query -> num_rows();
	}

	function select_friends_num_rows($uid) {
		$sql = "SELECT * FROM friend WHERE friend.isallow = 1 and myuid = " . $uid . " limit 0,100";
		$query = $this -> db -> query($sql);
		return $query -> num_rows();
	}

	function select_num_rows_users() {
		$query = $this -> db -> query("SELECT * FROM user");
		return $query -> num_rows();
	}

	function select_num_rows_projects() {
		$query = $this -> db -> query("SELECT * FROM project");
		return $query -> num_rows();
	}

	function select_num_rows_projects_noallow() {
		$query = $this -> db -> query("SELECT * FROM project where isallow = 0");
		return $query -> num_rows();
	}

	function queryuser_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM user WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}
	
	function queryuserdetail_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM user_detail WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function queryuser_byemail($email) {
		$data['contact_email'] = $email;
		$sql = "SELECT * FROM user WHERE contact_email = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row -> uid;
		}
	}

	function checkmail() {

		$data['email'] = $this -> input -> get_post('email');
		$sql = "SELECT * FROM user WHERE email = ? ";

		$query = $this -> db -> query($sql, $data);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function check() {
		$data['email'] = $this -> input -> post('email');
		$password = $this -> input -> post('password');
		$sql = "SELECT * FROM user WHERE email = ? ";
		$salt = 'sqrocz';
		$password = substr(md5(md5($password) . $salt), 0, 30);
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			if ($row -> password != $password) {
				return FALSE;
			} else {
				$data['username'] = $row -> username;
				$data['uid'] = $row -> uid;
				$data['user'] = "login_ok";
				$this -> session -> set_userdata($data);
				return TRUE;
			}
		}
	}

	function admin_check() {
		$data['name'] = $this -> input -> post('name');
		$password = $this -> input -> post('password');
		$sql = "SELECT * FROM admin WHERE name = ? ";
		$salt = 'sqrocadmin';
		$password = substr(md5(md5($password) . $salt), 0, 30);
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			if ($row -> password != $password) {
				return FALSE;
			} else {
				$data['name'] = $row -> name;
				$data['adminid'] = $row -> adminid;
				$data['admin'] = "login_ok";
				$this -> session -> set_userdata($data);
				return TRUE;
			}
		}
	}

	function user_delete($uid) {
		$data['uid'] = $uid;
		$this -> db -> delete("user", $data);
		return TRUE;
	}

	function userclick($uid) {
		$this -> db -> where('uid', $uid);
		$this -> db -> set('click', 'click+1', false) -> update('userclick');
	}

	function queryuserclick_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM userclick WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function queryusernineask_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM question WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function queryuservalue_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM money WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function queryuserpoint_byuid($uid) {
		$data['uid'] = $uid;
		$sql = "SELECT * FROM point WHERE uid = ? ";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	/*
	 * 认证提交审核
	 */
	function checkauth() {
		$data['realname'] = $this -> input -> post('realname');
		$data['email'] = $this -> input -> post('email');
		$data['object'] = $this -> input -> post('object');
		$data['intro'] = $this -> input -> post('intro');
		$data['uid'] = $this -> session -> userdata('uid');
		$data['adddate'] = time();
		$data['isallow'] = 0;
		if ($this -> db -> insert('authentication', $data)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function select_num_rowsAll_auth() {
		$query = $this -> db -> query("SELECT * FROM authentication");
		return $query -> num_rows();
	}

	function showAuthsByLimitAll($offset, $num) {
		$sql = "SELECT * FROM authentication order by authid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function auth_allow($authid) {
		$data['isallow'] = 1;
		$where = "authid = '" . $authid . "'";
		$str = $this -> db -> update_string('authentication', $data, $where);
		if ($authid != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	
	
	function search_condition() {
		$data['gender'] = $this -> input -> post('gender');
		$data['role'] = $this -> input -> post('role');
		$offset = 0;
		$num = 10;
		$where = ' WHERE user.uid = user_detail.uid';
		$offset =  $this -> input -> post('offset');
		$num =  $this -> input -> post('num');
		if($data['gender']!=NULL){
			$where .= " and gender = '" . $data['gender'] . "'";
		}
		if($data['role']!=NULL){
			$where .= " and role = '" . $data['role'] . "'";
		}
		
		$sql = "SELECT * FROM user,user_detail".$where." limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		$outdata = $query -> result();
		$i = 0;
		foreach ($outdata as $row) {
			$sql = "SELECT * FROM userskill WHERE uid=".$row->uid;
			$query = $this -> db -> query($sql);
			$outdata[$i]->skills = $query -> result();
			$i++;
		}
		return $outdata;
		
	}

}
?>