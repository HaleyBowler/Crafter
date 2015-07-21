<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}
	public function index()
	{
		if(($this->session->userdata('user_id')!=""))
		{
			$this->load->view('home.php');
		}
		else
		{
			$this->load->view("register_view");
		}
	}
    public function insert_into_db()
    {
    	$this->load->model('user_model');
    	$this->user_model->insert_into_db();

		$this->load->view('home.php');
	}
	public function login()
	{
		$rules = array(array('field'=>'l_email','label'=>'Email','rules'=>'required|valid_email'),
			array('field'=>'l_pass','label'=>'Password','rules'=>'required'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$auth=$this->user_model->login($this->input->post('l_email'),$this->input->post('l_pass'));
			if($auth)
			{
				$this->load->view('home.php');
			}
			else
			{
				$this->index();
			}
		}
	}public function register()
	{
$this->load->view('register_view');//loads the register_view.php file in views folder
}
public function do_register()
{
	$rules = array(
		array('field'=>'username','label'=>'User Name','rules'=>'trim|required|min_length[4]|max_length[12]'),
		array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]'),
		array('field'=>'password','label'=>'Password','rules'=>'trim|required|min_length[6]'),
		);
	$this->form_validation->set_rules($rules);
	if($this->form_validation->run() == FALSE)
	{
		$this->load->view('register_view');
	}
	else
	{
		$this->user_model->register_user();
		$this->load->view('success');
	}
}
public function logout()
{
	$this->session->sess_destroy();
	$this->load->view('register_view.php');
}
}