<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Projects_model extends CI_Model {

	function add($attach, $logopic) {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['name'] = $this -> input -> post('name');
		$data['isgetmember'] = $this -> input -> post('isgetmember');
		$data['isinvest'] = $this -> input -> post('isinvest');
		$data['pclassid'] = $this -> input -> post('pclassid');
		$data['pintro'] = $this -> input -> post('pintro');
		$data['videourl'] = $this -> input -> post('videourl');
		$data['talenttitle'] = $this -> input -> post('talenttitle');
		$data['talentcontent'] = $this -> input -> post('talentcontent');
		$data['investtitle'] = $this -> input -> post('investtitle');
		$data['investcontent'] = $this -> input -> post('investcontent');
		$data['aimtitle'] = $this -> input -> post('aimtitle');
		$data['aimcontent'] = $this -> input -> post('aimcontent');
		$data['adddate'] = time();
		$data['attach'] = $attach;
		$data['logopic'] = $logopic;
		$hiddennum = $this -> input -> post('hiddennum');
		$new_id_number = -1;
		if ($data['uid'] != NULL) {
			if ($this -> db -> insert('project', $data)) {
				$new_id_number = $this -> db -> insert_id();
				$data2['pid'] = $new_id_number;
				if ($hiddennum == 1) {
					$data2['uid'] = $this -> input -> post('member_1');
					if (isset($data2['uid'])) {
						$data2['role'] = $this -> input -> post('role_1');
						if ($this -> db -> insert('promember', $data2)) {
							return TRUE;
						} else {
							return FALSE;
						}
					}
				} else {
					for ($i = 1; $i <= $hiddennum; $i++) {
						$memberstr = "member_" . $i;
						$rolestr = "role_" . $i;
						$data2['uid'] = $this -> input -> post($memberstr);
						$data2['role'] = $this -> input -> post($rolestr);
						if ($this -> db -> insert('promember', $data2)) {

						} else {
							return FALSE;
						}
					}
				}
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function update($attach, $logopic) {
		$where = "pid = '" . $this -> input -> post('pid') . "'";
		$data['uid'] = $this -> session -> userdata('uid');
		$data['name'] = $this -> input -> post('name');
		$data['isgetmember'] = $this -> input -> post('isgetmember');
		$data['isinvest'] = $this -> input -> post('isinvest');
		$data['pclassid'] = $this -> input -> post('pclassid');
		$data['pintro'] = $this -> input -> post('pintro');
		$data['videourl'] = $this -> input -> post('videourl');
		$data['talenttitle'] = $this -> input -> post('talenttitle');
		$data['talentcontent'] = $this -> input -> post('talentcontent');
		$data['investtitle'] = $this -> input -> post('investtitle');
		$data['investcontent'] = $this -> input -> post('investcontent');
		$data['aimtitle'] = $this -> input -> post('aimtitle');
		$data['aimcontent'] = $this -> input -> post('aimcontent');
		$data['adddate'] = time();
		$data['attach'] = $attach;
		$data['logopic'] = $logopic;
		$str = $this -> db -> update_string('project', $data, $where);
		if ($this -> input -> post('pid') != NULL) {
			if ($this -> db -> query($str)) {
				$data_11['pid'] = $this -> input -> post('pid');
				$sql = "SELECT * FROM promember WHERE pid = ? ";
				$query = $this -> db -> query($sql, $data_11);
				foreach ($query->result() as $row) {
					$where2 = "pmid = '" . $row -> pmid . "'";
					$data2['uid'] = $this -> input -> post('members_' . $row -> pmid);
					$data2['role'] = $this -> input -> post('roles_' . $row -> pmid);
					$str2 = $this -> db -> update_string('promember', $data2, $where2);
					$this -> db -> query($str2);
				}
				$hiddennum = $this -> input -> post('hiddennum');
				if ($hiddennum > 0) {
					for ($i = 1; $i <= $hiddennum; $i++) {
						$memberstr = "member_" . $i;
						$rolestr = "role_" . $i;
						$data3['uid'] = $this -> input -> post($memberstr);
						$data3['role'] = $this -> input -> post($rolestr);
						$data3['pid'] = $this -> input -> post('pid');
						;
						if ($this -> db -> insert('promember', $data3)) {

						} else {
							return FALSE;
						}
					}
				}

				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}

	}

	function showclass() {
		$sql = "SELECT * FROM proclass ";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsRecommend() {
		$sql = "SELECT * FROM project,proclass,project_recommend where project_recommend.pid = project.pid and proclass.pclassid = project.pclassid order by project_recommend.pid desc limit 0,3 ";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsByLimit($offset, $num) {
		$sql = "SELECT * FROM project,proclass where proclass.pclassid = project.pclassid and project.isallow=1 order by project.pid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsByLimitByUid($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM project,proclass where proclass.pclassid = project.pclassid and project.uid = " . $uid . " order by project.pid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function showProjectsByLimitByUid2($offset, $num,$uid) {
		$sql = "SELECT * FROM project,proclass where proclass.pclassid = project.pclassid and project.uid = " . $uid . " order by project.pid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showeggsByLimitByUid($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM idea where ideauid = " . $uid . " order by ideaid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function showeggsByLimitByUid2($offset, $num,$uid) {
		$sql = "SELECT * FROM idea where ideauid = " . $uid . " order by ideaid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsByLimitByAttention($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM project,attentionmember where attentionmember.pid = project.pid and attentionmember.uid = " . $uid . " order by attentionmember.attmid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showTipsByLimitByAttention($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  vocabulary,vocabularyattention where vocabularyattention.vid =  vocabulary.vid and vocabularyattention.uid = " . $uid . " order by vocabularyattention.vocalattid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showeggsByLimitByAttention($offset, $num) {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  idea,ideaattentionmember where ideaattentionmember.ideaid =  idea.ideaid and ideaattentionmember.uid = " . $uid . " order by ideaattentionmember.ideaamid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsByLimitAll($offset, $num) {
		$sql = "SELECT * FROM project,proclass where proclass.pclassid = project.pclassid  order by project.pid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function select_num_rowsByUid() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM project where uid =" . $uid);
		return $query -> num_rows();
	}
	
	function select_num_rowsByUid2($uid) {
		$query = $this -> db -> query("SELECT * FROM project where uid =" . $uid);
		return $query -> num_rows();
	}

	function select_num_eggrowsByUid() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM idea where ideauid =" . $uid);
		return $query -> num_rows();
	}
	
	function select_num_eggrowsByUid2($uid) {
		$query = $this -> db -> query("SELECT * FROM idea where ideauid =" . $uid);
		return $query -> num_rows();
	}

	function select_num_rowsByAttention() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM attentionmember where uid =" . $uid);
		return $query -> num_rows();
	}

	function select_num_rowsTipsByAttention() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM vocabularyattention where uid =" . $uid);
		return $query -> num_rows();
	}

	function select_num_rowseggsByAttention() {
		$uid = $this -> session -> userdata('uid');
		$query = $this -> db -> query("SELECT * FROM ideaattentionmember where uid =" . $uid);
		return $query -> num_rows();
	}

	function select_num_rowsAll() {
		$query = $this -> db -> query("SELECT * FROM project ");
		return $query -> num_rows();
	}

	function select_num_rows() {
		$query = $this -> db -> query("SELECT * FROM project where project.isallow=1 limit 0,100");
		return $query -> num_rows();
	}

	function showIdeaByPid($ideaid) {
		$data['ideaid'] = $ideaid;
		$sql = "SELECT * FROM idea,user WHERE ideaid = ? and  user.uid = idea.ideauid";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showIdeas() {
		$sql = "SELECT * FROM idea,user WHERE user.uid = idea.ideauid order by idea.ideaadddate desc limit 0,4";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showTips() {
		$sql = "SELECT * FROM vocabulary limit 0,8";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeasrand() {
		$sql = "SELECT * FROM idea,user WHERE user.uid = idea.ideauid order by rand() limit 1";
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showTipsrand() {
		$sql = "SELECT * FROM vocabulary order by rand() limit 1";
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showIdeascommentrand($ideaid) {
		$sql = "SELECT * FROM idea_comments,user WHERE author_uid=user.uid and supporttype=1 and icommentideaid =" . $ideaid;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeascomment() {
		$sql = "SELECT * FROM idea order by idea.ideaadddate desc limit 0,4";
		$query = $this -> db -> query($sql);
		if ($query -> num_rows() <= 0) {
			return NULL;
		}
		$ideaids = "";
		foreach ($query->result() as $row) {
			$ideaid = $row -> ideaid . '';
			$ideaids .= ($ideaid . ',');
		}
		$ideaids = rtrim($ideaids, ',');
		$sql = "SELECT * FROM idea_comments,user WHERE author_uid=user.uid and supporttype=1 and icommentideaid IN (" . $ideaids . ")";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showProjectsByPid($pid) {
		$data['pid'] = $pid;
		$sql = "SELECT * FROM project, proclass,user WHERE pid = ? and  proclass.pclassid = project.pclassid and user.uid = project.uid";
		$query = $this -> db -> query($sql, $data);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showUsersByPid($pid) {
		$data['pid'] = $pid;
		$sql = "SELECT * FROM promember,user WHERE promember.pid = ? and promember.uid = user.uid";
		$query = $this -> db -> query($sql, $data);
		return $query -> result();
	}

	function project_delete($pid) {
		$data['pid'] = $pid;
		$this -> db -> delete("project", $data);
		return TRUE;
	}

	function project_rec_delete($pid) {
		$data['pid'] = $pid;
		$this -> db -> delete("project_recommend", $data);
		return TRUE;
	}

	function project_rec($pid) {
		$data['pid'] = $pid;
		$query = $this -> db -> query("SELECT * FROM project_recommend WHERE pid = '" . $data['pid'] . "'");
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			$this -> db -> insert("project_recommend", $data);
			return TRUE;
		}

	}

	function project_allow($pid) {
		$data['isallow'] = 1;
		$where = "pid = '" . $pid . "'";
		$str = $this -> db -> update_string('project', $data, $where);
		if ($pid != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function attention() {
		$data['uid'] = $this -> input -> post('uid');
		$data['pid'] = $this -> input -> post('pid');
		$query = $this -> db -> query("SELECT * FROM attentionmember WHERE uid=" . $data['uid'] . " and pid=" . $data['pid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('attentionmember', $data)) {
				$this -> db -> where('pid', $data['pid']);
				if ($this -> db -> set('attentionnumber', 'attentionnumber+1', false) -> update('project')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function applaud() {
		$data['uid'] = $this -> input -> post('uid');
		$data['pid'] = $this -> input -> post('pid');
		$query = $this -> db -> query("SELECT * FROM applaudmember WHERE uid=" . $data['uid'] . " and pid=" . $data['pid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('applaudmember', $data)) {
				$this -> db -> where('pid', $data['pid']);
				if ($this -> db -> set('applaudnumber', 'applaudnumber+1', false) -> update('project')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function addidea() {

		$data['ideaname'] = $this -> input -> post('ideaname');
		$data['ideauid'] = $this -> session -> userdata('uid');
		$data['ideaintro'] = $this -> input -> post('ideaintro');
		$data['ideacontent'] = $this -> input -> post('pintro');
		$data['coverimage'] = $this -> input -> post('coverimage');
		$data['isallow'] = 0;
		$data['ideaadddate'] = time();
		if ($data['ideauid'] != NULL) {
			if ($this -> db -> insert('idea', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function editidea() {

		$ideaid = $this -> input -> post('ideaid');
		$data['ideaname'] = $this -> input -> post('ideaname');
		$data['ideauid'] = $this -> session -> userdata('uid');
		$data['ideaintro'] = $this -> input -> post('ideaintro');
		$data['ideacontent'] = $this -> input -> post('pintro');
		$data['coverimage'] = $this -> input -> post('coverimage');
		$data['isallow'] = 0;
		$data['ideaadddate'] = time();
		$where = "ideaid = '" . $ideaid . "'";
		$str = $this -> db -> update_string('idea', $data, $where);
		if ($data['ideauid'] != NULL) {
			if ($this -> db -> query($str)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function updatesupport1() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM ideasupportmember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideasupportmember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('supportnumber', 'supportnumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function updatesupport2() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM ideasupportmember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideasupportmember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('criticizenumber', 'criticizenumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function updatesupport3() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM ideasupportmember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideasupportmember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('neutralnumber', 'neutralnumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function updatesupport4() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM ideajoinmember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideajoinmember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('ijoinnumber', 'ijoinnumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function updatesupport5() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM  ideacontributemember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideacontributemember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('icontributenumber', 'icontributenumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function updatesupport6() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['ideaid'] = $this -> input -> post('ideaid');
		$query = $this -> db -> query("SELECT * FROM   ideaattentionmember WHERE uid=" . $data['uid'] . " and ideaid=" . $data['ideaid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('ideaattentionmember', $data)) {
				$this -> db -> where('ideaid', $data['ideaid']);
				if ($this -> db -> set('iattentionnumber', 'iattentionnumber+1', false) -> update('idea')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function showIdeaattention($ideaid) {
		$sql = "SELECT * FROM  ideaattentionmember,user where ideaattentionmember.uid = user.uid and ideaid=" . $ideaid . " order by ideaattentionmember.ideaamid desc ";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeacontribute($ideaid) {
		$sql = "SELECT * FROM  ideacontributemember,user where ideacontributemember.uid = user.uid and ideaid=" . $ideaid . "  order by ideacontributemember.ideacmid desc ";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeajoin($ideaid) {
		$sql = "SELECT * FROM  ideajoinmember,user where ideajoinmember.uid = user.uid and ideaid=" . $ideaid . "  order by ideajoinmember.ideajmid desc ";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	/*
	 * 创意蛋添加评论
	 */
	function addcomment() {

		$data['icommentideaid'] = $this -> input -> post('icommentideaid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['comment_content'] = $this -> input -> post('comment_content');
		$data['supporttype'] = $this -> input -> post('supporttype');
		$data['comment_parent'] = -1;
		$data['comment_date'] = time();
		if ($data['icommentideaid'] != NULL) {
			//添加评论
			if ($this -> db -> insert('idea_comments', $data)) {
				$this -> db -> where('ideaid', $data['icommentideaid']);
				//评论计数
				if ($this -> db -> set('commentnum', 'commentnum+1', false) -> update('idea')) {
					//增加消息通知
					$row = $this -> Projects_model -> showIdeaByPid($this -> input -> post('icommentideaid'));
					$data2['itemname'] = $row -> ideaname;
					$data2['snsitemid'] = $row -> ideaid;
					$data2['senduid'] = $this -> session -> userdata('uid');
					$data2['recuid'] = $row -> ideauid;
					$data2['content'] = $this -> input -> post('comment_content');
					$data2['type'] = "eggcomment";
					$data2['senddate'] = time();

					if ($data2['senduid'] == $data2['recuid']) {
						return TRUE;
					}
					if ($this -> db -> insert('snsnotice', $data2)) {
						return TRUE;
					} else {
						return FALSE;
					}

				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	/*
	 * 创意蛋回复评论
	 */
	function addreply() {

		$data['icommentideaid'] = $this -> input -> post('icommentideaid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['comment_content'] = $this -> input -> post('comment_content');
		$data['supporttype'] = $this -> input -> post('supporttype');
		$data['comment_parent'] = $this -> input -> post('comment_id');
		$data['comment_date'] = time();
		if ($data['icommentideaid'] != NULL) {
			if ($this -> db -> insert('idea_comments', $data)) {
				//增加消息通知
				$row = $this -> Projects_model -> showIdeaByPid($this -> input -> post('icommentideaid'));
				$row2 = $this -> Projects_model -> getideacommentbyid($this -> input -> post('comment_id'));
				$data2['itemname'] = $row -> ideaname;
				$data2['snsitemid'] = $row -> ideaid;
				$data2['senduid'] = $this -> session -> userdata('uid');
				$data2['recuid'] = $row2 -> author_uid;
				$data2['content'] = $this -> input -> post('comment_content');
				$data2['type'] = "eggreplycomment";
				$data2['senddate'] = time();

				if ($data2['senduid'] == $data2['recuid']) {
					return TRUE;
				}
				if ($this -> db -> insert('snsnotice', $data2)) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	/*
	 * 获得对应id的egg评论
	 */
	function getideacommentbyid($icommentid) {
		$sql = "SELECT * FROM  idea_comments where  icommentid=" . $icommentid;
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}
	
	/*
	 * 获得对应id的project评论
	 */
	function getprojectcommentbyid($pcommentid) {
		$sql = "SELECT * FROM  project_comments where  pcommentid=" . $pcommentid;
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}
	
	/*
	 * 获得对应id的space评论
	 */
	function getspacecommentbyid($scommentid) {
		$sql = "SELECT * FROM  space_comments where  scommentid=" . $scommentid;
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showcomment($ideaid, $type) {
		$sql = "SELECT * FROM  idea_comments,user where idea_comments.author_uid = user.uid and comment_parent = -1 and icommentideaid=" . $ideaid . " and supporttype=" . $type . " order by idea_comments.icommentid desc limit 15";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showreply($ideaid, $type) {
		$sql = "SELECT * FROM  idea_comments,user where idea_comments.author_uid = user.uid and comment_parent != -1 and icommentideaid=" . $ideaid . " and supporttype=" . $type . " order by idea_comments.icommentid desc limit 15";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function addvoattention() {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['vid'] = $this -> input -> post('vid');
		$query = $this -> db -> query("SELECT * FROM vocabularyattention WHERE uid=" . $data['uid'] . " and vid=" . $data['vid']);
		if ($query -> num_rows() > 0) {
			return FALSE;
		} else {
			if ($this -> db -> insert('vocabularyattention', $data)) {
				$this -> db -> where('vid', $data['vid']);
				if ($this -> db -> set('voattentionnumber', 'voattentionnumber+1', false) -> update('vocabulary')) {
					return TRUE;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}

	}

	function showAttentionProjectIndex() {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  attentionmember,project where attentionmember.pid =  project.pid and attentionmember.uid = " . $uid . " order by attentionmember.attmid desc limit 8";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showJoinProjectIndex() {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  promember,project where promember.pid =  project.pid and promember.uid = " . $uid . " order by promember.pmid desc limit 8";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function applaudmembertotal() {
		$query = $this -> db -> query("SELECT * FROM applaudmember");
		return $query -> num_rows();
	}

	function attentionmembertotal() {
		$query = $this -> db -> query("SELECT * FROM  attentionmember");
		return $query -> num_rows();
	}

	function promembermembertotal() {
		$query = $this -> db -> query("SELECT * FROM  promember");
		return $query -> num_rows();
	}

	function projecttotal() {
		$query = $this -> db -> query("SELECT * FROM  project");
		return $query -> num_rows();
	}

}
?>