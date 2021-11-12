<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//nama class harus diawali dengan kapital, walaupun nama file semua kecil
class Sitemap extends CI_Controller {

 public function index(){
     $this->load->helper('url');
     $this->load->model('Berita_model');
     $data['berita'] = $this->Berita_model->generate();
     $this->load->view('v_sitemap',$data);
 }

}
