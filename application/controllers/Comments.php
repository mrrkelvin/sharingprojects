<?php
	class Comments extends CI_Controller{
		public function create($project_id){
			$slug = $this->input->post('slug');
			$data['project'] = $this->project_model->get_projects($slug);
			$project_image = $this->project_model->get_project_image($slug);
			$title = $this->project_model->get_project_title($slug);
			//$slug = $this->project_model->get_project_slug($slug);

			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('body', 'Body', 'required');

				if($this->form_validation->run() === FALSE){
					$data['comments'] = $this->comment_model->get_comments($project_id);

					$this->load->view('templates/header');
					$this->load->view('projects/view', $data);
					$this->load->view('templates/footer');
				}else {
					$this->comment_model->create_comment($project_id,$project_image,$title,$slug);
					redirect('projects/'.$slug);
				}
			}else{
				redirect('users/login');
			}
		}
		public function createforpending($project_id){
			$slug = $this->input->post('slug');
			$data['project'] = $this->project_model->get_projects_by_pending($slug);
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('body', 'Body', 'required');

				if($this->form_validation->run() === FALSE){
					$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
					$this->load->view('templates/header');
					$this->load->view('projects/pendingview', $data);
					$this->load->view('templates/footer');
				}
				// else if (trim($this->input->post('body')) == null){
				// 	$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
				// 	redirect('projects/pendingview/'.$slug);
				// }
				else {
					$this->comment_model->create_comment_supervisor($project_id);
					redirect('projects/pendingview/'.$slug);
				}
			}else{
				redirect('users/login');
			}

		}

		public function createforapproved($project_id){
			$slug = $this->input->post('slug');
			$data['project'] = $this->project_model->get_projects_by_approved($slug);
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('body', 'Body', 'required');

				if($this->form_validation->run() === FALSE){
					$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
					$this->load->view('templates/header');
					$this->load->view('projects/approvedview', $data);
					$this->load->view('templates/footer');
				}
				// else if (trim($this->input->post('body')) == null){
				// 	$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
				// 	redirect('projects/pendingview/'.$slug);
				// }
				else {
					$this->comment_model->create_comment_supervisor($project_id);
					redirect('projects/approvedview/'.$slug);
				}
			}else{
				redirect('users/login');
			}

		}

		public function createforrejected($project_id){
			$slug = $this->input->post('slug');
			$data['project'] = $this->project_model->get_projects($slug);
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('body', 'Body', 'required');

				if($this->form_validation->run() === FALSE){
					$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
					$this->load->view('templates/header');
					$this->load->view('projects/rejectedview', $data);
					$this->load->view('templates/footer');
				}
				// else if (trim($this->input->post('body')) == null){
				// 	$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
				// 	redirect('projects/pendingview/'.$slug);
				// }
				else {
					$this->comment_model->create_comment_supervisor($project_id);
					redirect('projects/rejectedview/'.$slug);
				}
			}else{
				redirect('users/login');
			}

		}

		public function createfordiscussion($project_id,$comment_id){
			$slug = $this->input->post('slug');
			$data['comments'] = $this->project_model->get_projects_by_rejected($slug);
			if($this->session->userdata('logged_in')){
				$this->form_validation->set_rules('name', 'Name', 'required');
				$this->form_validation->set_rules('body', 'Body', 'required');

				if($this->form_validation->run() === FALSE){
					$data['discussion'] = $this->comment_model->get_discussions($project_id);
					$this->load->view('templates/header');
					$this->load->view('comments/discussion', $data);
					$this->load->view('templates/footer');
				}
				// else if (trim($this->input->post('body')) == null){
				// 	$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);
				// 	redirect('projects/pendingview/'.$slug);
				// }
				else {
					$this->comment_model->create_comment_discussion($project_id);
					redirect('comments/discussionview/'.$slug);
				}
			}else{
				redirect('users/login');
			}

		}

		public function discussionview($slug = NULL){
			$data['project'] = $this->comment_model->get_projects_view($slug);
			$project_id = $data['project']['project_id'];
			$data['comments'] = $this->comment_model->get_comments($project_id);
			//$data['commentsCounts'] = $this->comment_model->get_comments_counts($project_id);
			$data['comment'] = $this->comment_model->get_comments_id_byslug($slug);
			$comment_id = $data['comment']['comment_id'];
			$data['discussions'] = $this->comment_model->get_discussions($comment_id);

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = $data['project']['title'];

			$this->load->view('templates/header');
			$this->load->view('projects/discussionview', $data);
			$this->load->view('templates/footer');

		}
	}