<?php 
	class User_model extends CI_Model{
		public function registerfirstadmin($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
				'role' => 'admin',
				'acc_status' => '1',
			);
			// Insert user
			return $this->db->insert('users', $data);
		}

		public function registerrole($enc_password){
			// User data array
			if ($this->input->post('role1') == 'student'){
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => md5('1234'),
					'role' => $this->input->post('role1'),
					'sv_id' => $this->input->post('sv_id'),
					'acc_status' => '0',
				);
			}else{
				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => md5('1234'),
					'role' => 'supervisor',
					'acc_status' => '0',
				);
			}
			// Insert user
			return $this->db->insert('users', $data);
		}

		public function register($enc_password){
			// User data array
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $enc_password,
				'role' => 'public',
				'acc_status' => '1',
			);

			// Insert user
			return $this->db->insert('users', $data);
		}

		// Log user in
		public function login($email, $password){
			//Validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->user_id;
			} else {
				return false;
			}
		}

		public function get_role($user_id){
			//Validate
			$this->db->where('user_id', $user_id);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->role;
			} else {
				return false;
			}
		}

		public function get_name($user_id){
			//Validate
			$this->db->where('user_id', $user_id);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->name;
			} else {
				return false;
			}
		}

		public function get_status($user_id){
			//Validate
			$this->db->where('user_id', $user_id);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->status;
			} else {
				return false;
			}
		}

		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		public function check_idnumber_exists($id_number){
			$query = $this->db->get_where('users', array('id_number' => $id_number));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		public function get_supervisors(){
			$query = $this->db->get_where('users', array('role' => 'supervisor'));
			return $query->result_array();
		}

		public function get_supervisor_name($sv_id){
			$this->db->where('user_id', $sv_id);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->name;
			} else {
				return false;
			}
		}

		public function get_supervisor_id($student_id){
			$this->db->where('user_id', $student_id);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->sv_id;
			} else {
				return false;
			}
		}

		public function get_students(){
			$query = $this->db->get_where('users', array('role' => 'student'));
			return $query->result_array();
		}

		public function check_user_exists(){
			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function changepassword($email,$enc_password){
			$this->db->set('password', $enc_password);
			$this->db->set('acc_status', '1');
			$this->db->where('email', $email);
			$this->db->update('users');
		}


		public function changesv(){
			$this->db->set('sv_id', $this->input->post('sv_id'));
			$this->db->where('user_id', $this->input->post('student_id'));
			$this->db->update('users');
		}

		public function get_email($project_id){

			
				$this->db->join('projects','users.user_id = projects.user_id');
				$query = $this->db->get_where('users', array('project_id' => $project_id));
				return $query->row(0)->email;
			}
	}