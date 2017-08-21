<?php
	class Categories extends CI_Controller{
		public function index(){
			$data['title'] = 'Categories';

			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['categories'] = $this->category_model->get_categories();
			// Check login
			if(!($this->session->userdata('user_role') == 'admin')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}
			
			$data['title'] = 'Create Category';

			$this->form_validation->set_rules('category_name', 'Name', 'required|callback_check_category_exists|callback_check_input');
			//$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			}else{
				$this->category_model->create_category($category_name);

				// Set message
				$this->session->set_flashdata('category_created','Your category has been created');

				redirect('categories/create');
			}
		}

		public function projects($category_id){
			$data['title'] = $this->category_model->get_category($category_id)->category_name;

			$data['projects'] = $this->project_model->get_projects_by_category($category_id);

			$this->load->view('templates/header');
			$this->load->view('projects/index', $data);
			$this->load->view('templates/footer');
		}

		public function delete($category_id){
			// Check login
			if(!($this->session->userdata('user_role') == 'admin')){
				$this->session->set_flashdata('Not_auth','Your are now loggout');
				redirect('users/logout');
			}

			$this->category_model->delete_category($category_id);

			// Set message
			$this->session->set_flashdata('category_deleted','Your category has been deleted');

			redirect('categories/create');
		}

		public function check_category_exists($category_name){
			$this->form_validation->set_message('check_category_exists','That category name is taken. Please create a different one!');
			if($this->category_model->check_category_exists($category_name)){
				return true;
			} else {
				return false;
			}
		}

		public function check_input($category_name){
			$this->form_validation->set_message('check_input','That category name is taken. Please create a different one!');
			if ($this->input->post('category_name') != ucfirst($this->input->post('category_name'))){
				return false;
			} else {
				return true;
			}
		}
		
	}