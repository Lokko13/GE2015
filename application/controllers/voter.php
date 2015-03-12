<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		//view
		$data['main_content'] = 'voter_home_view';
		//session data
		$data['studentName'] = $this->_getStudentName($this->session->userdata('id'));
		$data['college'] = $this->session->userdata('college');
		//candidates
		$data['usg_pres'] = $this->_get_USG_Pres();
		$data['usg_vp_internal'] = $this->_get_USG_VPInternal();
		$data['usg_vp_external'] = $this->_get_USG_VPExternal();
		$data['usg_treasurer'] = $this->_get_USG_Treasurer();
		$data['usg_secretary'] = $this->_get_USG_Secretary();
		$data['stc_campus_pres'] = $this->_get_STC_CampusPres();
		$data['stc_college_rep'] = $this->_get_STC_CollegeRep($this->session->userdata('college'));
		$data['stc_la_rep'] = $this->_get_STC_LARep();
		
		$this->load->view('includes/template', $data);
	}

	function _getStudentName($id){
		$this->load->model('voter_model');
		$voter = $this->voter_model->_getVoter($id);
		$fname = $voter->first_name;
		$lname = $voter->last_name;
		return "$fname $lname";
	}

	function submitVote(){
		//voteValidationSubmit.php
	}

	//get candidates functions

	function _get_USG_Pres(){
		return;
	}

	function _get_USG_VPInternal(){
		return;
	}

	function _get_USG_VPExternal(){
		return;
	}

	function _get_USG_Treasurer(){
		return;
	}

	function _get_USG_Secretary(){
		return;
	}

	function _get_STC_CampusPres(){
		return;
	}

	function _get_STC_CollegeRep($college){
		return;
	}

	function _get_STC_LARep(){
		return;
	}
}