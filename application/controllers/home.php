<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
    /* memanggil model untuk ditampilkan pada masing2 modul*/
  $this->load->model('Berita_model');
	$this->load->model('Video_model');
	$this->load->model('Featured_model');
	$this->load->model('Kategori_model');
	$this->load->model('Tag_model');


    /* memanggil model untuk ditampilkan pada masing2 modul*/
$this->data['post_new_data'] 						= $this->Berita_model->get_all_new_home();


    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
		$this->load->view('fronts/vmain', $this->data);
	}

	public function read($id)
	{
		/* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['title'] = "Portal Berita CI";

		/* memanggil function buat_captcha */
		$cap = $this->buat_captcha();
		$this->data['cap_img'] = $cap['image'];
		$this->session->set_userdata('kode_captcha', $cap['word']);

		/* mengambil data berdasarkan id */

		$row = $this->Berita_model->get_by_id($id);

		/* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row)
		{
			/* memanggil function dari masing2 model yang akan digunakan */
			$this->data['berita']            = $this->Berita_model->get_by_id($id);


			/* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('fronts/singel/singel_page', $this->data);
		}
		else
		{
			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
			redirect(base_url());
		}
	}
}
