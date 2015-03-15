<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active_Sessions_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _addSession($id){
		$arr = array(
			'session_id' => md5($id),
			'voter_id' => $id,
			'session_ip_address' => $_SERVER['REMOTE_ADDR'],
			'timestamp' => time()
		);
		$this->db->insert('active_sessions', $arr);
		return;
	}

	function _removeSession($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('voter_id', $id);

		$this->db->delete('active_sessions');
	}
}