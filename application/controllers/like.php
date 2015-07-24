<?php

class Like extends CI_Controller{
	public function index()
	{
		$user_info = $this->session->all_userdata();
		$user_id = $user_info['user_id'];
		$username = $user_info['username'];
		
		$config['num_tag_close'] = '</li>';

		$query = $this->db->query("SELECT * FROM `likes` WHERE user_id=".$user_id."");
		$likes = $query->result_array();

        //call the model function to get the department data
		$data['likes'] = $likes;

        //load the department_view
		$this->load->view('like', $data);
	}  
}
?>