<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Abstain_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	this function adds an abstain vote by $voter, on what $position_tag
	if the positionn is college rep, it filters with $college
	*/
	function _addAbstainVote($voter, $position_tag, $college){
		switch($position_tag){
			//USG cases
			case 'pabstain' : 
				$position = "USG President";
				break;
			case 'viabstain' : 
				$position = "VP Internals";
				break;
			case 'veabstain' : 
				$position = "VP Externals";
				break;
			case 'tabstain' : 
				$position = "Executive Treasurer";
				break;
			case 'sabstain' : 
				$position = "Executive Secretary";
				break;
			//Stc cases
			case 'cpabstain' : 
				$position = "STC President";
				break;
			case 'crabstain' : 
				$position = $this->_getCollegeRep($college);
				break;
			case 'la1Abstain' : 
				$position = "Legislative Assembly Representative";
				break;
			case 'la2Abstain' : 
				$position = "Legislative Assembly Representative";
				break;
		}
		//adds the abstain vote
		$arr = array(
			'voter_id' => $voter,
			'position' => $position
		);

		$this->db->insert('abstain_tbl', $arr);
	}

	/*
	gets the college rep of the voter
	*/
	function _getCollegeRep($college){
		switch($college){
			case "CCS" : 
				$voterCollege = "CCS Representative";
				break;
			case "CLA" : 
				$voterCollege = "CLA Representative";
				break;
			case "COS" : 
				$voterCollege = "";
				break;
			case "GCOE" : 
				$voterCollege = "COE Representative";
				break;
			case "RVR-COB" : 
				$voterCollege = "COB Representative";
				break;
			case "SOE" : 
				$voterCollege = "";
				break;
		}
		return $voterCollege;
	}

	/*
	this function will return the number of abstains on a given $position
	*/
	function _getNumberOfAbstainOn($position){
		$this->db->where('position', $position);
		$q = $this->db->get('abstain_tbl');
		return $q->num_rows;
	}

}