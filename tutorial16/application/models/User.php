<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Model
{
	public function validateUser($user_credential)
	{
		$this->db->where('username',$user_credential['username']);
		$this->db->where('password',$user_credential['password']);
		$member=$this->db->get('user');
		if($member->num_rows())
		{
			return $member->result_array()[0];
		}
		else{
				return false;
		}
	}
	function insert($formArray)
	{
	
		$this->db->insert('user',$formArray);
	}
}
?>