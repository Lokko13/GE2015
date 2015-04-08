<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 redirect here to properlly logout session
 */
class Logout extends CI_Controller{
	//destroys all session data then redirects to login page
	function __construct(){
		parent::__construct();
		$id = $this->session->userdata('id');

		//destroy session
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('is_logged_in');	
		$this->session->unset_userdata('is_admin');	
		$this->session->unset_userdata('college');	
		$this->session->sess_destroy();

		//remove session from db
		$this->load->model('active_sessions_model');
		$this->active_sessions_model->_removeSession($id);
		redirect('login');
	}
	
}
