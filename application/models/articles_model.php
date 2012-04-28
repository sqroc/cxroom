<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Articles_model extends CI_Model {
	function vocabulary_add() {

		$data['name'] = $this -> input -> post('title');
		$data['content'] = $this -> input -> post('content');
		$data['articletitle'] = $this -> input -> post('article_title');
		$data['articleurl'] = $this -> input -> post('article_link');
		$data['adddate'] = time();
		if ($data['name'] != NULL) {
			if ($this -> db -> insert('vocabulary', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function article_add2() {

		$data['title'] = $this -> input -> post('title');
		$data['content'] = $this -> input -> post('content');
		$data['articleclass'] = $this -> input -> post('articleclass');
		$data['adddate'] = time();
		if ($data['title'] != NULL) {
			if ($this -> db -> insert('article', $data)) {
				return TRUE;
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	function showLabsByLimitAll($offset, $num) {
		$sql = "SELECT * FROM vocabulary order by vid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}

	function showArticlesByLimitAll($offset, $num) {
		$sql = "SELECT * FROM article order by articleid desc limit " . $offset . "," . $num;
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function show_article_notice_footer() {
		$sql = "SELECT * FROM article where articleclass = '公告' order by articleid desc limit 3";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function show_article_help_footer() {
		$sql = "SELECT * FROM article where articleclass = '帮助' order by articleid desc limit 3";
		$query = $this -> db -> query($sql);
		return $query -> result();
	}
	
	function show_article_by_id($articleid) {
		$sql = "SELECT * FROM article where articleid = ".$articleid;
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function showLabsByRandOne() {
		$sql = "select  *  from  vocabulary order by rand() limit 1 ";
		$query = $this -> db -> query($sql);
		foreach ($query->result() as $row) {
			return $row;
		}
	}

	function select_num_rowsLabAll() {
		$query = $this -> db -> query("SELECT * FROM vocabulary ");
		return $query -> num_rows();
	}

	function select_num_rowsArticleAll() {
		$query = $this -> db -> query("SELECT * FROM article ");
		return $query -> num_rows();
	}

	function lab_delete($vid) {
		$data['vid'] = $vid;
		$this -> db -> delete("vocabulary", $data);
		return TRUE;
	}

	function article_delete($articleid) {
		$data['articleid'] = $articleid;
		$this -> db -> delete("article", $data);
		return TRUE;
	}

}
?>
