<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

		public function index()
		{
	    /* memanggil model untuk ditampilkan pada masing2 modul*/
		
			$this->load->view('fronts/index',$data);
		}
		

	}
