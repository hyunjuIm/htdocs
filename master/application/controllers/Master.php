<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller
{
	//로그인
	public function master_login()
	{
		$this->load->view('master_login');
	}

	//메인화면
	public function index()
	{
		$this->load->view('index');
	}

	//회원관리
	public function customer_list()
	{
		$this->load->view('customer_list');
	}

	//예약관리
	public function reservation_list()
	{
		$this->load->view('reservation_list');
	}

	//기업관리
	public function company_list()
	{
		$this->load->view('company_list');
	}

	//병원관리
	public function hospital_list()
	{
		$this->load->view('hospital_list');
	}

	//패키지관리
	public function package_list()
	{
		$this->load->view('package_list');
	}

	//패키지생성
	public function package_create()
	{
		$this->load->view('package_create');
	}

	//패키지상세
	public function package_injection_item()
	{
		$this->load->view('package_injection_item');
	}

	//직원관리
	public function confirm_employee()
	{
		$this->load->view('confirm_employee');
	}

	//패키지승인
	public function confirm_package()
	{
		$this->load->view('confirm_package');
	}

	//패키지승인
	public function confirm_package_detail()
	{
		$this->load->view('confirm_package_detail');
	}

	//청구관리
	public function billing_list()
	{
		$this->load->view('billing_list');
	}

	//청구상세
	public function billing_detail()
	{
		$this->load->view('billing_detail');
	}

	//결과관리 - 검진결과
	public function result_list()
	{
		$this->load->view('result_list');
	}

	//결과관리 - 법적자료
	public function result_legal_data()
	{
		$this->load->view('result_legal_data');
	}

	//기업통계
	public function statistics_company()
	{
		$this->load->view('statistics_company');
	}

	//병원통계
	public function statistics_hospital()
	{
		$this->load->view('statistics_hospital');
	}

	//질병백과 - 전체 리스트
	public function health_encyclopedia_list()
	{
		$this->load->view('health_encyclopedia_list');
	}

	//질병백과 - 글보기
	public function health_encyclopedia_detail()
	{
		$this->load->view('health_encyclopedia_detail');
	}

	//질병백과 - 글쓰기
	public function health_encyclopedia_write()
	{
		$this->load->view('health_encyclopedia_write');
	}

	//질병백과 - 글수정
	public function health_encyclopedia_update()
	{
		$this->load->view('health_encyclopedia_update');
	}

	//공지사항 - 전체 리스트
	public function service_notice()
	{
		$this->load->view('service_notice');
	}

	//공지사항 - 글보기
	public function service_notice_detail()
	{
		$this->load->view('service_notice_detail');
	}

	//공지사항 - 글쓰기
	public function service_notice_write()
	{
		$this->load->view('service_notice_write');
	}

	//공지사항 - 글수정
	public function service_notice_update()
	{
		$this->load->view('service_notice_update');
	}

	//고객센터 - 전체 리스트
	public function service_qan_list()
	{
		$this->load->view('service_qan_list');
	}
}
