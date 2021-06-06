<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		if(!isset($this->session->userdata['username']))
		{
			redirect(base_url('Users'));
		}
		$this->load->model('Members');
	}
	public function index()
	{
		if($this->session->has_userdata('username'))
		{
			$this->load->model('Members');
			$data=$this->Members->displayData();
			$this->load->view('member',['memberdata'=>$data]);
		}
		else
		{
			redirect(base_url('Users'));
		}
		
	}
	function form($id=0)
	{
		if($id==0)
		{
			$this->load->view('form');
		}
		else
		{
			$this->load->model('Members');
			$data['memberdata']=$this->Members->displayData($id);
			$this->load->view('update_data_form',$data);
		}


	}
	function data($id=0)
	{
		$this->load->model('Members');
		$this->form_validation->set_rules('firstname','firstname','required|alpha');
		$this->form_validation->set_rules('lastname','lastname','required|alpha');
		$this->form_validation->set_rules('email','email','required|valid_email');
		$this->form_validation->set_rules('gender','gender','required|in_list[Male,Femele,Other]');
		$this->form_validation->set_rules('password','password','required|alpha_numeric|max_length[17]');
		$this->form_validation->set_rules('contact','contact','required|max_length[10]');
		$this->form_validation->set_rules('birthday','birthdate','required');
		$this->form_validation->set_rules('passno','pass number','required|alpha_numeric');
		$this->form_validation->set_rules('registerby','','required');
		$this->form_validation->set_rules('status','','required');
		if(!$this->form_validation->run())
		{
			if($id==0)
			{
				$this->load->view('form');
			}
			else
			{
				$this->load->view('update_data_form');
			}
		}
		
		$config['upload_path']='./image';
		$config['allowed_types']='png|jpg|jpeg';
		$this->load->library('upload',$config);
		if($this->upload->do_upload('photo'))
		{
			$image_data['image_upload']=$this->upload->data();
			$this->Members->saveData($id,$image_data);
		}
	}	
	public function delete($id)
	{
		$this->load->model('Members');
		$this->Members->delete($id);
	}
	/*function edit($id)
	{
		$this->load->model('members');
		$this->members->()
	}*/
}
