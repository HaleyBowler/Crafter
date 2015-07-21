<?php

class Like extends CI_Controller{
	public function index()
		{
			$user_info = $this->session->all_userdata();
			$user_id = $user_info['user_id'];
			$username = $user_info['username'];

			$query = $this->db->query("SELECT * FROM `likes` WHERE user_id=".$user_id."");
			$likes = $query->result_array();

			$data = array(
               'likes' => $likes
        	);

        	echo 'Total Results: ' . $query->num_rows();


			$this->load->view('like', $data);
		}  
	}
?>