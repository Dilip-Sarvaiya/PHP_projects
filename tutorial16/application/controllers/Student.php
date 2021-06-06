<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	function __construct()
	{
		parent:: __construct();
		if(!isset($this->session->userdata['username']))
		{
			redirect(base_url('Users'));
		}
		$this->load->model('Memberlist');
	}
    public function index()
	{
		$this->load->database();
		$this->load->model('Memberlist');
		$data['h']=$this->Memberlist->display();
		$this->load->view('Members',$data);
	}
	function form($id=0)
	{		
		if($id==0){
			$this->load->view('insert');
		}else{
			$this->load->model('Memberlist');
			$member=$this->Memberlist->getSingle($id);
			$data['member']=$member;
			$this->load->view('insert',$data);
		}
	}
	function insert()
	{	
			$this->form_validation->set_rules('firstname','Firstname','required');
			$this->form_validation->set_rules('lastname','Lastname','required');
			$this->form_validation->set_rules('email','Email','required|valid_email');
			$this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('repassword','Repassword','required|matches[password]');
			$this->form_validation->set_rules('contact','Contact','required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('birthday','Birthday','required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('passno','Pass no','required');
			$this->form_validation->set_rules('registerby','Register by','required');
			$this->form_validation->set_rules('status','Status','required');
			//$this->form_validation->set_rules('photo','Photo','required');
			if($this->form_validation->run()==false){
              
				$id = $this->input->post('id');
				if($id!=0){				
							$this->load->database();
							$this->load->model('Memberlist');
							$data['h']=$this->Memberlist->display();
							$this->load->view('Members',$data);				
				}else 
				{
					
					$this->load->view('insert');					
				}
			}else 
			{
					$this->load->model('Memberlist');	
					$formArray=array();
					$formArray['id']=$this->input->post('id');
					$formArray['firstname']=$this->input->post('firstname');
					$formArray['lastname']=$this->input->post('lastname');
					$formArray['email']=$this->input->post('email');
					$formArray['password']=$this->input->post('password');
					$formArray['repassword']=$this->input->post('repassword');
					$formArray['contact']=$this->input->post('contact');
					$formArray['birthday']=$this->input->post('birthday');
					$formArray['gender']=$this->input->post('gender');
					$formArray['passno']=$this->input->post('passno');
					$formArray['registerby']=$this->input->post('registerby');
					$formArray['status']=$this->input->post('status');
					$formArray['photo']=$this->input->post('photo');
					$fullname=$_POST['lastname']." ".$_POST['firstname'];
					$_POST['fullname']=$fullname;
						if($_FILES['photo']!=NULL)
						{
							if(isset($_FILES['photo'])){
								$file_name = $_FILES['photo']['name'];
								$file_tmp =$_FILES['photo']['tmp_name'];
								$root = getcwd();
								move_uploaded_file($file_tmp,$root.'/assets/uploads/'.$file_name);	
							}	
						$_POST['photo']=$_FILES['photo']['name'];
						$formArray = $this->input->post();
						if($file_name == NULL){
							unset($formArray['photo']);
						}
						unset($formArray['repassword']);
						$this->load->database();
						$this->load->model('Memberlist');
						$this->Memberlist->insert($formArray);
						 redirect('Student');
			}
		}
	}
	function delete($id)
	{
		$this->load->model('Memberlist');
		$this->Memberlist->deleteUser($id);
		//$result=$this->Memberlist->display();
		
			//$data['photo']=$result->photo;
				//unlink($root.'assets/uploads/'.$data['photo']);
		redirect(base_url('Student/index'));
	}
}
?>
