<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Common_model extends CI_Model {

	function global_data() {
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		if ($this -> session -> userdata('uid') != NULL) {
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		}
		return $data;
	}

}
?>