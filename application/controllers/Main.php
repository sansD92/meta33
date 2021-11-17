<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

		public function index()
		{
	    /* memanggil model untuk ditampilkan pada masing2 modul*/
			$data['berita_terbaru'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc  limit 5
 			")->result();

			$data['berita_headline'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and headline = 'Y' ORDER BY  id_berita desc limit 5
			")->result();
			$data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result();

			$data['berita_terbaru'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' ORDER BY  id_berita desc limit 3
			")->result();
			$data['berita_terbaru2'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'N' and headline = 'N' ORDER BY  id_berita desc limit 3 offset 3
			")->result();
			$data['olaraga'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '20') ORDER BY  id_berita desc limit 3
			")->result();
			$data['muda'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and (a.id_kategori = '23') ORDER BY  id_berita desc limit 3
			")->result();
			$this->load->view('fronts/index',$data);
		}


	}
