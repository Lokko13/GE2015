<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Controller class for logout
 * @author Carlo Carabeo
 */
class Logout extends CI_Controller{
	//destroys all session data then redirects to login page
	function __construct(){
		parent::__construct();
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('is_logged_in');	
		$this->session->unset_userdata('is_admin');	
		$this->session->unset_userdata('college');	
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
