<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Projects_model extends CI_Model {

	function add($attach, $logopic) {
		$data['uid'] = $this -> session -> userdata('uid');
		$data['name'] = $this -> input -> post('name');
		$inv_count = $this -> input -> post('inv_count');
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
					$data2['email'] = $this -> input -> post('member_1');
					$data2['uid'] = $this -> Users_model -> queryuser_byemail($data2['email']);

					if (isset($data2['uid'])) {
						$data2['role'] = $this -> input -> post('role_1');
						if ($this -> db -> insert('promember', $data2)) {
							return TRUE;
						} else {
							return FALSE;
						}
					}
				} else {
					for ($i = 1; $i <= $hiddennum - 1; $i++) {
						$memberstr = "member_" . $i;
						$rolestr = "role_" . $i;
						$data2['email'] = $this -> input -> post($memberstr);
						$data2['uid'] = $this -> Users_model -> queryuser_byemail($data2['email']);
						$data2['role'] = $this -> input -> post($rolestr);
						if ($this -> db -> insert('promember', $data2)) {

						} else {
							return FALSE;
						}
					}
				}
				if ($inv_count > 0) {
					for ($i = 1; $i <= $inv_count; $i++) {
						$money = "money" . $i;
						$limit = "limit" . $i;
						$gift = "gift" . $i;
						$datapaylist['pid'] = $new_id_number;
						$datapaylist['supportvalue'] = $this -> input -> post($money);
						$datapaylist['pnum'] = $this -> input -> post($limit);
						$datapaylist['backcontent'] = $this -> input -> post($gift);
						if ($this -> db -> insert('project_paylist', $datapaylist)) {

						} else {
							return FALSE;
						}
					}
				}
				$datapay['pid'] = $new_id_number;
				$datapay['wantvalue'] = $this -> input -> post('wantvalue');
				$daynum = $this -> input -> post('finishdate');
				$finishdate2 = time() + ($daynum * 24 * 60 * 60);
				$datapay['finishdate'] = $finishdate2;
				if ($this -> db -> insert('project_pay', $datapay)) {

				} else {
					return FALSE;
				}
				//创新度+50
				$this -> db -> where('uid', $this -> session -> userdata('uid'));
				$this -> db -> set('creativitynum', 'creativitynum+50', false) -> update('point');
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
						$data3['pid'] = $this -> input -> post('pid'); ;
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

	//空间动态
	function getproject_message($pid, $offset, $num) {
		$sql = "SELECT * FROM project_message,user WHERE project_message.auid = user.uid and  project_message.pid = " . $pid . " order by project_message.promid desc limit " . $offset . "," . $num;
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

	function showProjectsByLimitByUid2($offset, $num, $uid) {
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

	function showeggsByLimitByUid2($offset, $num, $uid) {
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

	//add by tgoooo
	function showeggsByAttention() {
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  idea,ideaattentionmember where ideaattentionmember.ideaid =  idea.ideaid and ideaattentionmember.uid = " . $uid . " order by ideaattentionmember.ideaamid desc limit 0,5";
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

	function select_num_rowsforEgg() {
		$query = $this -> db -> query("SELECT ideaid FROM idea");
		return $query -> num_rows();
	}

	function select_num_rowsforproject_message($pid) {
		$query = $this -> db -> query("SELECT promid FROM project_message WHERE pid = " . $pid);
		return $query -> num_rows();
	}

	function select_num_rowsforEggcomment() {
		$query = $this -> db -> query("SELECT icommentid FROM idea_comments");
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
		$sql = "SELECT * FROM idea,user WHERE user.uid = idea.ideauid order by idea.ideaadddate desc limit 0,20";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeasbyclass($ideaclass) {
		$sql = "SELECT * FROM idea,user WHERE user.uid = idea.ideauid and ideaclass = " . $ideaclass . " order by idea.ideaadddate desc limit 0,20";
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
		$sql = "SELECT * FROM idea order by idea.ideaadddate desc limit 0,20";
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
		$sql = "SELECT * FROM idea_comments,user WHERE author_uid=user.uid and icommentideaid IN (" . $ideaids . ")";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showIdeascommentbyclass($ideaclass) {
		$sql = "SELECT * FROM idea where ideaclass = " . $ideaclass . " order by idea.ideaadddate desc limit 0,20";
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
		$sql = "SELECT * FROM idea_comments,user WHERE author_uid=user.uid and icommentideaid IN (" . $ideaids . ")";
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
		$data['ideaclass'] = $this -> input -> post('ideaclass');
		$data['coverimage'] = $this -> input -> post('coverimage');
		$data['isallow'] = 0;
		$data['ideaadddate'] = time();
		if ($data['ideauid'] != NULL) {
			if ($this -> db -> insert('idea', $data)) {
				//创新度+20
				$this -> db -> where('uid', $this -> session -> userdata('uid'));
				$this -> db -> set('creativitynum', 'creativitynum+20', false) -> update('point');
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
		$data['ideaclass'] = $this -> input -> post('ideaclass');
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
					//活跃度+2
					$this -> db -> where('uid', $this -> session -> userdata('uid'));
					$this -> db -> set('activenum', 'activenum+2', false) -> update('point');

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
				//活跃度+1
				$this -> db -> where('uid', $this -> session -> userdata('uid'));
				$this -> db -> set('activenum', 'activenum+1', false) -> update('point');
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
	 * 创意蛋嵌套回复评论
	 */
	function addreply2() {

		$data['icommentideaid'] = $this -> input -> post('icommentideaid');
		$data['author_uid'] = $this -> session -> userdata('uid');
		$data['comment_content'] = $this -> input -> post('comment_content');
		$data['supporttype'] = $this -> input -> post('supporttype');
		$data['comment_parent'] = $this -> input -> post('comment_id');
		$data['comment_date'] = time();
		if ($data['icommentideaid'] != NULL) {
			if ($this -> db -> insert('idea_comments', $data)) {
				//活跃度+1
				$this -> db -> where('uid', $this -> session -> userdata('uid'));
				$this -> db -> set('activenum', 'activenum+1', false) -> update('point');
				//增加消息通知
				$row = $this -> Projects_model -> showIdeaByPid($this -> input -> post('icommentideaid'));
				//$row2 = $this -> Projects_model -> getideacommentbyid($this -> input -> post('comment_id'));
				$data2['itemname'] = $row -> ideaname;
				$data2['snsitemid'] = $row -> ideaid;
				$data2['senduid'] = $this -> session -> userdata('uid');
				$data2['recuid'] = $this -> input -> post('comforuid');
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

	/**
	 * 增加项目动态
	 */
	function addProjectmessage() {

		$data['pid'] = $this -> input -> post('pid');
		$data['auid'] = $this -> session -> userdata('uid');
		$data['pmcontent'] = $this -> input -> post('pmcontent');
		$data['replynum'] = 0;
		$data['pmdate'] = time();
		if ($data['pid'] != NULL) {
			if ($this -> db -> insert('project_message', $data)) {
				/*增加消息通知
				 $row = $this -> Projects_model -> showProjectsByPid($this -> input -> post('pid'));
				 $data2['itemname'] = $row -> name;
				 $data2['snsitemid'] = $row -> pid;
				 $data2['senduid'] = $this -> session -> userdata('uid');
				 $data2['recuid'] = $row -> uid;
				 $data2['content'] = $this -> input -> post('comment_content');
				 $data2['type'] = "projectcomment";
				 $data2['senddate'] = time();

				 if ($data2['senduid'] == $data2['recuid']) {
				 return TRUE;
				 }
				 if ($this -> db -> insert('snsnotice', $data2)) {
				 return TRUE;
				 } else {
				 return FALSE;
				 }*/
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	/**
	 * 增加项目动态评论
	 */
	function addProjectmessage_reply() {

		$data['promid'] = $this -> input -> post('promid');
		$data['reuid'] = $this -> session -> userdata('uid');
		$data['pmrecontent'] = $this -> input -> post('pmrecontent');
		$data['redate'] = time();
		if ($data['promid'] != NULL) {
			if ($this -> db -> insert('project_message_reply', $data)) {

				$this -> db -> where('promid', $data['promid']);
				if ($this -> db -> set('replynum', 'replynum+1', false) -> update('project_message')) {
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
	 * 获得对应id的空间动态评论
	 */
	function getProjectmessage_reply() {
		$promid = $this -> input -> get('promid');
		$sql = "SELECT * FROM  project_message_reply,user  where user.uid=project_message_reply.reuid and project_message_reply.promid=" . $promid;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	/*
	 * 获得对应pid的项目支付统计
	 */
	function getproject_pay($pid) {
		$sql = "SELECT * FROM  project_pay where pid=" . $pid;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function getproject_paylist($pid) {
		$sql = "SELECT * FROM  project_paylist where pid=" . $pid;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function projectpay() {
		$payvalue = $this -> input -> post('payvalue');
		$uid = $this -> session -> userdata('uid');
		$sql = "SELECT * FROM  money where uid=" . $uid;
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			if($row->value> $payvalue){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
	}
	
	//项目支付
	function projectpayit() {
		$payvalue = $this -> input -> post('payvalue');
		$data['pid'] = $this -> input -> post('pid');
		$data['pplistid'] = $this -> input -> post('pplistid');
		$data['uid'] = $this -> session -> userdata('uid');
		$this -> db -> where('uid', $data['uid']);
		if ($this -> db -> set('value', 'value-'.$payvalue, false) -> update('money')) {
			$this -> db -> where('pid', $data['pid']);
			$this -> db -> set('nowvalue', 'nowvalue+'.$payvalue, false) -> update('project_pay');
			$this -> db -> where('pplistid', $data['pplistid']);
			$this -> db -> set('getnum', 'getnum+1', false) -> update('project_paylist');
			//增加支付订单记录
			$dataorder['pid'] = $data['pid'];
			$dataorder['uid'] = $data['uid'];
			$dataorder['payvalue'] = $payvalue;
			$dataorder['adddate'] = time();
			$dataorder['orderstate'] = '0';
			$dataorder['isfinish'] = 0;
			if ($this -> db -> insert('project_payorder', $dataorder)) {
				return TRUE;
			}else{
				return FALSE;
			}
		} else {
			return FALSE;
		}
		
	}

}
?>