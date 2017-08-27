<?php
	class Users extends CI_Controller{
		// Register First Admin
		public function firstadmin(){
			$data['title'] = 'Register First Admin';
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('id_number', 'Id_number', 'required|callback_check_idnumber_exists');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/firstadmin', $data);
				$this->load->view('templates/footer');
			} else{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->registerfirstadmin($enc_password);

				// Set message
				$this->session->set_flashdata('firstadmin','Your are now registed and can log in');

				redirect('users/login');
			}
		}

		// Register User
		public function registerrole(){
			$data['title'] = 'Register Role';
			$data['supervisors'] = $this->user_model->get_supervisors();

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/registerrole', $data);
				$this->load->view('templates/footer');
			} else{

				$this->user_model->registerrole($enc_password);
				$this->load->library('email');

				$config['protocol'] = "smtp";
				// does not have to be gmail
				$config['smtp_host'] = 'ssl://smtp.gmail.com'; 
				$config['smtp_port'] = '465';
				$config['smtp_user'] = 'sharingprojectsplatforms@gmail.com';
				$config['smtp_pass'] = 'MrrKelvin941017';
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";
				$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

				$this->email->from('sharingprojectsplatforms@gmail.com', 'Sharing Projects Platforms');
				$this->email->to($this->input->post('email'));
				$this->email->subject('Your account is created');
				$this->email->message('You can now sign in with your email with password:1234');

				if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }
				// Set message
				$this->session->set_flashdata('user_added','New user is now registed and can log in');

				redirect('users/registerrole');
			}
		}

		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else{
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered','Your are now registed and can log in');

				redirect('users/login');
			}
		}


		public function changepassword(){
			$data['title'] = 'Change Password';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/changepassword', $data);
				$this->load->view('templates/footer');
			} else{
				$email = $this->input->post('email');

				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->changepassword($email,$enc_password);

				// Set message
				$this->session->set_flashdata('changepassword','Password Changed! Please login again.');

				redirect('users/logout');
			}
		}

		//Log In User
		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else{

				// Get email
				$email = $this->input->post('email');

				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login User
				$user_id = $this->user_model->login($email, $password);
				$user_role = $this->user_model->get_role($user_id);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'email' => $email,
						'name' => $this->user_model->get_name($user_id),
						'user_role' => $this->user_model->get_role($user_id),
						'status' => $this->user_model->get_status($user_id),
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin',' Hi, '.$this->session->userdata("name").'. You are signed in as '.$this->session->userdata("user_role").' .');

					echo "<prev>";
					print_r($this->session->all_userdata());
					echo "</prev>";

					if($this->session->userdata('status') == '0'){
						$this->session->set_flashdata('pls_changepassword','Please Change Password for security');
						redirect('users/changepassword');
					}else{
						
						redirect('home');
					
					}
				} else {
					// Set message
					$this->session->set_flashdata('login_failed','Login is invalid');
			
					redirect('users/login');
				}
			}
		}

		// Log user out

		public function logout(){
			// insert user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('name');
			$this->session->unset_userdata('user_role');
			$this->session->unset_userdata('status');

			// Set message
			$this->session->set_flashdata('user_loggedout','You are now logged out');

			redirect('users/login');
		}

		function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists','That email is taken. Please choose a different one!');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function viewsv(){
			$data['title'] = 'View Students & Supervisors';
			$data['students'] = $this->user_model->get_students();
			$data['supervisors'] = $this->user_model->get_supervisors();


			$this->load->view('templates/header');
			$this->load->view('users/viewsv', $data);
			$this->load->view('templates/footer');

		}

		public function changesv(){
			$data['title'] = 'Change Supervisor';
			$data['students'] = $this->user_model->get_students();
			$data['supervisors'] = $this->user_model->get_supervisors();

			$this->form_validation->set_rules('student_id', 'Student ID', 'required');
			$this->form_validation->set_rules('sv_id', 'Sv ID', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/changesv', $data);
				$this->load->view('templates/footer');
			} else{
				$student_id = $this->input->post('student_id');
				$sv_id = $this->input->post('sv_id');

				if($this->user_model->get_supervisor_id($student_id) == $sv_id){
					// Set message
					$this->session->set_flashdata('svsame','Supervisor is same!'.' The student "'.$this->user_model->get_name($student_id).'" '.' are still supervised by "'.$this->user_model->get_name($sv_id).'"');
					redirect('users/changesv');
				}
				$this->user_model->changesv($student_id,$sv_id);
				$this->project_model->changesv($student_id,$sv_id);

				// Set message
				$this->session->set_flashdata('svchanged','Supervisor Changed!'.' The student "'.$this->user_model->get_name($student_id).'" '.' are now supervised by "'.$this->user_model->get_name($sv_id).'"');

				redirect('users/changesv');
			}
		}

	}