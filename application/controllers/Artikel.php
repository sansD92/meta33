<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
    $this->load->model('Berita_model');
	 $this->load->helper('cookie');
    /* memanggil function dari masing2 model yang akan digunakan */

  }

	public function index()
	{
   
    include_once APPPATH . "libraries/vendor/autoload.php";

  $google_client = new Google_Client();

  $google_client->setClientId('621256497357-9g6a2m80l056hdmoalirqb4ktrjqi14u.apps.googleusercontent.com'); //Define your ClientID

  $google_client->setClientSecret('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'); //Define your Client Secret Key

  $google_client->setRedirectUri('http://localhost/meta33/google_login/login'); //Define your Redirect Uri

  $google_client->addScope('email');

  $google_client->addScope('profile');

  if(isset($_GET["code"]))
  {
   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

   if(!isset($token["error"]))
   {
    $google_client->setAccessToken($token['access_token']);

    $this->session->set_userdata('access_token', $token['access_token']);

    $google_service = new Google_Service_Oauth2($google_client);

    $data = $google_service->userinfo->get();

    $current_datetime = date('Y-m-d H:i:s');

    if($this->google_login_model->Is_already_register($data['id']))
    {
     //update data
     $user_data = array(
      'nama_lengkap' => $data['given_name'] . " " . $data['family_name'],
      'username'  => $data['email'],
      'email' => $data['email'],
     
      'updated_at' => $current_datetime
     );

     $this->google_login_model->Update_user_data($user_data, $data['id']);
    }
    else
    {
     //insert data
     $user_data = array(
      'login_oauth_uid' => $data['id'],
      'nama_lengkap' => $data['given_name'] . " " . $data['family_name'],
      'username'  => $data['email'],
	  'password' => md5("12345"),
      'email' => $data['email'],
	  'level'=>'user',
	  'blokir'=>'N',
      'foto' => $data['picture'],
      'created_at'  => $current_datetime
     );

     $this->google_login_model->Insert_user_data($user_data);
    }
    $this->session->set_userdata('user_data', $user_data);
   }
  }
  $login_button = '';
  if(!$this->session->userdata('access_token'))
  {
   $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'asset/sign-in-with-google.png" /></a>';
   $data['login_button'] = $login_button;
   $this->load->view('google_login', $data);
  }
			$this->load->view('fronts/singel/index', $data);
	

	
}

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}


