<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller
{
	//로그인
	public function login()
	{
		$this->load->view('login/login');
	}

	//메인화면
	public function index()
	{
		$this->load->view('pc/main');
	}

	//메인화면
	public function reservation_list()
	{
		$this->load->view('pc/reservation_list');
	}
}
