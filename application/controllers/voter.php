<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('candidate_model');
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
		//echo json_encode($data); die();
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
	//This part feels hardcoded i should feel bad about myself -beng
	function _get_USG_Pres(){
		return $this->candidate_model->_getCandidatesFor('USG President');
	}

	function _get_USG_VPInternal(){
		return $this->candidate_model->_getCandidatesFor('VP Internals');
	}

	function _get_USG_VPExternal(){
		return $this->candidate_model->_getCandidatesFor('VP Externals');
	}

	function _get_USG_Treasurer(){
		return $this->candidate_model->_getCandidatesFor('Executive Treasurer');
	}

	function _get_USG_Secretary(){
		return $this->candidate_model->_getCandidatesFor('Executive Secretary');
	}

	function _get_STC_CampusPres(){
		return $this->candidate_model->_getCandidatesFor('Executive Secretary');
	}

	function _get_STC_CollegeRep($college){
		return $this->candidate_model->_getCollegeRep($college);
	}

	function _get_STC_LARep(){
		return $this->candidate_model->_getCandidatesFor('Legislative Assembly Representative');
	}
}