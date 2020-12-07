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

	//검진예약1
	public function reservation_step1()
	{
		$this->load->view('mobile/reservation_step1');
	}

	//검진예약2
	public function reservation_step2()
	{
		$this->load->view('mobile/reservation_step2');
	}

	//검진예약3
	public function reservation_step3()
	{
		$this->load->view('mobile/reservation_step3');
	}

	//검진예약3
	public function reservation_step4()
	{
		$this->load->view('mobile/reservation_step4');
	}

	//예약현황
	public function reservation_list()
	{
		$this->load->view('mobile/reservation_list');
	}

	//공지사항
	public function notice_list()
	{
		$this->load->view('mobile/guide/notice_list');
	}

	//공지사항 세부페이지
	public function notice_detail()
	{
		$this->load->view('mobile/guide/notice_detail');
	}

	//건강검진 안내
	public function health_checkup_guide()
	{
		$this->load->view('mobile/guide/health_checkup_guide');
	}

	//자주 묻는 질문
	public function customer_service_faq()
	{
		$this->load->view('mobile/customer_center/customer_service_faq');
	}

	//1:1 문의
	public function customer_service_one_inquiry()
	{
		$this->load->view('mobile/customer_center/customer_service_one_inquiry');
	}

	//내 문의 내역
	public function customer_service_inquiry_list()
	{
		$this->load->view('mobile/customer_center/customer_service_inquiry_list');
	}
}
