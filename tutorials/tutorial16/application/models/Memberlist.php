<?php
class Memberlist extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}
	function getSingle($id)
	{
			$this->db->where('id',$id);
			$member=$this->db->get('members');
			return $member->result_array()[0];
	}
	function display()
	{
		$query=$this->db->get('members');
		return $query;
	}
	function insert($formArray)
	{
		if($formArray['id']==0)
		{
				$this->db->insert('members',$formArray);
		}
		else
		{
				$this->db->where('id',$formArray['id']);
				$this->db->update('members',$formArray);
		}
	}
	function deleteUser($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('members');
	}
}
?>