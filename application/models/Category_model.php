<?php
	class Category_model extends CI_model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
			$this->db->order_by('category_name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function create_category(){
			$data = array(
					'category_name' => $this->input->post('category_name'),
					'description' => $this->input->post('description')
			);

			return $this->db->insert('categories', $data);
		}

		public function get_category($category_id){
			$query = $this->db->get_where('categories', array('category_id' => $category_id));
			return $query->row();
		}

		public function delete_category($category_id){
			$this->db->where('category_id', $category_id);
			$this->db->delete('categories');
			return true;
		}

		public function check_category_exists($category_name){
			$query = $this->db->get_where('categories', array('category_name' => $category_name));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
	}