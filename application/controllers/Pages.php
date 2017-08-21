<?php
	class Pages extends CI_Controller{
		public function view($page = 'home'){

			$users = $this->user_model->check_user_exists();

			if($users == true){
				if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
					show_404();
				}
				$data['title'] = ucfirst($page);
				$this->load->view('templates/header');
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');
			}else{
				$data['title'] = 'Register First Admin';
				$this->load->view('templates/headerfirst');
				$this->load->view('users/firstadmin', $data);
				$this->load->view('templates/footer');
			}
			
		}
	}