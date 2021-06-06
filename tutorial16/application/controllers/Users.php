<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function signup()
	{
		$this->load->view('signup');
	}
	public function save_registration()
	{
		// $postdata=$this->input->post();
		// echo "<pre>";
		// print_r($postdata);
		// echo "</pre>";
		
		
		$this->form_validation->set_rules('username', 'Username', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[8]');
		$this->form_validation->set_rules('passwordc', 'Password Confirmation', 'required|matches[password]');
		//Server Side Validation Here
		if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('signup');
        }
        else
        {
			   $this->session->set_flashdata('errno',1);
			   $this->session->set_flashdata('reg_message','Account Created');
			   	$formArray=array();
				$formArray['username']=$this->input->post('username');
				$formArray['password']=$this->input->post('password');
				$this->User->insert($formArray);
               redirect(base_url('Users'));
        }
	}
	public function validateUser()
	{
		$postdata=$this->input->post();
		if($validate=$this->User->validateUser($postdata))
		{
			$this->session->set_userdata('username',$validate['username']);
			$this->session->set_flashdata('message','~ Login Successfully');
			$this->session->set_flashdata('errno',2);
			redirect(base_url('Student'));
		}
		else
		{
				$this->session->set_flashdata('errno',1);
				$this->session->set_flashdata('message','Login Failed');
				redirect(base_url('Users'));
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('errno',3);
		$this->session->set_flashdata('message','Logout Successfully');
		redirect(base_url('Users'));
	}
}
?>
