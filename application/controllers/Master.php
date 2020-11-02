<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends CI_Controller
{
	//메인화면
	public function index()
	{
		$this->load->view('index');
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
}
