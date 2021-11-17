<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
    $this->load->model('Berita_model');
	
    /* memanggil function dari masing2 model yang akan digunakan */

  }

	public function index()
	{
   
			$this->load->view('fronts/singel/index');
	

	
}
public function read($id)
	{
    /* menyiapkan data yang akan disertakan/ ditampilkan pada view */
		$this->data['title'] = "Portal Berita CI";

    /* memanggil function buat_captcha */
    

    /* mengambil data berdasarkan id */
		$page1 = 'Y';
		$row = $this->Berita_model->get_by_id($id);

    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
		if ($row)
    {
      /* memanggil function dari masing2 model yang akan digunakan */

    	$this->data['berita']            = $this->Berita_model->get_by_id($id);
			
			$this->add_count($id);

      /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('fronts/singel2_artikel/index', $this->data);

		}
		
	}

public function detail(){

			$page1 = 'Y';
			$query = $this->model_utama->view_join_two('berita','users','kategori','id_users','id_kategori',array('judul_seo' => $this->uri->segment(3)),'id_berita','DESC',0,1);
			if ($query->num_rows()<=0){
				redirect('main');
			}else{

				$row = $query->row_array();
				$data['title'] = cetak($row['judul']);
				$data['description'] = cetak_meta($row['isi_berita'],0,400);
				$data['keywords'] = cetak($row['tag']);
				$data['rows'] = $row;
				 
			

				$dataa = array('views'=>$row['views']+1);
				$id = array('id_berita' => $row['id_berita']);

				$this->load->view('fronts/singel/index', $data);
				$this->add_count($id);
			}
		}
		public function kategori(){
		$query = $this->model_utama->view_where('kategori',array('kategori_seo' => $this->uri->segment(3)));
		if ($query->num_rows()<=0){
			redirect('main');
		}else{
			$row = $query->row_array();
			$jumlah= $this->model_utama->view_where('berita',array('id_kategori' => $row['id_kategori']))->num_rows();
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
			$config['base_url'] = base_url().'artikel/kategori/'.$this->uri->segment(3);
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 7;

			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}
			$data['title'] = " $row[nama_kategori] Artikel";
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['rows'] = $row;
			$page1 = 'Y';
			if (is_numeric($dari)) {
				$data['get_all_tag_sidebar'] = $this->Tag_model->get_all_tag_sidebar();
				$data['post_slider_footer'] 						= $this->Berita_model->get_all_slider_footer($page1);
				
				$data['beritakategori'] = $this->model_utama->view_join_two('berita','users','kategori','id_users','id_kategori',array('berita.status' => 'Y','berita.id_kategori' => $row['id_kategori']),'id_berita','DESC',$dari,$config['per_page']);
					// 		artikel populer
	     $data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 7
			")->result();
	     $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/singel_artikel/kategori/index', $data);
		}
	}

	public function pilihan()
	{
		$data['title'] = " $row[nama_kategori] Artikel";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'artikel/pilihan/halaman/';
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
		$data['pilihan'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where   a.status = 'Y'  and  pilihan = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
		$data['post_terbaru'] 						= $this->Berita_model->get_all_pilihan($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/artikel/pilihan/index', $data);
	}

	public function headline()
	{
		$data['title'] = " HEADLINE";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'artikel/headline/halaman/';
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
		$data['pilihan'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where   a.status = 'Y'  and  pilihan = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
		$data['post_terbaru'] 						= $this->Berita_model->get_all_headline($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/artikel/headline/index', $data);
	}
	  function add_count($id)
    {
        // load cookie helper
        $this->load->helper('cookie');
        // this line will return the cookie which has slug name
        $check_visitor = $this->input->cookie(urldecode($id), FALSE);
        // this line will return the visitor ip address
        $ip = $this->input->ip_address();
        // if the visitor visit this article for first time then //
        // //set new cookie and update article_views column ..
        // //you might be notice we used slug for cookie name and ip
        // //address for value to distinguish between articles views
        if ($check_visitor == false) {
            $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
            $this->input->set_cookie($cookie);
            $this->Berita_model->update_counter(urldecode($id));
        }
    }
}