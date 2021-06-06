<?php
	class Members extends CI_Model
	{
		function displayData($id=0)
		{
			if($id==0)
			{
				$this->load->database();
				$data=array();
				$data=$this->db->get('members');
				return $data->result_array();
			}
			else
			{
				$this->db->where('id',$id);
				$data=$this->db->get('members');
				return $data->result_array();
			}
		}
		public function saveData($id=0,$image_data)
		{
			$firstname=$this->input->post('firstname');
			$lastname=$this->input->post('lastname');
			$fullname=$firstname." ".$lastname;
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$contact=$this->input->post('contact');
			$birthday=$this->input->post('birthday');
			$gender=$this->input->post('gender');
			$passno=$this->input->post('passno');
			$registerby=$this->input->post('registerby');
			$status=$this->input->post('status');
			$image_name=$image_data['image_upload']['file_name'];
			$data=array(
				"fullname"=>$fullname,
				"firstname"=>$firstname,
				"lastname"=>$lastname,
				"email"=>$email,
				"password"=>$password,
				"contact"=>$contact,
				"birthday"=>$birthday,
				"gender"=>$gender,
				"passno"=>$passno,
				"registerby"=>$registerby,
				"status"=>$status,
				"photo"=>$image_name
			);
			if($id==0)
			{
				$this->db->insert('members',$data);
				//print_r($data);
			}
			else
			{
				$this->db->where('id',$id);
				$this->db->update('members',$data);
				//print_r($data);
			}
			redirect(base_url('Member/index'));
		}
		function delete($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('members');
			redirect(base_url('Member/index'));
		}
		

	}
?>