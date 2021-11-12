<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Novel extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
 
    /* memanggil function dari masing2 model yang akan digunakan */

  }

	public function index()
	{
   
			$this->load->view('fronts/novel/index');
	

	
}

public function detail($id){

			$page1 = 'Y';
			$query = $this->model_utama->view_join_3('cerbung_db','users','kategori_cerbung','status_bab','id_users','id_kategori_cerbung','id_status_bab',array('judul_cerbung_seo' => $this->uri->segment(3)),'id_cerbung','DESC',0,1);
			if ($query->num_rows()<=0){
				redirect('main');
			}else{

				$row = $query->row_array();
				$data['title'] = cetak($row['judul_cerbung']);
				$data['description'] = cetak_meta($row['pratinjau_cerbung'],0,400);
				$data['keywords'] = cetak($row['tag_cerbung']);
				$data['rows'] = $row;
				 $data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
				 $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
				$where = array('id_cerbung' => $row['id_cerbung']);
				 $data['cerbung_bab_front'] = $this->db->query("select * from cerbung_bab_db a join cerbung_db b on a.id_cerbung = b.id_cerbung  where a.id_cerbung and status_cerbung_bab = 'Y' ORDER BY  a.id_cerbung_bab asc 
			")->result();
				 $data['cerbung_bab_front2']            = $this->Cerbung_model->get_by_id_front($id);



				$this->load->view('fronts/novel/index', $data);
			}
		}

		public function detail_isi(){

			$page1 = 'Y';
			$query = $this->model_utama->view_join_two2('cerbung_bab_db','cerbung_db','kategori_cerbung','id_cerbung','id_kategori_cerbung',array('judul_cerbung_bab_seo' => $this->uri->segment(3)),'id_cerbung_bab','DESC',0,1);
			if ($query->num_rows()<=0){
				redirect('main');
			}else{

				$row = $query->row_array();
				$data['title'] = cetak($row['judul_cerbung_bab']);
				$data['rows'] = $row;
				 $data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
				 $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
				$where = array('id_cerbung' => $row['id_cerbung']);
				 $data['cerbung_bab_front'] = $this->db->query("select * from cerbung_bab_db a join cerbung_db b on a.id_cerbung = b.id_cerbung  where a.id_cerbung and status_cerbung_bab = 'Y' ORDER BY  a.id_cerbung_bab asc 
			")->result();
				 
				 $dataa = array('views'=>$row['views']+1);
				$where = array('id_cerbung_bab' => $row['id_cerbung_bab']);
				$this->model_utama->update('cerbung_bab_db', $dataa, $where);

				$this->load->view('fronts/novel/isi_novel/index', $data);
			}
		}

		public function kategori(){
		$query = $this->model_utama->view_where('kategori_cerbung',array('kategori_seo_cerbung' => $this->uri->segment(3)));
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$jumlah= $this->model_utama->view_where('cerbung_db',array('id_kategori_cerbung' => $row['id_kategori_cerbung']))->num_rows();
			$config['full_tag_open']    = "<ul class='pagination'>";
			$config['full_tag_close']   = "</ul>";
			$config['num_tag_open']     = "<li>";
			$config['num_tag_close']    = "</li>";
			$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_link']        = "Selanjutnya";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_link']        = "Sebelumnya";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_link']       = "Awal";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_link']        = 'Terakhir';
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";
			$config['base_url'] = base_url().'novel/kategori/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 7;

			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = " $row[nama_kategori_cerbung] Novel";
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['rows'] = $row;
			$page1 = 'Y';
			if (is_numeric($dari)) {
				$data['get_all_tag_sidebar'] = $this->Tag_model->get_all_tag_sidebar();
				$data['post_slider_footer'] 						= $this->Berita_model->get_all_slider_footer($page1);
				
				$data['novelkategori'] = $this->model_utama->view_join_two('cerbung_db','users','kategori_cerbung','id_users','id_kategori_cerbung',array('cerbung_db.id_kategori_cerbung' => $row['id_kategori_cerbung']),'id_cerbung','DESC',$dari,$config['per_page']);
					// 		artikel populer
	     $data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 7
			")->result();
	     $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/novel/kategori/index', $data);
		}
	}

	public function main()
	{
		$data['title'] = " NOVEL";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Cerbung_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'novel/main/halaman/';
		//menghitung total baris
		$config['total_rows'] = $jumlah;
		//mengatur total data yang tampil per halamannya
		$config['per_page'] = 6	;
		// tag pagination bootstrap
		$config['full_tag_open']    = "<ul class='pagination'>";
		$config['full_tag_close']   = "</ul>";
		$config['num_tag_open']     = "<li>";
		$config['num_tag_close']    = "</li>";
		$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
		$config['next_link']        = "Selanjutnya";
		$config['next_tag_open']    = "<li>";
		$config['next_tagl_close']  = "</li>";
		$config['prev_link']        = "Sebelumnya";
		$config['prev_tag_open']    = "<li>";
		$config['prev_tagl_close']  = "</li>";
		$config['first_link']       = "Awal";
		$config['first_tag_open']   = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_link']        = 'Terakhir';
		$config['last_tag_open']    = "<li>";
		$config['last_tagl_close']  = "</li>";

		// mengambil uri segment ke-4
		$dari = $this->uri->segment('4');
		/* memanggil model untuk ditampilkan pada masing2 modul*/
		 $data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 7
			")->result();
	     $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
		
		$data['post_terbaru_novel'] 						= $this->Cerbung_model->get_all_cerbung($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/novel/all/index', $data);
	}
}
