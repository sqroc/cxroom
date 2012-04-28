<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Users_model extends CI_Model {

	function reg() {
		$data['uid'] = '';
		$data['username'] = $this -> input -> post('name');
		$data['email'] = $this -> input -> post('email');
		$data['contact_email'] = $data['email'];
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

}
?>