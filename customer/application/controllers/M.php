<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m extends CI_Controller
{
	/*
	모바일
	*/

	//메인화면
	public function home()
	{
		$this->load->view('mobile/home');
	}

	//내정보
	public function my_page()
	{
		$this->load->view('mobile/my_page/my_page');
	}

	//비밀번호 변경
	public function my_password()
	{
		$this->load->view('mobile/my_page/my_password');
	}

}
