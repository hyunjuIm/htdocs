<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller
{
	//로그인
	public function customer_login()
	{
		$this->load->view('customer_login');
	}

	//메인화면
	public function index()
	{
		$this->load->view('index');
	}

	//내정보
	public function my_page()
	{
		$this->load->view('my_page');
	}

	//비밀번호 변경
	public function my_password()
	{
		$this->load->view('my_password');
	}

}
