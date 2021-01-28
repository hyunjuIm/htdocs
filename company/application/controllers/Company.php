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
		$this->load->view('pc/reservation/reservation_list');
	}

	//직원관리 리스트
	public function employee_manage()
	{
		$this->load->view('pc/confirm/employee_manage');
	}

	//직원관리 글쓰기
	public function employee_manage_write()
	{
		$this->load->view('pc/confirm/employee_manage_write');
	}

	//직원관리 글수정
	public function employee_manage_update()
	{
		$this->load->view('pc/confirm/employee_manage_update');
	}

	//패키지관리 리스트
	public function confirm_package()
	{
		$this->load->view('pc/confirm/confirm_package');
	}

	//패기지관리 상세보기
	public function confirm_package_detail()
	{
		$this->load->view('pc/confirm/confirm_package_detail');
	}
	
	//통계관리
	public function statistics_manage() {
		$this->load->view('pc/statistics/statistics_manage');
	}

	//청구관리
	public function bill_manage() {
		$this->load->view('pc/bill/bill_manage');
	}

	//공지사항
	public function notice_list() {
		$this->load->view('pc/notice/notice_list');
	}

	//공지사항 상세보기
	public function notice_detail() {
		$this->load->view('pc/notice/notice_detail');
	}
}
