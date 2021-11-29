<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

		public function index()
		{

			$data['title'] = " $row[nama_kategori] Artikel";
		
			$data['berita_terbaru'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc  limit 5
 			")->result();

			$data['berita_headline'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and headline = 'Y' ORDER BY  id_berita desc limit 5
			")->result();
			$data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result();
			$data['berita_indepth'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and indepth = 'Y' ORDER BY  id_berita desc limit 1
			")->result();
			$data['berita_wawancara'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and wawancara = 'Y' ORDER BY  id_berita desc limit 1
			")->result();

			$data['berita_terbaru'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' and indepth = 'N' and wawancara = 'N' ORDER BY  id_berita desc limit 3
			")->result();
			$data['berita_terbaru2'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' and indepth = 'N' and wawancara = 'N' ORDER BY  id_berita desc limit 3 offset 6
			")->result();
			$data['berita_terbaru3'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' and indepth = 'N' and wawancara = 'N' ORDER BY  id_berita desc limit 3 offset 9
			")->result();
			// $data['berita_terbaru2'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' ORDER BY  id_berita desc limit 3 offset 3
			// ")->result();
			$data['olaraga'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '20') ORDER BY  id_berita desc limit 3
			")->result();
			$data['muda'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '23') ORDER BY  id_berita desc limit 3 
			")->result();
			$data['gayahidup'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '26') ORDER BY  id_berita desc limit 3 
			")->result();
			$data['showbiz'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '27') ORDER BY  id_berita desc limit 3 
			")->result();
			$data['berita_terbaru22'] 						= $this->Berita_model->get_all_terbaru2($config['per_page'],$dari);
		$this->pagination->initialize($config);
			$this->load->view('fronts/index',$data);

		}

		public function berita()
		{

			$data['title'] = " $row[nama_kategori] Artikel";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'main/berita/';
		//menghitung total baris
		$config['total_rows'] = $jumlah;
		//mengatur total data yang tampil per halamannya
		$config['per_page'] = 6	;
		$config['offset'] = 6	;
		// tag pagination bootstrap
		$config['full_tag_open']    = "<ul class='pagination'>";
		$config['full_tag_close']   = "</ul>";
		$config['num_tag_open']     = "<li>";
		$config['num_tag_close']    = "</li>";
		$config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
		$config['next_link']        = ">";
		$config['next_tag_open']    = "<li>";
		$config['next_tagl_close']  = "</li>";
		$config['prev_link']        = "<";
		$config['prev_tag_open']    = "<li>";
		$config['prev_tagl_close']  = "</li>";
		$config['first_link']       = "Awal";
		$config['first_tag_open']   = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_link']        = 'Akhir';
		$config['last_tag_open']    = "<li>";
		$config['last_tagl_close']  = "</li>";

		// mengambil uri segment ke-4
		$dari = $this->uri->segment('3');

		/* memanggil model untuk ditampilkan pada masing2 modul*/
			
			$data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result();

			
			$data['berita_terbaru22'] 						= $this->Berita_model->get_all_terbaru22($config['per_page'],$dari);
		$this->pagination->initialize($config);
			$this->load->view('fronts/index2',$data);
		}

public function pedomanmediacyber()
		{
	    /* memanggil model untuk ditampilkan pada masing2 modul*/
			 
	   $data['identitas_web'] = $this->db->query("select * from identitas_web  ORDER BY  id_identitas_web asc limit 1
			")->result();

	    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('fronts/about/pedoman_media',$data);
		}
		public function tentangkami()
		{
	    /* memanggil model untuk ditampilkan pada masing2 modul*/
			 
	   $data['identitas_web'] = $this->db->query("select * from identitas_web  ORDER BY  id_identitas_web asc limit 1
			")->result();

	    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
			$this->load->view('fronts/about/tentangkami',$data);
		}
	}
