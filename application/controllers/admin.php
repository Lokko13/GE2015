<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$is_logged_in_session = $this->session->userdata('is_logged_in');
		$is_admin = $this->session->userdata('is_admin');
		
		//check login session
		if(!isset($is_logged_in_session) || $is_logged_in_session != true){
			$this->session->set_flashdata('login_error', 'Forced entry! No login detected!');	
			redirect('login');
		}
		else if(!isset($is_admin) || $is_admin != true){
			//check to avoid college errors
			$this->load->model('active_sessions_model');
			$this->active_sessions_model->_removeSession($this->session->userdata('id'));
			$this->session->set_flashdata('login_error', 'User is not an admin! Current session destroyed. Please login again');
			redirect('login');
		}
	}

	function index(){
		$data['main_content'] = 'admin_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$this->load->view('includes/template', $data);
	}

	function ActiveSessions(){
		$this->load->model('active_sessions_model');
		$data['main_content'] = 'admin_activesessions_view';
		$data['admin_name'] = $this->_getAdminName();
		$data['active_sessions'] = $this->active_sessions_model->_getActiveSessions();
		$this->load->view('includes/template', $data);	
	}

	function ManagementTools(){
		$data['main_content'] = 'admin_managementtools_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$this->load->view('includes/template', $data);	
	}

	function VoterTools(){
		$data['main_content'] = 'admin_votertools_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$this->load->view('includes/template', $data);	
	}

	function _getAdminName(){
		$this->load->model('admin_model');
		$x = $this->admin_model->_getAdmin($this->session->userdata('id'));
		return $x->first_name . " " . $x->last_name;
	}
}