<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_Session_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	This function checks if the user is logged in
	*/
	function _isLoggedIn(){
		if( isset($this->session->userdata('is_logged_in')) ){
			return $this->session->userdata('is_logged_in');		
		}
		else{
			return false;
		}
	}

	/*
	This function checks if the user is an admin
	*/
	function _isAdmin(){
		if( isset($this->session->userdata('is_admin')) ){
			return $this->session->userdata('is_admin');		
		}
		else{
			return false;
		}
	}
}