<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

    //메인
    public function index()
	{
		$this->load->view('main');
	}

    //맞춤형 건강정보
    public function custom()
    {
        $this->load->view('custom_health_info');
    }

	//알아두면 쓸모있는 건강정보
	public function all()
	{
		$this->load->view('all_health_info');
	}

	//건강정보 검색
	public function search()
	{
		$this->load->view('search_health_info');
	}
}