function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
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
				 $data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result();
			

				$dataa = array('views'=>$row['views']+1);
				$where = array('id_berita' => $row['id_berita']);
				$this->model_utama->update('berita', $dataa, $where);
				
				$id = $row['id_berita'];
				$ip = $this->get_client_ip();
				
				if (strpos($ip, '66') === 0) {
                       // It starts with 'http'
                }
                else if (strpos($ip, '72') === 0) {
                       // It starts with 'http'
                }
			    
				$cek = $this->ip_info($ip, "Country");
				    if($cek == "Indonesia") {
    				$sql = "delete from view_berita where id_berita = $id and remote_ip = '$ip'";
    				$this->db->query($sql);
    				$sql= "insert into view_berita select null, $id, '$ip', now(), harga from harga_view limit 1";
    				$this->db->query($sql);
    				
    				$sql = "select count(*) as total from view_berita where id_berita = $id and month(tgl_view) = month(current_date) and year(tgl_view) = year(current_date)";
    				$v = $this->db->query($sql)->row()->total;
    				if(!$v) $v = 0;
    				$sql = "update berita set `views` = $v where id_berita = $id";
                    $this->db->query($sql);
				    }
				$this->load->view('fronts/singel/index', $data);
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
			$config['next_link']        = ">";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_link']        = "<";
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
			$data['title'] = " $row[nama_kategori]";
			$data['description'] = description();
			$data['keywords'] = keywords();
			$data['rows'] = $row;
			$page1 = 'Y';
			if (is_numeric($dari)) {
				
				$data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result();
				$data['beritakategori'] = $this->model_utama->view_join_two('berita','users','kategori','id_users','id_kategori',array('berita.status' => 'Y','berita.id_kategori' => $row['id_kategori']),'id_berita','DESC',$dari,$config['per_page']);
					// 		artikel populer
	    
			}else{
				redirect('main');
			}
			$this->pagination->initialize($config);
			$this->load->view('fronts/kategori/index', $data);
		}
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

    public function cari() {

		//Get Total Records Count
		$this->db->select("*");
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
		$this->db->from("berita");
		if (!empty($_GET['pageFilter'])) {
				$this->db->like('judul', $_GET['pageFilter']);
		}
		$cityRecordsCount = $this->db->get();

		$totalRecords = $cityRecordsCount->num_rows();
		$limit = 9999;

		if (!empty($_GET['pageFilter'])) {
				$config["base_url"] = base_url('artikel/cari?pageFilter=' . $_GET['pageFilter']);
		} else {
				$config["base_url"] = base_url('artikel/cari?pageFilter=');
		}

		$config["total_rows"] = $totalRecords;
		$config["per_page"] = $limit;
		$config['use_page_numbers'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['num_links'] = 2;
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

		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();
		$links = explode('&nbsp;', $str_links);

		$offset = 0;

		if (!empty($_GET['per_page'])) {
				$pageNo = $_GET['per_page'];
				$offset = ($pageNo - 1) * $limit;

		}


		//Get actual result from all records with pagination
		$this->db->select("*,users.id_users as users");
		$this->db->from("berita");
		$this->db->order_by('tanggal', 'DESC');
		$this->db->join('users', 'users.id_users = berita.id_users','inner');
		$this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');

		if (!empty($_GET['pageFilter'])) {
				$this->db->like('judul', $_GET['pageFilter']);

		}
		$this->db->limit($limit, $offset);
		$cityRecords = $this->db->get();
		$page1 = 'Y';
		 

		$this->load->view('fronts/pencarian/index',  $data=array(
				'totalResult' => $totalRecords,
				'results' => $cityRecords->result(),
				'links' => $links,
				'penulis' => $this->db->query("SELECT *, a.id_users as users FROM berita a JOIN users b ON a.id_users = b.id_users WHERE id_berita IN (SELECT max(id_berita) FROM berita WHERE STATUS = 'Y' GROUP BY id_users) ORDER BY id_berita DESC LIMIT 12
			")->result(),
				
				$data['berita_pilihan'] = $this->db->query("select *, a.id_users as users from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y' and pilihan = 'Y' ORDER BY  id_berita desc limit 4
			")->result(),

				

		));

	}

	public function pilihan()
	{
		$data['title'] = " PILIHAN";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'artikel/pilihan/halaman/';
		//menghitung total baris
		$config['total_rows'] = $jumlah;
		//mengatur total data yang tampil per halamannya
		$config['per_page'] = 10	;
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
		
		
			 
		$data['post_terbaru'] 						= $this->Berita_model->get_all_pilihan($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/pilihan/index', $data);
	}
	public function fokus()
	{
		$data['title'] = " FOKUS";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'artikel/fokus/halaman/';
		//menghitung total baris
		$config['total_rows'] = $jumlah;
		//mengatur total data yang tampil per halamannya
		$config['per_page'] = 5	;
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
		
		
			 
		$data['post_terbaru'] 						= $this->Berita_model->get_all_fokus($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/fokus/index', $data);
	}
	public function sorot()
	{
		$data['title'] = " SOROT";
		$this->load->library('pagination');
		$page1 = 'Y';
		/* menghitung jumlah total data */
		$jumlah = $this->Berita_model->total_rows();

		// Mengatur base_url
		$config['base_url'] = base_url().'artikel/sorot/halaman/';
		//menghitung total baris
		$config['total_rows'] = $jumlah;
		//mengatur total data yang tampil per halamannya
		$config['per_page'] = 5	;
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
		
		
			 
		$data['post_terbaru'] 						= $this->Berita_model->get_all_sorot($config['per_page'],$dari);
		$this->pagination->initialize($config);
		$this->load->view('fronts/sorot/index', $data);
	}			
}