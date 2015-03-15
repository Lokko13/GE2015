<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['main_content'] = 'admin_home_view';
		$data['admin_name'] = 'aileen';
		$this->load->view('includes/template', $data);
	}

	function ActiveSessions(){
		$data['main_content'] = 'admin_activesessions_view';
		$data['admin_name'] = 'aileen';
		$this->load->view('includes/template', $data);	
	}

	function ManagementTools(){
		$data['main_content'] = 'admin_managementtools_home_view';
		$data['admin_name'] = 'aileen';
		$this->load->view('includes/template', $data);	
	}

	function VoterTools(){
		$data['main_content'] = 'admin_votertools_home_view';
		$data['admin_name'] = 'aileen';
		$this->load->view('includes/template', $data);	
	}
}