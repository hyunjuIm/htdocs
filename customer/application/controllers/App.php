<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	//메인
	public function index()
	{
		$this->load->view('app/main');
	}

	//맞춤형 건강정보
	public function custom()
	{
		$this->load->view('app/custom_health_info');
	}

	//알아두면 쓸모있는 건강정보
	public function all()
	{
		$this->load->view('app/all_health_info');
	}

	//건강정보 검색
	public function search()
	{
		$this->load->view('app/search_health_info');
	}

	//카드뉴스 상세
	public function card()
	{
		$this->load->view('app/detail_card');
	}

	//질병백과 상세
	public function encyclopedia()
	{
		$this->load->view('app/detail_encyclopedia');
	}

	//공지
	public function notice()
	{
		$this->load->view('app/notice');
	}

	//공지 상세
	public function notice_detail()
	{
		$this->load->view('app/notice_detail');
	}
}
