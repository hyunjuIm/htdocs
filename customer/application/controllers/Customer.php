<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller
{

	//국민클럽
	public function kmclub()
	{
		$this->load->view('pc/kmclub');
	}
	//로그인
	public function login()
	{
		$this->load->view('customer_login');
	}

	//회원가입
	public function join()
	{
		$this->load->view('customer_join');
	}

	//메인화면
	public function index()
	{
		$this->load->view('pc/index');
	}

	//내정보
	public function my_page()
	{
		$this->load->view('pc/my_page/my_page');
	}

	//비밀번호 변경
	public function my_password()
	{
		$this->load->view('pc/my_page/my_password');
	}

	//검진예약1
	public function reservation_step1()
	{
		$this->load->view('pc/reservation/reservation_step1');
	}

	//검진예약2
	public function reservation_step2()
	{
		$this->load->view('pc/reservation/reservation_step2');
	}

	//검진예약3
	public function reservation_step3()
	{
		$this->load->view('pc/reservation/reservation_step3');
	}

	//검진예약3
	public function reservation_step4()
	{
		$this->load->view('pc/reservation/reservation_step4');
	}

	//예약현황
	public function reservation_list()
	{
		$this->load->view('pc/reservation/reservation_list');
	}

	//종합결과
	public function result_final()
	{
		$this->load->view('pc/result/result_final');
	}

	//주요결과
	public function result_main()
	{
		$this->load->view('pc/result/result_main');
	}

	//질병백과 - 전체 리스트
	public function health_encyclopedia_list()
	{
		$this->load->view('pc/health_info/health_encyclopedia_list');
	}

	//질병백과 - 글보기
	public function health_encyclopedia_detail()
	{
		$this->load->view('pc/health_info/health_encyclopedia_detail');
	}

	//이용약관
	public function policy1()
	{
		$this->load->view('pc/guide/policy_1');
	}

	//개인정보 처리방침
	public function policy2()
	{
		$this->load->view('pc/guide/policy_2');
	}

	//공지사항
	public function notice_list()
	{
		$this->load->view('pc/guide/notice_list');
	}

	//공지사항 세부페이지
	public function notice_detail()
	{
		$this->load->view('pc/guide/notice_detail');
	}

	//병원별 검진 비교
	public function comparison_hospital()
	{
		$this->load->view('pc/guide/comparison_hospital');
	}

	//건강검진 안내
	public function health_checkup_guide()
	{
		$this->load->view('pc/guide/health_checkup_guide');
	}

	//자주 묻는 질문
	public function customer_service_faq()
	{
		$this->load->view('pc/service/customer_service_faq');
	}

	//1:1 문의
	public function customer_service_one_inquiry()
	{
		$this->load->view('pc/service/customer_service_one_inquiry');
	}

	//내 문의 내역
	public function customer_service_inquiry_list()
	{
		$this->load->view('pc/service/customer_service_inquiry_list');
	}
}
