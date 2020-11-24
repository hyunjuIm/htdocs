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

	//검진예약1
	public function reservation_step1()
	{
		$this->load->view('reservation_step1');
	}

	//검진예약2
	public function reservation_step2()
	{
		$this->load->view('reservation_step2');
	}

	//검진예약3
	public function reservation_step3()
	{
		$this->load->view('reservation_step3');
	}

	//검진예약3
	public function reservation_step4()
	{
		$this->load->view('reservation_step4');
	}

	//예약현황
	public function reservation_list()
	{
		$this->load->view('reservation_list');
	}
}
