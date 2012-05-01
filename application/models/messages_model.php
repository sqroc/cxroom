<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Messages_model extends CI_Model {

	function addcomment() {

		$data['scommentuid'] = $this -> input -> post('uid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['comment_content'] = $this -> input -> post('comment_content');
		$data['comment_parent'] = -1;
		$data['comment_date'] = time();
		if ($data['scommentuid'] != NULL) {
			if ($this -> db -> insert('space_comments', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function addmessage() {

		$data['otheruid'] = $this -> input -> post('otheruid');
		$data['myuid'] = $this -> session -> userdata('uid');
		$data['content'] = $this -> input -> post('content2');
		$data['fmessageid'] = -1;
		$data['m_date'] = time();
		if ($data['otheruid'] != NULL) {
			if ($this -> db -> insert('message', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function addreplymessage() {

		$data['otheruid'] = $this -> input -> post('otheruid');
		$data['myuid'] = $this -> session -> userdata('uid');
		$data['content'] = $this -> input -> post('content');
		$data['fmessageid'] = -1;
		$data['m_date'] = time();
		if ($data['otheruid'] != NULL) {
			if ($this -> db -> insert('message', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function addfriend() {

		$data['youruid'] = $this -> input -> post('uid');
		$data['myuid'] = $this -> session -> userdata('uid');
		$data['isallow'] = 0;
		$data['adddate'] = time();
		$sql = "SELECT * FROM  friend where  youruid =" . $data['youruid'] . " and myuid = " . $data['myuid'];
		$query = $this -> db -> query($sql);
		if ($query -> num_rows() > 0) {
			return FALSE;
		}
		if ($data['youruid'] != NULL) {
			if ($this -> db -> insert('friend', $data)) {
				$friendid = $this -> db -> insert_id();
				$data2['noticetypeid'] = $friendid;
				$data2['noticetype'] = "好友请求";
				$data2['noticeisread'] = 0;
				$data2['noticeisdeal'] = 0;
				$data2['noticemyid'] = $data['youruid'];
				$data2['noticedate'] = time();
				$this -> db -> insert('notice', $data2);
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function addProjectcomment() {

		$data['pcommentpid'] = $this -> input -> post('pid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['pcomment_content'] = $this -> input -> post('comment_content');
		$data['pcomment_parent'] = -1;
		$data['pcomment_date'] = time();
		if ($data['pcommentpid'] != NULL) {
			if ($this -> db -> insert('project_comments', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function replycomment() {

		$data['scommentuid'] = $this -> input -> post('uid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['comment_content'] = $this -> input -> post('comment_content');
		$data['comment_parent'] = $this -> input -> post('comment_id');
		$data['comment_date'] = time();
		if ($data['scommentuid'] != NULL) {
			if ($this -> db -> insert('space_comments', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function replyProjectcomment() {

		$data['pcommentpid'] = $this -> input -> post('pid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['pcomment_content'] = $this -> input -> post('comment_content');
		$data['pcomment_parent'] = $this -> input -> post('pcommentid');
		$data['pcomment_date'] = time();
		if ($data['pcommentpid'] != NULL) {
			if ($this -> db -> insert('project_comments', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function getcomment($uid) {
		$sql = "SELECT * FROM  space_comments,user where space_comments.author_uid = user.uid and comment_parent = -1 and scommentuid =" . $uid . " order by scommentid desc limit 3";
		$query = $this -> db -> query($sql);
		return $query -> result();

	}

	function getcommentnumber($uid) {
		$sql = "SELECT * FROM  space_comments where comment_parent = -1  and  scommentuid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getunreadMessagenumber($uid) {
		$sql = "SELECT * FROM  message where fmessageid = -1  and isread = 0 and otheruid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getunreadNoticenumber($uid) {
		$sql = "SELECT * FROM  notice where  noticeisread = 0 and noticemyid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getmessagenumber($uid) {
		$sql = "SELECT * FROM  message where fmessageid = -1  and  otheruid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getnoticenumber($uid) {
		$sql = "SELECT * FROM  notice where  noticemyid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getpcommentnumber($pid) {
		$sql = "SELECT * FROM  project_comments where pcomment_parent = -1  and  pcommentpid =" . $pid;
		$query = $this -> db -> query($sql);
		return $query -> num_rows();

	}

	function getcommentReply($uid) {
		$sql = "SELECT * FROM  space_comments,user where space_comments.author_uid = user.uid and comment_parent != -1 and scommentuid =" . $uid;
		$query = $this -> db -> query($sql);
		return $query -> result();

	}

	function getpcommentReply($pid) {
		$sql = "SELECT * FROM  project_comments,user where project_comments.author_uid = user.uid and pcomment_parent != -1 and pcommentpid =" . $pid;
		$query = $this -> db -> query($sql);
		return $query -> result();

	}

	function showCommentsByLimitByUid($offset, $num, $uid) {
		$sql = "SELECT * FROM space_comments,user where space_comments.author_uid = user.uid and comment_parent = -1 and scommentuid =" . $uid . " order by scommentid desc limit  " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showMessageByLimitByUid($offset, $num, $uid) {
		$sql = "SELECT * FROM message,user where message.myuid = user.uid and fmessageid = -1 and otheruid =" . $uid . " order by messageid desc limit  " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showNoticeByLimitByUid($offset, $num, $uid) {
		$sql = "SELECT * FROM notice,user,friend where notice.noticetypeid = friend.friendid and user.uid = friend.myuid and noticemyid =" . $uid . " order by noticeid desc limit  " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showPCommentsByLimitByUid($offset, $num, $pid) {
		$sql = "SELECT * FROM project_comments,user where project_comments.author_uid = user.uid and pcomment_parent = -1 and pcommentpid =" . $pid . " order by pcommentid desc limit  " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function updateread() {
		$data['isread'] = 1;
		$where = "messageid = '" . $this -> input -> post('messageid') . "'";
		$str = $this -> db -> update_string('message', $data, $where);
		if ($this -> input -> post('messageid') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function updatenoticeread() {
		$data['noticeisread'] = 1;
		$where = "noticeid = '" . $this -> input -> post('noticeid') . "'";
		$str = $this -> db -> update_string('notice', $data, $where);
		if ($this -> input -> post('noticeid') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function updateallowfriend() {
		$data['isallow'] = 1;
		$where = "friendid = '" . $this -> input -> post('friendid') . "'";
		$str = $this -> db -> update_string('friend', $data, $where);
		if ($this -> input -> post('friendid') != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function updateallowfriend2() {
		$data['isallow'] = 1;
		$where = "friendid = '" . $this -> input -> post('friendid') . "'";
		$str = $this -> db -> update_string('friend', $data, $where);
		if ($this -> input -> post('friendid') != NULL) {
			if ($this -> db -> query($str)) {
				$sql = "SELECT * FROM  friend where  friendid =" . $this -> input -> post('friendid');
				$query = $this -> db -> query($sql);
				foreach ($query->result() as $row) {
					$data2['myuid'] = $row -> youruid;
					$data2['youruid'] = $row -> myuid;
					$data2['isallow'] = 1;
					$data2['adddate'] = time();
					$sql = "SELECT * FROM  friend where  youruid =" . $data2['youruid'] . " and myuid = " . $data2['myuid'];
					$query = $this -> db -> query($sql);
					if ($query -> num_rows() > 0) {
						return TRUE;
					}
					$this -> db -> insert('friend', $data2);
				}

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

}
?>