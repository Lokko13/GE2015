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
		$data['usg_pres'] = array('fuck' => array('it' => 'right', 'in'=>'the'), 'pussy'=>array('hard'=>'core'));
		$data['usg_vp_internal'] = "";
		$data['usg_vp_external'] = "";
		$data['usg_vp_external'] = "";
		$data['usg_treasurer'] = "";
		$data['usg_secretary'] = "";
		$data['stc_campus_pres'] = "";
		$data['stc_college_rep'] = ""; //make function use session
		$data['stc_la_rep'] = "";
		
		echo json_encode($data); die();
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
}