<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articles extends CI_Controller {
	
	public function index()
	{
		$sta = $this->session->userdata('user');
		$data = array('title'=>'创新二场', 'css'=>'article.css', 'js'=>'index.js',);
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
		$data = array('title'=>'创新二场', 'css'=>'article.css', 'js'=>'index.js',);
 		if (!isset($sta) || $sta!="login_ok"){
 			//redirect('/index_body/start');
 		}else{
 			$data['username'] = $this->session->userdata('username');
 		}
		$articleid = $this -> uri -> segment(3, 0);
		$data['article'] = $this -> Articles_model -> show_article_by_id($articleid);
		$data['notice_footer'] = $this -> Articles_model -> show_article_notice_footer();
		$data['help_footer'] = $this -> Articles_model -> show_article_help_footer();
		$this->load->view('header',$data);
		$this->load->view('system/article');
		$this->load->view('footer');
	}
	
	
	
}

?>