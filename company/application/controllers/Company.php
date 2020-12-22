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

	//예약관리
	public function reservation_list()
	{
		$this->load->view('pc/reservation_list');
	}

	//직원관리 리스트
	public function employee_manage()
	{
		$this->load->view('pc/employee_manage');
	}

	//직원관리 글쓰기
	public function employee_manage_write()
	{
		$this->load->view('pc/employee_manage_write');
	}
	
	//통계관리
	public function statistics_manage() {
		$this->load->view('pc/statistics_manage');
	}

	//청구관리
	public function bill_manage() {
		$this->load->view('pc/bill_manage');
	}
}
