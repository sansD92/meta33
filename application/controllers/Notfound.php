<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notfound extends CI_Controller {


		public function index()
		{
			$page1 = 'Y';
			$this->data['get_all_tag_sidebar'] = $this->Tag_model->get_all_tag_sidebar();
			$this->data['post_slider_footer'] 						= $this->Berita_model->get_all_slider_footer($page1);
			$this->data['post_terbaru'] 						= $this->Berita_model->get_all_new_home();
			$this->data['post_popular'] 						= $this->Berita_model->get_all_popular();
			$this->data['post_new_random'] 						= $this->Berita_model->get_all_random();
			$this->load->view('fronts/404/v404', $this->data);
		}

	}
