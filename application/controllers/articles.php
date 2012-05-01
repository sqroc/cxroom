<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {
	
	public function index()
	{
		$sta = $this->session->userdata('user');
		$data = array('title'=>'创新空间', 'css'=>'article.css', 'js'=>'index.js',);
 		if (!isset($sta) || $sta!="login_ok"){
 			//redirect('/index_body/start');
 		}else{
 			$data['username'] = $this->session->userdata('username');
 		}
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this->load->view('header',$data);
		$this->load->view('system/article');
		$this->load->view('footer');
	}	
	
	public function getarticle()
	{
		$sta = $this->session->userdata('user');
		$data = array('title'=>'创新空间', 'css'=>'article.css', 'js'=>'index.js',);
 		if (!isset($sta) || $sta!="login_ok"){
 			//redirect('/index_body/start');
 		}
		$data['username'] = $this -> session -> userdata('username');
		$data['email'] = $this -> session -> userdata('email');
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		if($data['email'] !=NULL)
		{
			$row = $this -> Users_model -> queryuser($data['email']);
			$data['intro'] = $row -> intro;
			$data['gender'] = $row -> gender;
			$data['province'] = $row -> province;
			$data['contact_email'] = $row -> contact_email;
			$data['qq'] = $row -> qq;
			$data['telphone'] = $row -> telphone;
			$data['phone'] = $row -> phone;
			$data['person_pic'] = $row -> person_pic;
		}
		
		if ($this -> session -> userdata('uid') != NULL) {
			$data['unreadnotice'] = $this -> Messages_model -> getunreadNoticenumber($this -> session -> userdata('uid'));
			$data['unreadmessage'] = $this -> Messages_model -> getunreadMessagenumber($this -> session -> userdata('uid'));
		}
		$articleid = $this -> uri -> segment(3, 0);
		$data['article'] = $this -> Articles_model -> show_article_by_id($articleid);
		$data['title'] =  $data['article']->title." - 创新空间";
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this->load->view('header',$data);
		$this->load->view('system/article');
		$this->load->view('footer');
	}
	
	
	
}

?>