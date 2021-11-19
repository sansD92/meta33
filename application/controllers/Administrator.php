<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Administrator extends CI_Controller {

    function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
    $this->load->model('Cerbung_model');
     $this->load->model('Identitas_web_model');

    /* memanggil function dari masing2 model yang akan digunakan */

  }

	function index(){
		if (isset($_POST['submit'])){
			$id_users = $this->input->post('a');
			$password = hash("sha512", md5($this->input->post('b')));
			$cek = $this->model_app->cek_login($id_users,$password,'users');
		    $row = $cek->row_array();
		    $total = $cek->num_rows();
			if ($total > 0){
				$this->session->set_userdata('upload_image_file_manager',true);
				$this->session->set_userdata(array('id_users'=>$row['id_users'],
								   'level'=>$row['level'],
                                   'id_session'=>$row['id_session']));

				redirect('administrator/home');
			}else{
				$data['title'] = 'Email atau Password salah!';
				$this->load->view('administrator/view_login',$data);
			}
		}else{
			$data['title'] = 'Administrator &rsaquo; Log In';
			$this->load->view('administrator/view_login',$data);
		}
	}

    function reset_password(){
        if (isset($_POST['submit'])){
            $usr = $this->model_app->edit('users', array('id_session' => $this->input->post('id_session')));
            if ($usr->num_rows()>=1){
                if ($this->input->post('a')==$this->input->post('b')){
                    $data = array('password'=>hash("sha512", md5($this->input->post('a'))));
                    $where = array('id_session' => $this->input->post('id_session'));
                    $this->model_app->update('users', $data, $where);

                    $row = $usr->row_array();
                    $this->session->set_userdata('upload_image_file_manager',true);
                    $this->session->set_userdata(array('id_users'=>$row['id_users'],
                                       'level'=>$row['level'],
                                       'id_session'=>$row['id_session']));
                    redirect('administrator/home');
                }else{
                    $data['title'] = 'Password Tidak sama!';
                    $this->load->view('administrator/view_reset',$data);
                }
            }else{
                $data['title'] = 'Terjadi Kesalahan!';
                $this->load->view('administrator/view_reset',$data);
            }
        }else{
            $this->session->set_userdata(array('id_session'=>$this->uri->segment(3)));
            $data['title'] = 'Reset Password';
            $this->load->view('administrator/view_reset',$data);
        }
    }

    function lupapassword(){
        if (isset($_POST['lupa'])){
            $email = strip_tags($this->input->post('email'));
            $cekemail = $this->model_app->edit('users', array('email' => $email))->num_rows();
            if ($cekemail <= 0){
                $data['title'] = 'Alamat email tidak ditemukan';
                $this->load->view('administrator/view_login',$data);
            }else{
                $iden = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
                $usr = $this->model_app->edit('users', array('email' => $email))->row_array();
                $this->load->library('email');

                $tgl = date("d-m-Y H:i:s");
                $subject      = 'Lupa Password ...';
                $message      = "<html><body>
                                    <table style='margin-left:25px'>
                                        <tr><td>Halo $usr[nama_lengkap],<br>
                                        Seseorang baru saja meminta untuk mengatur ulang kata sandi Anda di <span style='color:red'>$iden[url]</span>.<br>
                                        Klik di sini untuk mengganti kata sandi Anda.<br>
                                        Atau Anda dapat copas (Copy Paste) url dibawah ini ke address Bar Browser anda :<br>
                                        <a href='".base_url()."administrator/reset_password/$usr[id_session]'>".base_url()."administrator/reset_password/$usr[id_session]</a><br><br>

                                        Tidak meminta penggantian ini?<br>
                                        Jika Anda tidak meminta kata sandi baru, segera beri tahu kami.<br>
                                        Email. $iden[email], No Telp. $iden[no_telp]</td></tr>
                                    </table>
                                </body></html> \n";

                $this->email->from($iden['email'], $iden['nama_website']);
                $this->email->to($usr['email']);
                $this->email->cc('');
                $this->email->bcc('');

                $this->email->subject($subject);
                $this->email->message($message);
                $this->email->set_mailtype("html");
                $this->email->send();

                $config['protocol'] = 'sendmail';
                $config['mailpath'] = '/usr/sbin/sendmail';
                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';
                $this->email->initialize($config);

                $data['title'] = 'Password terkirim ke '.$usr['email'];
                $this->load->view('administrator/view_login',$data);
            }
        }else{
            redirect('administrator');
        }
    }

	function home(){
        if ($this->session->level=='admin'){
		  $this->template->load('administrator/template','administrator/view_home_admin');
        }else{
          $data['users'] = $this->model_app->view_where('users',array('id_users'=>$this->session->id_users))->row_array();
          $data['modul'] = $this->model_app->view_join_one('users','users_modul','id_session','id_umod','DESC');
          $this->template->load('administrator/template','administrator/view_home_users',$data);
        }
	}

	function identitaswebsite(){
		cek_session_akses('identitaswebsite',$this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/images/';
            $config['allowed_types'] = 'gif|jpg|png|ico';
            $config['max_size'] = '500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('j');
            $hasil=$this->upload->data();

            if ($hasil['file_name']==''){
            	$data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                'email'=>$this->db->escape_str($this->input->post('b')),
                                'url'=>$this->db->escape_str($this->input->post('c')),
                                'facebook'=>$this->input->post('d'),
                                'rekening'=>$this->db->escape_str($this->input->post('e')),
                                'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                'meta_deskripsi'=>$this->input->post('g'),
                                'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                'maps'=>$this->input->post('i'));
            }else{
            	$data = array('nama_website'=>$this->db->escape_str($this->input->post('a')),
                                'email'=>$this->db->escape_str($this->input->post('b')),
                                'url'=>$this->db->escape_str($this->input->post('c')),
                                'facebook'=>$this->input->post('d'),
                                'rekening'=>$this->db->escape_str($this->input->post('e')),
                                'no_telp'=>$this->db->escape_str($this->input->post('f')),
                                'meta_deskripsi'=>$this->input->post('g'),
                                'meta_keyword'=>$this->db->escape_str($this->input->post('h')),
                                'favicon'=>$hasil['file_name'],
                                'maps'=>$this->input->post('i'));
            }
	    	$where = array('id_identitas' => $this->input->post('id'));
			$this->model_app->update('identitas', $data, $where);

			redirect('administrator/identitaswebsite');
		}else{
			$proses = $this->model_app->edit('identitas', array('id_identitas' => 1))->row_array();
			$data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_identitas/view_identitas',$data);
		}
	}

	// Controller Modul Menu Website

    function menuwebsite(){
        cek_session_akses('menuwebsite',$this->session->id_session);
        $data['record'] = $this->db->query("SELECT * FROM menu order by position, urutan");
        $data['halaman'] = $this->model_app->view_ordering('halamanstatis','id_halaman','DESC');
        $data['kategori'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
        $this->template->load('administrator/template','administrator/mod_menu/view_menu',$data);
    }

    function save_menuwebsite(){
        cek_session_akses('menuwebsite',$this->session->id_session);
        $link = $_POST['link'].$_POST['page'].$_POST['kategori'];
        if($_POST['id'] != ''){
            $this->db->query("UPDATE menu SET nama_menu = '".$_POST['label']."', link  = '".$link."' where id_menu = '".$_POST['id']."' ");
            $arr['type']  = 'edit';
            $arr['label'] = $_POST['label'];
            $arr['link']  = $_POST['link'];
            $arr['page']  = $_POST['page'];
            $arr['kategori']  = $_POST['kategori'];
            $arr['id']    = $_POST['id'];
        }else{
            $row = $this->db->query("SELECT max(urutan)+1 as urutan FROM menu")->row_array();
            $this->db->query("INSERT into menu VALUES('','0','".$_POST['label']."', '".$link."','Ya','Bottom','".$row['urutan']."')");
            $id = $this->db->insert_id();
            $arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$id.'" >
                                <div class="dd-handle dd3-handle Bottom"></div>
                                <div class="dd3-content"><span id="label_show'.$id.'">'.$_POST['label'].'</span>
                                    <span class="span-right">/<span id="link_show'.$id.'">'.$link.'</span> &nbsp;&nbsp; 
                                        <a href="'.base_url().'/'.$this->uri->segment(1).'/posisi_menuwebsite/'.$id.'" style="cursor:pointer"><i class="fa fa-chevron-circle-up text-success"></i></a> &nbsp; 
                                        <a class="edit-button" id="'.$id.'" label="'.$_POST['label'].'" link="'.$_POST['link'].'" ><i class="fa fa-pencil"></i></a> &nbsp; 
                                        <a class="del-button" id="'.$id.'"><i class="fa fa-trash"></i></a>
                                    </span> 
                                </div>';
            $arr['type'] = 'add';
        }
        print json_encode($arr);
    }

    function save(){
        $data = json_decode($_POST['data']);
        function parseJsonArray($jsonArray, $parentID = 0) {
          $return = array();
          foreach ($jsonArray as $subArray) {
            $returnSubSubArray = array();
            if (isset($subArray->children)) {
                $returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
            }

            $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
            $return = array_merge($return, $returnSubSubArray);
          }
          return $return;
        }
        $readbleArray = parseJsonArray($data);

        $i=0;
        foreach($readbleArray as $row){
          $i++;
            $this->db->query("UPDATE menu SET id_parent = '".$row['parentID']."', urutan = '".$i."' where id_menu = '".$row['id']."' ");
        }
    }

    function posisi_menuwebsite(){
        cek_session_akses('menuwebsite',$this->session->id_session);
        $cek = $this->model_app->view_where('menu',array('id_menu'=>$this->uri->segment(3)))->row_array();
        $posisi = ($cek['position'] == 'Top' ? 'Bottom' : 'Top');
        $data = array('position'=>$posisi);
        $where = array('id_menu' => $this->uri->segment(3));
        $this->model_app->update('menu', $data, $where);
        redirect($this->uri->segment(1).'/menuwebsite1');
    }

    function delete_menuwebsite(){
        cek_session_akses('menuwebsite',$this->session->id_session);
        $idm = array('id_menu' => $this->input->post('id'));
        $this->model_app->delete('menu',$idm);
        $idm = array('id_parent' => $this->input->post('id'));
        $this->model_app->delete('menu',$idm);
    }


	// Controller Modul Halaman Baru

	function halamanbaru(){
		cek_session_akses('halamanbaru',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('halamanstatis','id_halaman','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('halamanstatis',array('id_users'=>$this->session->id_users),'id_halaman','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_halaman/view_halaman',$data);
	}

	function tambah_halamanbaru(){
		cek_session_akses('halamanbaru',$this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_statis/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'id_users'=>$this->session->id_users,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>hari_ini(date('w')));
            }else{
            		$data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'gambar'=>$hasil['file_name'],
                                    'id_users'=>$this->session->id_users,
                                    'dibaca'=>'0',
                                    'jam'=>date('H:i:s'),
                                    'hari'=>hari_ini(date('w')));
            }
            $this->model_app->insert('halamanstatis',$data);
			redirect('administrator/halamanbaru');
		}else{
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_tambah');
		}
	}

	function edit_halamanbaru(){
		cek_session_akses('halamanbaru',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_statis/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'));
            }else{
            		$data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'judul_seo'=>seo_title($this->input->post('a')),
                                    'isi_halaman'=>$this->input->post('b'),
                                    'gambar'=>$hasil['file_name']);
            }
            $where = array('id_halaman' => $this->input->post('id'));
			$this->model_app->update('halamanstatis', $data, $where);
			redirect('administrator/halamanbaru');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('halamanstatis', array('id_halaman' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('halamanstatis', array('id_halaman' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_halaman/view_halaman_edit',$data);
		}
	}

	function delete_halamanbaru(){
        cek_session_akses('halamanbaru',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_halaman' => $this->uri->segment(3));
        }else{
            $id = array('id_halaman' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
		$this->model_app->delete('halamanstatis',$id);
		redirect('administrator/halamanbaru');
	}

	// Controller Modul List News

	function listnews(){
		cek_session_akses('listberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_dua('berita','users','kategori','id_users','id_kategori','id_berita','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('berita',array('id_users'=>$this->session->id_users),'id_berita','DESC');
        }
        $data['rss'] = $this->model_utama->view_joinn('berita','users','kategori','id_users','id_kategori','id_berita','DESC',0,10);
        $data['iden'] = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
        $this->load->view('administrator/rss',$data);
		$this->template->load('administrator/template','administrator/mod_berita/view_berita',$data);
	}
	function detailsnews($id){


        $row = $this->Berita_model->get_by_id2($id);
    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
    if ($row)
    {
    /* memanggil function dari masing2 model yang akan digunakan */
    $news = $this->Berita_model->get_by_id2($id);
    $data['news']            = $news;

    $this->template->load('administrator/template','administrator/mod_berita/view_berita_detail',$data);

}
}

	function tambah_listnews(){
		cek_session_akses('listberita',$this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_berita/';
	        $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
	        $config['max_size'] = '3000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'asset/foto_berita/'.$hasil['file_name'];

            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->session->level == 'kontributor'){ $status2 = 'Y'; }else{ $status2 = 'Y'; }

            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
						$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'id_users'=>$this->session->id_users,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($hasil['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'id_users'=>$this->session->id_users,
                                    'judul'=>$this->input->post('b'),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->input->post('ket'),
                                    'pilihan'=>$this->db->escape_str($this->input->post('pl')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
																		'tag_seo'=>$tags,
                                     'status_lang_news'=>$status2,
                                    'status'=>$status);
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'id_users'=>$this->session->id_users,
                                    'judul'=>$this->input->post('b'),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->input->post('ket'),
                                    'pilihan'=>$this->db->escape_str($this->input->post('pl')),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
																		'tag_seo'=>$tags,
                                    'status_lang_news'=>$status2,
                                    'status'=>$status);
            }
            $this->model_app->insert('berita',$data);
			redirect('administrator/listnews');
		}else{
						  $data['get_combo_kategori'] = $this->Kategori_model->get_combo_kategori();
            $data['tag'] = $this->model_app->view_ordering('tag','id_tag','DESC');
            $data['record'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_tambah',$data);
		}
	}

	function edit_listnews(){
		cek_session_akses('listberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_berita/';
	        $config['allowed_types'] = 'gif|jpg|jpeg|png|PNG|JPG|JPEG';
	        $config['max_size'] = '3000'; // kb
	        $this->load->library('upload', $config);
	        $this->upload->do_upload('k');
	        $hasil=$this->upload->data();

            $config['source_image'] = 'asset/foto_berita/'.$hasil['file_name'];

            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }

            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
			$tag = $this->input->post('j');

			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from tag where tag_seo = '" . seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('nama_tag'=>$this->db->escape_str($t),
							'id_users'=>$this->session->id_users,
							'tag_seo'=>seo_title($t),
							'count'=>'0');
					$this->model_app->insert('tag',$data);
				}
				$tags2[] = seo_title($t);
			}
			$tags = implode(",", $tags2);
            if ($this->session->level == 'kontributor'){ $status2 = 'Y'; }else{ $status2 = 'Y'; }

            if ($hasil['file_name']==''){
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'judul'=>$this->input->post('b'),
																		'judul_seo'=>seo_title($this->input->post('b')),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->input->post('ket'),
                                    'pilihan'=>$this->db->escape_str($this->input->post('pl')),
                                    'tag'=>$tag,
																		'tag_seo'=>$tags);
            }else{
                    $data = array('id_kategori'=>$this->db->escape_str($this->input->post('a')),
                                    'judul'=>$this->input->post('b'),
                                    'youtube'=>$this->db->escape_str($this->input->post('d')),
                                    'judul_seo'=>seo_title($this->input->post('b')),
                                    'headline'=>$this->db->escape_str($this->input->post('e')),
                                    'isi_berita'=>$this->input->post('h'),
                                    'keterangan_gambar'=>$this->input->post('ket'),
                                    'pilihan'=>$this->db->escape_str($this->input->post('pl')),
                                    'gambar'=>$hasil['file_name'],
                                    'dibaca'=>'0',
                                    'tag'=>$tag,
																		'tag_seo'=>$tags);
            }
            $where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('berita', $data, $where);
			redirect('administrator/listnews');
		}else{
			$tag = $this->model_app->view_ordering('tag','id_tag','DESC');
            $record = $this->model_app->view_ordering('kategori','id_kategori','DESC');
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('berita', array('id_berita' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('berita', array('id_berita' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
			$data = array('rows' => $proses,'tag' => $tag,'record' => $record);
			$this->template->load('administrator/template','administrator/mod_berita/view_berita_edit',$data);
		}
	}

	function publish_listnews(){
        cek_session_akses('publish',$this->session->id_session);
		if ($this->uri->segment(4)=='Y'){
			$data = array('status'=>'N');
		}else{
			$data = array('status'=>'Y');
		}
        $where = array('id_berita' => $this->uri->segment(3));
		$this->model_app->update('berita', $data, $where);
		redirect($_SERVER['HTTP_REFERER']);
	}
    function publish_langganan(){
        cek_session_akses('publish',$this->session->id_session);
        if ($this->uri->segment(4)=='Y'){
            $data = array('status_lang_news'=>'N');
        }else{
            $data = array('status_lang_news'=>'Y');
        }
        $where = array('id_berita' => $this->uri->segment(3));
        $this->model_app->update('berita', $data, $where);
        redirect($_SERVER['HTTP_REFERER']);
    }

	function delete_listnews(){
        cek_session_akses('listberita',$this->session->id_session);
        if ($this->session->level=='admin'){
    		$id = array('id_berita' => $this->uri->segment(3));
        }else{
            $id = array('id_berita' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
		$this->model_app->delete('berita',$id);
		redirect('administrator/listnews');
	}


	// Controller Modul Kategori Berita

	function kategoriberita(){
		cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('kategori','id_kategori','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('kategori',array('id_users'=>$this->session->id_users),'id_kategori','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_kategori/view_kategori',$data);
	}

	function tambah_kategoriberita(){
		cek_session_akses('kategoriberita',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')),
												'icon'=>$this->db->escape_str($this->input->post('d')));
			$this->model_app->insert('kategori',$data);
			redirect('administrator/kategoriberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_tambah');
		}
	}

	function edit_kategoriberita(){
		cek_session_akses('kategoriberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_kategori'=>$this->db->escape_str($this->input->post('a')),
                        'kategori_seo'=>seo_title($this->input->post('a')),
                        'aktif'=>$this->db->escape_str($this->input->post('b')),
                        'sidebar'=>$this->db->escape_str($this->input->post('c')),
												'icon'=>$this->db->escape_str($this->input->post('d')));
			$where = array('id_kategori' => $this->input->post('id'));
			$this->model_app->update('kategori', $data, $where);
			redirect('administrator/kategoriberita');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('kategori', array('id_kategori' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('kategori', array('id_kategori' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_kategori/view_kategori_edit',$data);
		}
	}

	function delete_kategoriberita(){
		cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_kategori' => $this->uri->segment(3));
        }else{
            $id = array('id_kategori' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
		$this->model_app->delete('kategori',$id);
		redirect('administrator/kategoriberita');
	}


	// Controller Modul Tag Berita

	function tagberita(){
		cek_session_akses('tagberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('tag','id_tag','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('tag',array('id_users'=>$this->session->id_users),'id_tag','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_tag/view_tag',$data);
	}

	function tambah_tagberita(){
		cek_session_akses('tagberita',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
			$this->model_app->insert('tag',$data);
			redirect('administrator/tagberita');
		}else{
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_tambah');
		}
	}

	function edit_tagberita(){
		cek_session_akses('tagberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo'=>seo_title($this->input->post('a')));
			$where = array('id_tag' => $this->input->post('id'));
			$this->model_app->update('tag', $data, $where);
			redirect('administrator/tagberita');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('tag', array('id_tag' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('tag', array('id_tag' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_tag/view_tag_edit',$data);
		}
	}

	function delete_tagberita(){
        cek_session_akses('tagberita',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        }else{
            $id = array('id_tag' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
		$this->model_app->delete('tag',$id);
		redirect('administrator/tagberita');
	}


	// Controller Modul Komentar Berita

	function komentarberita(){
		cek_session_akses('komentarberita',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('komentar','id_komentar','DESC');
		$this->template->load('administrator/template','administrator/mod_komentar/view_komentar',$data);
	}

	function edit_komentarberita(){
		cek_session_akses('komentarberita',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama_komentar'=>$this->input->post('a'),
                        'url'=>$this->input->post('b'),
                        'isi_komentar'=>$this->input->post('c'),
                        'aktif'=>$this->input->post('d'),
                        'email'=>$this->input->post('e'));
			$where = array('id_komentar' => $this->input->post('id'));
			$this->model_app->update('komentar', $data, $where);
			redirect('administrator/komentarberita');
		}else{
			$proses = $this->model_app->edit('komentar', array('id_komentar' => $id))->row_array();
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_komentar/view_komentar_edit',$data);
		}
	}

	function delete_komentarberita(){
        cek_session_akses('komentarberita',$this->session->id_session);
		$id = array('id_komentar' => $this->uri->segment(3));
		$this->model_app->delete('komentar',$id);
		redirect('administrator/komentarberita');
	}


	// Controller Modul Sensor Komentar Berita

	function sensorkomentar(){
		cek_session_akses('sensorkomentar',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('katajelek','id_jelek','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('katajelek',array('id_users'=>$this->session->id_users),'id_jelek','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_sensorkomentar/view_sensorkomentar',$data);
	}

	function tambah_sensorkomentar(){
		cek_session_akses('sensorkomentar',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('kata'=>$this->input->post('a'),
                        'id_users'=>$this->session->id_users,
                        'ganti'=>$this->input->post('b'));
			$this->model_app->insert('katajelek',$data);
			redirect('administrator/sensorkomentar');
		}else{
			$this->template->load('administrator/template','administrator/mod_sensorkomentar/view_sensorkomentar_tambah');
		}
	}

	function edit_sensorkomentar(){
		cek_session_akses('sensorkomentar',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$this->model_berita->tag_berita_update();
			$data = array('kata'=>$this->input->post('a'),
                        'id_users'=>$this->session->id_users,
                        'ganti'=>$this->input->post('b'));
			$where = array('id_jelek' => $this->input->post('id'));
			$this->model_app->update('katajelek', $data, $where);
			redirect('administrator/sensorkomentar');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('katajelek', array('id_jelek' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('katajelek', array('id_jelek' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
			$data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_sensorkomentar/view_sensorkomentar_edit',$data);
		}
	}

	function delete_sensorkomentar(){
        cek_session_akses('sensorkomentar',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_jelek' => $this->uri->segment(3));
        }else{
            $id = array('id_jelek' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
		$this->model_app->delete('katajelek',$id);
		redirect('administrator/sensorkomentar');
	}


    // Controller Modul Album

    function album(){
        cek_session_akses('album',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('album','id_album','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('album',array('id_users'=>$this->session->id_users),'id_album','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_album/view_album',$data);
    }

    function tambah_album(){
        cek_session_akses('album',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_album/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'aktif'=>'Y',
                            'hits_album'=>'0',
                            'tgl_posting'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'hari'=>hari_ini(date('w')),
                            'id_users'=>$this->session->id_users);
            }else{
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'gbr_album'=>$hasil['file_name'],
                            'aktif'=>'Y',
                            'hits_album'=>'0',
                            'tgl_posting'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'hari'=>hari_ini(date('w')),
                            'id_users'=>$this->session->id_users);
            }

            $this->model_app->insert('album',$data);
            redirect('administrator/album');
        }else{
            $this->template->load('administrator/template','administrator/mod_album/view_album_tambah');
        }
    }

    function edit_album(){
        cek_session_akses('album',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_album/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'aktif'=>$this->input->post('d'));
            }else{
                $data = array('jdl_album'=>$this->input->post('a'),
                            'album_seo'=>seo_title($this->input->post('a')),
                            'keterangan'=>$this->input->post('b'),
                            'gbr_album'=>$hasil['file_name'],
                            'aktif'=>$this->input->post('d'));
            }
            $where = array('id_album' => $this->input->post('id'));
            $this->model_app->update('album', $data, $where);
            redirect('administrator/album');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('album', array('id_album' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('album', array('id_album' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_album/view_album_edit',$data);
        }
    }

    function delete_album(){
        cek_session_akses('album',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_album' => $this->uri->segment(3));
        }else{
            $id = array('id_album' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('album',$id);
        redirect('administrator/album');
    }


    // Controller Modul Gallery

    function gallery(){
        cek_session_akses('gallery',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_one('gallery','album','id_album','id_gallery','DESC');
        }else{
            $data['record'] = $this->model_app->view_join_where('gallery','album','id_album',array('gallery.id_users'=>$this->session->id_users),'id_gallery','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_gallery/view_gallery',$data);
    }

    function tambah_gallery(){
        cek_session_akses('gallery',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('id_album'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'));
            }else{
                $data = array('id_album'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $this->model_app->insert('gallery',$data);
            redirect('administrator/gallery');
        }else{
            $data['record'] = $this->model_app->view_ordering('album','id_album','DESC');
            $this->template->load('administrator/template','administrator/mod_gallery/view_gallery_tambah',$data);
        }
    }

    function edit_gallery(){
        cek_session_akses('gallery',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_galeri/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('id_album'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'));
            }else{
                $data = array('id_album'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'jdl_gallery'=>$this->input->post('b'),
                            'gallery_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_gallery'=>$hasil['file_name']);
            }
            $where = array('id_gallery' => $this->input->post('id'));
            $this->model_app->update('gallery', $data, $where);
            redirect('administrator/gallery');
        }else{
            $record = $this->model_app->view_ordering('album','id_album','DESC');
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('gallery', array('id_gallery' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses,'record' => $record);
            $this->template->load('administrator/template','administrator/mod_gallery/view_gallery_edit',$data);
        }
    }

    function delete_gallery(){
        cek_session_akses('gallery',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_gallery' => $this->uri->segment(3));
        }else{
            $id = array('id_gallery' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('gallery',$id);
        redirect('administrator/gallery');
    }


    // Controller Modul Video

    function video(){
        cek_session_akses('video',$this->session->id_session);
        if ($this->session->level=='admin'){
              $data['record'] = $this->model_app->view_ordering('video','id_video','DESC');
        }else{
            $data['record'] = $this->model_app->view_join_where('video','playlist','id_playlist',array('video.id_users'=>$this->session->id_users),'id_video','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_video/view_video',$data);
    }

    function tambah_video(){
        cek_session_akses('video',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_video/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($this->input->post('f')!=''){
                $tag_seo = $this->input->post('f');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }

            if ($hasil['file_name']==''){
                $data = array(
                            'id_users'=>$this->session->id_users,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tagvid'=>$tag);
            }else{
                $data = array(
                            'id_users'=>$this->session->id_users,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_video'=>$hasil['file_name'],
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'dilihat'=>'0',
                            'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
                            'tagvid'=>$tag);
            }
            $this->model_app->insert('video',$data);
            redirect('administrator/video');
        }else{
            $data['tag'] = $this->model_app->view_ordering('tagvid','id_tag','DESC');
            $this->template->load('administrator/template','administrator/mod_video/view_video_tambah',$data);
        }
    }

    function edit_video(){
        cek_session_akses('video',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_video/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('d');
            $hasil=$this->upload->data();

            if ($this->input->post('f')!=''){
                $tag_seo = $this->input->post('f');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }

            if ($hasil['file_name']==''){
                $data = array(
                            'id_users'=>$this->session->id_users,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'tagvid'=>$tag);
            }else{
                $data = array(
                            'id_users'=>$this->session->id_users,
                            'jdl_video'=>$this->input->post('b'),
                            'video_seo'=>seo_title($this->input->post('b')),
                            'keterangan'=>$this->input->post('c'),
                            'gbr_video'=>$hasil['file_name'],
                            'video'=>'',
                            'youtube'=>$this->input->post('e'),
                            'tagvid'=>$tag);
            }

            $where = array('id_video' => $this->input->post('id'));
            $this->model_app->update('video', $data, $where);
            redirect('administrator/video');
        }else{
            $record = $this->model_app->view_ordering('playlist','id_playlist','DESC');
            $tag = $this->model_app->view_ordering('tagvid','id_tag','DESC');
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('video', array('id_video' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('video', array('id_video' => $id, 'id_users' => $this->session->id_users))->row_array();
            }

            $data = array('rows' => $proses,'record' => $record, 'tag' => $tag);
            $this->template->load('administrator/template','administrator/mod_video/view_video_edit',$data);
        }
    }

    function delete_video(){
        cek_session_akses('video',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_video' => $this->uri->segment(3));
        }else{
            $id = array('id_video' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('video',$id);
        redirect('administrator/video');
    }


    // Controller Modul Playlist

    function playlist(){
        cek_session_akses('playlist',$this->session->id_session);
        $data['record'] = $this->model_app->view_ordering('playlist','id_playlist','DESC');
        $this->template->load('administrator/template','administrator/mod_playlist/view_playlist',$data);
    }

    function tambah_playlist(){
        cek_session_akses('playlist',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_playlist/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'aktif'=>'Y');
            }else{
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'gbr_playlist'=>$hasil['file_name'],
                            'aktif'=>'Y');
            }
            $this->model_app->insert('playlist',$data);
            redirect('administrator/playlist');
        }else{
            $this->template->load('administrator/template','administrator/mod_playlist/view_playlist_tambah');
        }
    }

    function edit_playlist(){
        cek_session_akses('playlist',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/img_playlist/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'aktif'=>$this->input->post('c'));
            }else{
                $data = array('jdl_playlist'=>$this->input->post('a'),
                            'id_users'=>$this->session->id_users,
                            'playlist_seo'=>seo_title($this->input->post('a')),
                            'gbr_playlist'=>$hasil['file_name'],
                            'aktif'=>$this->input->post('c'));
            }
            $where = array('id_playlist' => $this->input->post('id'));
            $this->model_app->update('playlist', $data, $where);
            redirect('administrator/playlist');
        }else{
            $proses = $this->model_app->edit('playlist', array('id_playlist' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_playlist/view_playlist_edit',$data);
        }
    }

    function delete_playlist(){
        cek_session_akses('playlist',$this->session->id_session);
        $id = array('id_playlist' => $this->uri->segment(3));
        $this->model_app->delete('playlist',$id);
        redirect('administrator/playlist');
    }


    // Controller Modul Tag Video

    function tagvideo(){
        cek_session_akses('tagvideo',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('tagvid','id_tag','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('tagvid',array('id_users'=>$this->session->id_users),'id_tag','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag',$data);
    }

    function tambah_tagvideo(){
        cek_session_akses('tagvideo',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo'=>seo_title($this->input->post('a')),
                        'count'=>'0');
            $this->model_app->insert('tagvid',$data);
            redirect('administrator/tagvideo');
        }else{
            $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag_tambah');
        }
    }

    function edit_tagvideo(){
        cek_session_akses('tagvideo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo'=>seo_title($this->input->post('a')));
            $where = array('id_tag' => $this->input->post('id'));
            $this->model_app->update('tagvid', $data, $where);
            redirect('administrator/tagvideo');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('tagvid', array('id_tag' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('tagvid', array('id_tag' => $id, 'id_users' => $this->session->id_users))->row_array();
            }

            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_tagvideo/view_tag_edit',$data);
        }
    }

    function delete_tagvideo(){
        cek_session_akses('tagvideo',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_tag' => $this->uri->segment(3));
        }else{
            $id = array('id_tag' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('tagvid',$id);
        redirect('administrator/tagvideo');
    }


    // Controller Modul Komentar Video

    function komentarvideo(){
        cek_session_akses('komentarvideo',$this->session->id_session);
        $data['record'] = $this->model_app->view_join_one('komentarvid','video','id_video','id_komentar','DESC');
        $this->template->load('administrator/template','administrator/mod_komentarvideo/view_komentar',$data);
    }

    function edit_komentarvideo(){
        cek_session_akses('komentarvideo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_komentar'=>$this->input->post('a'),
                        'url'=>$this->input->post('b'),
                        'isi_komentar'=>$this->input->post('c'),
                        'aktif'=>$this->input->post('d'));
            $where = array('id_komentar' => $this->input->post('id'));
            $this->model_app->update('komentarvid', $data, $where);
            redirect('administrator/komentarvideo');
        }else{
            $proses = $this->model_app->edit('komentarvid', array('id_komentar' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_komentarvideo/view_komentar_edit',$data);
        }
    }

    function delete_komentarvideo(){
        cek_session_akses('komentarvideo',$this->session->id_session);
        $id = array('id_komentar' => $this->uri->segment(3));
        $this->model_app->delete('komentarvid',$id);
        redirect('administrator/komentarvideo');
    }

    // Controller Modul Iklan Atas

    function iklanatas(){
        cek_session_akses('iklanatas',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('iklanatas','id_iklanatas','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('iklanatas',array('id_users'=>$this->session->id_users),'id_iklanatas','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_iklanatas/view_iklanatas',$data);
    }

    function tambah_iklanatas(){
        cek_session_akses('iklanatas',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_iklanatas/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $this->model_app->insert('iklanatas',$data);
            redirect('administrator/iklanatas');
        }else{
            $this->template->load('administrator/template','administrator/mod_iklanatas/view_iklanatas_tambah');
        }
    }

    function edit_iklanatas(){
        cek_session_akses('iklanatas',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_iklanatas/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $where = array('id_iklanatas' => $this->input->post('id'));
            $this->model_app->update('iklanatas', $data, $where);
            redirect('administrator/iklanatas');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('iklanatas', array('id_iklanatas' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('iklanatas', array('id_iklanatas' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_iklanatas/view_iklanatas_edit',$data);
        }
    }

    function delete_iklanatas(){
        cek_session_akses('iklanatas',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_iklanatas' => $this->uri->segment(3));
        }else{
            $id = array('id_iklanatas' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('iklanatas',$id);
        redirect('administrator/iklanatas');
    }


	// Controller Modul Iklan Home

	function iklanhome(){
		cek_session_akses('iklanhome',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('iklantengah','id_iklantengah','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('iklantengah',array('id_users'=>$this->session->id_users),'id_iklantengah','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome',$data);
	}

	function tambah_iklanhome(){
		cek_session_akses('iklanhome',$this->session->id_session);
		if (isset($_POST['submit'])){
    		$config['upload_path'] = 'asset/foto_iklantengah/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $this->model_app->insert('iklantengah',$data);
			redirect('administrator/iklanhome');
		}else{
			$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome_tambah');
		}
	}

	function edit_iklanhome(){
		cek_session_akses('iklanhome',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_iklantengah/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $where = array('id_iklantengah' => $this->input->post('id'));
            $this->model_app->update('iklantengah', $data, $where);
			redirect('administrator/iklanhome');
		}else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('iklantengah', array('id_iklantengah' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('iklantengah', array('id_iklantengah' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_iklanhome/view_iklanhome_edit',$data);
		}
	}

	function delete_iklanhome(){
        cek_session_akses('iklanhome',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_iklantengah' => $this->uri->segment(3));
        }else{
            $id = array('id_iklantengah' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('iklantengah',$id);
		redirect('administrator/iklanhome');
	}


    // Controller Modul Iklan Sidebar

    function iklansidebar(){
        cek_session_akses('iklansidebar',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('pasangiklan','id_pasangiklan','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('pasangiklan',array('id_users'=>$this->session->id_users),'id_pasangiklan','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar',$data);
    }

    function tambah_iklansidebar(){
        cek_session_akses('iklansidebar',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_pasangiklan/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $this->model_app->insert('pasangiklan',$data);
            redirect('administrator/iklansidebar');
        }else{
            $this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar_tambah');
        }
    }

    function edit_iklansidebar(){
        cek_session_akses('iklansidebar',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_pasangiklan/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG|swf';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'tgl_posting'=>date('Y-m-d'));
            }else{
                $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'url'=>$this->input->post('b'),
                                'gambar'=>$hasil['file_name'],
                                'tgl_posting'=>date('Y-m-d'));
            }
            $where = array('id_pasangiklan' => $this->input->post('id'));
            $this->model_app->update('pasangiklan', $data, $where);
            redirect('administrator/iklansidebar');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('pasangiklan', array('id_pasangiklan' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('pasangiklan', array('id_pasangiklan' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_iklansidebar/view_iklansidebar_edit',$data);
        }
    }

    function delete_iklansidebar(){
        cek_session_akses('iklansidebar',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_pasangiklan' => $this->uri->segment(3));
        }else{
            $id = array('id_pasangiklan' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('pasangiklan',$id);
        redirect('administrator/iklansidebar');
    }


    // Controller Modul banner Link

    function banner(){
        cek_session_akses('banner',$this->session->id_session);
        $data['record'] = $this->model_app->view_ordering('banner','id_banner','DESC');
        $this->template->load('administrator/template','administrator/mod_banner/view_banner',$data);
    }

    function tambah_banner(){
        cek_session_akses('banner',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                            'url'=>$this->input->post('b'),
                            'tgl_posting'=>date('Y-m-d'));
            $this->model_app->insert('banner',$data);
            redirect('administrator/banner');
        }else{
            $this->template->load('administrator/template','administrator/mod_banner/view_banner_tambah');
        }
    }

    function edit_banner(){
        cek_session_akses('banner',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                            'url'=>$this->input->post('b'),
                            'tgl_posting'=>date('Y-m-d'));

            $where = array('id_banner' => $this->input->post('id'));
            $this->model_app->update('banner', $data, $where);
            redirect('administrator/banner');
        }else{
            $proses = $this->model_app->edit('banner', array('id_banner' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_banner/view_banner_edit',$data);
        }
    }

    function delete_banner(){
        cek_session_akses('banner',$this->session->id_session);
        $id = array('id_banner' => $this->uri->segment(3));
        $this->model_app->delete('banner',$id);
        redirect('administrator/banner');
    }


    // Controller Modul Logo

    function logowebsite(){
        cek_session_akses('logowebsite',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/logo/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['max_size'] = '2000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('logo');
            $hasil=$this->upload->data();
            $datadb = array('gambar'=>$hasil['file_name']);
            $where = array('id_logo' => $this->input->post('id'));
            $this->model_app->update('logo', $datadb, $where);
            redirect('administrator/logowebsite');
        }else{
            $data['record'] = $this->model_app->view('logo');
            $this->template->load('administrator/template','administrator/mod_logowebsite/view_logowebsite',$data);
        }
    }


    // Controller Modul Template Website

    function templatewebsite(){
        cek_session_akses('templatewebsite',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('templates','id_templates','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('templates',array('id_users'=>$this->session->id_users),'id_templates','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_template/view_template',$data);
    }

    function tambah_templatewebsite(){
        cek_session_akses('templatewebsite',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'pembuat'=>$this->input->post('b'),
                                'folder'=>$this->input->post('c'));
            $this->model_app->insert('templates',$data);
            redirect('administrator/templatewebsite');
        }else{
            $this->template->load('administrator/template','administrator/mod_template/view_template_tambah');
        }
    }

    function edit_templatewebsite(){
        cek_session_akses('templatewebsite',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                'id_users'=>$this->session->id_users,
                                'pembuat'=>$this->input->post('b'),
                                'folder'=>$this->input->post('c'));
            $where = array('id_templates' => $this->input->post('id'));
            $this->model_app->update('templates', $data, $where);
            redirect('administrator/templatewebsite');
        }else{
            if ($this->session->level=='admin'){
                $proses = $this->model_app->edit('templates', array('id_templates' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('templates', array('id_templates' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_template/view_template_edit',$data);
        }
    }

    function aktif_templatewebsite(){
        cek_session_akses('templatewebsite',$this->session->id_session);
        $id = $this->uri->segment(3);
        if ($this->uri->segment(4)=='Y'){ $aktif = 'N'; }else{ $aktif = 'Y'; }

        $data = array('aktif'=>$aktif);
        $where = array('id_templates' => $id);
        $this->model_app->update('templates', $data, $where);

        $dataa = array('aktif'=>'N');
        $wheree = array('id_templates !=' => $id);
        $this->model_app->update('templates', $dataa, $wheree);

        redirect('administrator/templatewebsite');
    }

    function delete_templatewebsite(){
        cek_session_akses('templatewebsite',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_templates' => $this->uri->segment(3));
        }else{
            $id = array('id_templates' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('templates',$id);
        redirect('administrator/templatewebsite');
    }


    // Controller Modul Download

    function background(){
        cek_session_akses('background',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('gambar'=>$this->input->post('a'));
            $where = array('id_background' => 1);
            $this->model_app->update('background', $data, $where);
            redirect('administrator/background');
        }else{
            $proses = $this->model_app->edit('background', array('id_background' => 1))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_background/view_background',$data);
        }
    }


	// Controller Modul Download

	function download(){
		cek_session_akses('download',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('download','id_download','DESC');
		$this->template->load('administrator/template','administrator/mod_download/view_download',$data);
	}

	function tambah_download(){
		cek_session_akses('download',$this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/files/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['max_size'] = '25000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }else{
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name'],
                                    'tgl_posting'=>date('Y-m-d'),
                                    'hits'=>'0');
            }
            $this->model_app->insert('download',$data);
			redirect('administrator/download');
		}else{
			$this->template->load('administrator/template','administrator/mod_download/view_download_tambah');
		}
	}

	function edit_download(){
		cek_session_akses('download',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/files/';
            $config['allowed_types'] = 'gif|jpg|png|zip|rar|pdf|doc|docx|ppt|pptx|xls|xlsx|txt';
            $config['max_size'] = '25000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')));
            }else{
                    $data = array('judul'=>$this->db->escape_str($this->input->post('a')),
                                    'nama_file'=>$hasil['file_name']);
            }
            $where = array('id_download' => $this->input->post('id'));
            $this->model_app->update('download', $data, $where);
			redirect('administrator/download');
		}else{
			$proses = $this->model_app->edit('download', array('id_download' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_download/view_download_edit',$data);
		}
	}

	function delete_download(){
        cek_session_akses('download',$this->session->id_session);
		$id = array('id_download' => $this->uri->segment(3));
        $this->model_app->delete('download',$id);
		redirect('administrator/download');
	}


	// Controller Modul Agenda

	function agenda(){
		cek_session_akses('agenda',$this->session->id_session);
        if ($this->session->level=='admin'){
    		$data['record'] = $this->model_app->view_ordering('agenda','id_agenda','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('agenda',array('id_users'=>$this->session->id_users),'id_agenda','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_agenda/view_agenda',$data);
	}

	function tambah_agenda(){
		cek_session_akses('agenda',$this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_agenda/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            $ex = explode(' - ',$this->input->post('f'));
            $exx = explode('/',$ex[0]);
            $exy = explode('/',$ex[1]);
            $mulai = $exx[2].'-'.$exx[0].'-'.$exx[1];
            $selesai = $exy[2].'-'.$exy[0].'-'.$exy[1];
            if ($hasil['file_name']==''){
                    $data = array('tema'=>$this->db->escape_str($this->input->post('a')),
                                    'tema_seo'=>seo_title($this->input->post('a')),
                                    'isi_agenda'=>$this->input->post('b'),
                                    'tempat'=>$this->db->escape_str($this->input->post('d')),
                                    'pengirim'=>$this->db->escape_str($this->input->post('g')),
                                    'tgl_mulai'=>$mulai,
                                    'tgl_selesai'=>$selesai,
                                    'tgl_posting'=>date('Y-m-d'),
                                    'jam'=>$this->db->escape_str($this->input->post('e')),
                                    'dibaca'=>'0',
                                    'id_users'=>$this->session->id_users);
            }else{
                    $data = array('tema'=>$this->db->escape_str($this->input->post('a')),
                                    'tema_seo'=>seo_title($this->input->post('a')),
                                    'isi_agenda'=>$this->input->post('b'),
                                    'tempat'=>$this->db->escape_str($this->input->post('d')),
                                    'pengirim'=>$this->db->escape_str($this->input->post('g')),
                                    'gambar'=>$hasil['file_name'],
                                    'tgl_mulai'=>$mulai,
                                    'tgl_selesai'=>$selesai,
                                    'tgl_posting'=>date('Y-m-d'),
                                    'jam'=>$this->db->escape_str($this->input->post('e')),
                                    'dibaca'=>'0',
                                    'id_users'=>$this->session->id_users);
            }
            $this->model_app->insert('agenda',$data);
			redirect('administrator/agenda');
		}else{
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_tambah');
		}
	}

	function edit_agenda(){
		cek_session_akses('agenda',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_agenda/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('c');
            $hasil=$this->upload->data();
            $ex = explode(' - ',$this->input->post('f'));
            $exx = explode('/',$ex[0]);
            $exy = explode('/',$ex[1]);
            $mulai = $exx[2].'-'.$exx[0].'-'.$exx[1];
            $selesai = $exy[2].'-'.$exy[0].'-'.$exy[1];
            if ($hasil['file_name']==''){
                    $data = array('tema'=>$this->db->escape_str($this->input->post('a')),
                                    'tema_seo'=>seo_title($this->input->post('a')),
                                    'isi_agenda'=>$this->input->post('b'),
                                    'tempat'=>$this->db->escape_str($this->input->post('d')),
                                    'pengirim'=>$this->db->escape_str($this->input->post('g')),
                                    'tgl_mulai'=>$mulai,
                                    'tgl_selesai'=>$selesai,
                                    'jam'=>$this->db->escape_str($this->input->post('e')));
            }else{
                    $data = array('tema'=>$this->db->escape_str($this->input->post('a')),
                                    'tema_seo'=>seo_title($this->input->post('a')),
                                    'isi_agenda'=>$this->input->post('b'),
                                    'tempat'=>$this->db->escape_str($this->input->post('d')),
                                    'pengirim'=>$this->db->escape_str($this->input->post('g')),
                                    'gambar'=>$hasil['file_name'],
                                    'tgl_mulai'=>$mulai,
                                    'tgl_selesai'=>$selesai,
                                    'jam'=>$this->db->escape_str($this->input->post('e')));
            }

            $where = array('id_agenda' => $this->input->post('id'));
            $this->model_app->update('agenda', $data, $where);
			redirect('administrator/agenda');
		}else{
            if ($this->session->level=='admin'){
			     $proses = $this->model_app->edit('agenda', array('id_agenda' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('agenda', array('id_agenda' => $id, 'id_users' => $this->session->id_users))->row_array();
            }

            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_agenda/view_agenda_edit',$data);
		}
	}

	function delete_agenda(){
        cek_session_akses('agenda',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_agenda' => $this->uri->segment(3));
        }else{
            $id = array('id_agenda' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('agenda',$id);
		redirect('administrator/agenda');
	}


    // Controller Modul Sekilas Info

    function sekilasinfo(){
        cek_session_akses('sekilasinfo',$this->session->id_session);
        $data['record'] = $this->model_app->view_ordering('sekilasinfo','id_sekilas','DESC');
        $this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo',$data);
    }

    function tambah_sekilasinfo(){
        cek_session_akses('sekilasinfo',$this->session->id_session);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_info/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '2500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('info'=>$this->input->post('a'),
                              'tgl_posting'=>date('Y-m-d'),
                              'aktif'=>'Y');
            }else{
                $data = array('info'=>$this->input->post('a'),
                              'tgl_posting'=>date('Y-m-d'),
                              'gambar'=>$hasil['file_name'],
                              'aktif'=>'Y');
            }
            $this->model_app->insert('sekilasinfo',$data);
            redirect('administrator/sekilasinfo');
        }else{
            $this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo_tambah');
        }
    }

    function edit_sekilasinfo(){
        cek_session_akses('sekilasinfo',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_info/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '2500'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('b');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                $data = array('info'=>$this->input->post('a'),
                              'aktif'=>$this->input->post('f'));
            }else{
                $data = array('info'=>$this->input->post('a'),
                              'gambar'=>$hasil['file_name'],
                              'aktif'=>$this->input->post('f'));
            }

            $where = array('id_sekilas' => $this->input->post('id'));
            $this->model_app->update('sekilasinfo', $data, $where);
            redirect('administrator/sekilasinfo');
        }else{
            $proses = $this->model_app->edit('sekilasinfo', array('id_sekilas' => $id))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_sekilasinfo/view_sekilasinfo_edit',$data);
        }
    }

    function delete_sekilasinfo(){
        cek_session_akses('sekilasinfo',$this->session->id_session);
        $id = array('id_sekilas' => $this->uri->segment(3));
        $this->model_app->delete('sekilasinfo',$id);
        redirect('administrator/sekilasinfo');
    }



    // Controller Modul Jajak Pendapat

    function jajakpendapat(){
        cek_session_akses('jajakpendapat',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('poling','id_poling','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('poling',array('id_users'=>$this->session->id_users),'id_poling','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_jajakpendapat/view_jajakpendapat',$data);
    }

    function tambah_jajakpendapat(){
        cek_session_akses('jajakpendapat',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('pilihan'=>$this->input->post('a'),
                          'status'=>$this->input->post('b'),
                          'id_users'=>$this->session->id_users,
                          'rating'=>'0',
                          'aktif'=>$this->input->post('c'));
            $this->model_app->insert('poling',$data);
            redirect('administrator/jajakpendapat');
        }else{
            $this->template->load('administrator/template','administrator/mod_jajakpendapat/view_jajakpendapat_tambah');
        }
    }

    function edit_jajakpendapat(){
        cek_session_akses('jajakpendapat',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('pilihan'=>$this->input->post('a'),
                          'status'=>$this->input->post('b'),
                          'aktif'=>$this->input->post('c'));
            $where = array('id_poling' => $this->input->post('id'));
            $this->model_app->update('poling', $data, $where);
            redirect('administrator/jajakpendapat');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('poling', array('id_poling' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('poling', array('id_poling' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_jajakpendapat/view_jajakpendapat_edit',$data);
        }
    }

    function delete_jajakpendapat(){
        cek_session_akses('jajakpendapat',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_poling' => $this->uri->segment(3));
        }else{
            $id = array('id_poling' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('poling',$id);
        redirect('administrator/jajakpendapat');
    }


	// Controller Modul YM

	function ym(){
		cek_session_akses('ym',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('mod_ym','id','DESC');
		$this->template->load('administrator/template','administrator/mod_ym/view_ym',$data);
	}

	function tambah_ym(){
		cek_session_akses('ym',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>seo_title($this->input->post('b')),
                        'ym_icon'=>$this->input->post('c'));
            $this->model_app->insert('mod_ym',$data);
			redirect('administrator/ym');
		}else{
			$this->template->load('administrator/template','administrator/mod_ym/view_ym_tambah');
		}
	}

	function edit_ym(){
		cek_session_akses('ym',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$data = array('nama'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>seo_title($this->input->post('b')),
                        'ym_icon'=>$this->input->post('c'));
            $where = array('id' => $this->input->post('id'));
            $this->model_app->update('mod_ym', $data, $where);
			redirect('administrator/ym');
		}else{
			$proses = $this->model_app->edit('mod_ym', array('id' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_ym/view_ym_edit',$data);
		}
	}

	function delete_ym(){
        cek_session_akses('ym',$this->session->id_session);
		$id = array('id' => $this->uri->segment(3));
        $this->model_app->delete('mod_ym',$id);
		redirect('administrator/ym');
	}

    // Controller Modul Alamat

    function alamat(){
        cek_session_akses('alamat',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('alamat'=>$this->input->post('a'));
            $where = array('id_alamat' => 1);
            $this->model_app->update('mod_alamat', $data, $where);
            redirect('administrator/alamat');
        }else{
            $proses = $this->model_app->edit('mod_alamat', array('id_alamat' => 1))->row_array();
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_alamat/view_alamat',$data);
        }
    }


	// Controller Modul Pesan Masuk

	function pesanmasuk(){
		cek_session_akses('pesanmasuk',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('hubungi','id_hubungi','DESC');
		$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk',$data);
	}

	function detail_pesanmasuk(){
		cek_session_akses('pesanmasuk',$this->session->id_session);
		$id = $this->uri->segment(3);
		$this->db->query("UPDATE hubungi SET dibaca='Y' where id_hubungi='$id'");
		if (isset($_POST['submit'])){
			$nama           = $this->input->post('a');
            $email           = $this->input->post('b');
            $subject         = $this->input->post('c');
            $message         = $this->input->post('isi')." <br><hr><br> ".$this->input->post('d');

            $this->email->from('robby.prihandaya@gmail.com', 'PHPMU.COM');
            $this->email->to($email);
            $this->email->cc('');
            $this->email->bcc('');

            $this->email->subject($subject);
            $this->email->message($message);
            $this->email->set_mailtype("html");
            $this->email->send();

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';
            $this->email->initialize($config);

			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}else{
			$proses = $this->model_app->edit('hubungi', array('id_hubungi' => $id))->row_array();
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_pesanmasuk/view_pesanmasuk_detail',$data);
		}
	}

	function delete_pesanmasuk(){
        cek_session_akses('pesanmasuk',$this->session->id_session);
		$id = array('id_hubungi' => $this->uri->segment(3));
        $this->model_app->delete('hubungi',$id);
		redirect('administrator/pesanmasuk');
	}


	// Controller Modul User

	function manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$data['record'] = $this->model_app->view_ordering('users','id_users','DESC');
		$this->template->load('administrator/template','administrator/mod_users/view_users',$data);
	}

	function tambah_manajemenuser(){
		cek_session_akses('manajemenuser',$this->session->id_session);
		$id = $this->session->id_users;
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']==''){
                    $data = array('id_users'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }else{
                    $data = array('id_users'=>$this->db->escape_str($this->input->post('a')),
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'level'=>$this->db->escape_str($this->input->post('g')),
                                    'blokir'=>'N',
                                    'id_session'=>md5($this->input->post('a')).'-'.date('YmdHis'));
            }
            $this->model_app->insert('users',$data);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              $sess = md5($this->input->post('a')).'-'.date('YmdHis');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$sess,
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('a'));
		}else{
            $proses = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
            $data = array('record' => $proses);
			$this->template->load('administrator/template','administrator/mod_users/view_users_tambah',$data);
		}
	}

	function edit_manajemenuser(){
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('b') ==''){
                    $data = array(
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') ==''){
                    $data = array(
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']=='' AND $this->input->post('b') !=''){
                    $data = array(
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }elseif ($hasil['file_name']!='' AND $this->input->post('b') !=''){
                    $data = array(
                                    'password'=>hash("sha512", md5($this->input->post('b'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                    'blokir'=>$this->db->escape_str($this->input->post('h')));
            }
            $where = array('id_users' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

			redirect('administrator/edit_manajemenuser/'.$this->input->post('id'));
		}else{
            if ($this->session->id_users==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('id_users' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
    			$this->template->load('administrator/template','administrator/mod_users/view_users_edit',$data);
            }else{
                redirect('administrator/edit_manajemenuser/'.$this->session->id_users);
            }
		}
	}

    function edit_manajemenprofile(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_user/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '1000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('f');
            $hasil=$this->upload->data();
            if ($hasil['file_name']=='' AND $this->input->post('f') ==''){
                    $data = array('password'=>hash("sha512", md5($this->input->post('bw'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e'))
                                );
            }elseif ($hasil['file_name']!='' AND $this->input->post('f') ==''){
                    $data = array('password'=>hash("sha512", md5($this->input->post('bw'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),

                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name']
                                );
            }elseif ($hasil['file_name']=='' AND $this->input->post('f') !=''){
                    $data = array(
                                    'password'=>hash("sha512", md5($this->input->post('bw'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e'))
                                );
            }elseif ($hasil['file_name']!='' AND $this->input->post('f') !=''){
                    $data = array(
                                    'password'=>hash("sha512", md5($this->input->post('bw'))),
                                    'nama_lengkap'=>$this->db->escape_str($this->input->post('c')),
                                    'email'=>$this->db->escape_str($this->input->post('d')),
                                    'no_telp'=>$this->db->escape_str($this->input->post('e')),
                                    'foto'=>$hasil['file_name'],
                                );
            }
            $where = array('id_users' => $this->input->post('id'));
            $this->model_app->update('users', $data, $where);

              $mod=count($this->input->post('modul'));
              $modul=$this->input->post('modul');
              for($i=0;$i<$mod;$i++){
                $datam = array('id_session'=>$this->input->post('ids'),
                              'id_modul'=>$modul[$i]);
                $this->model_app->insert('users_modul',$datam);
              }

            redirect('administrator/edit_manajemenprofile/'.$this->input->post('id'));
        }else{
            if ($this->session->id_users==$this->uri->segment(3) OR $this->session->level=='admin'){
                $proses = $this->model_app->edit('users', array('id_users' => $id))->row_array();
                $akses = $this->model_app->view_join_where('users_modul','modul','id_modul', array('id_session' => $proses['id_session']),'id_umod','DESC');
                $modul = $this->model_app->view_where_ordering('modul', array('publish' => 'Y','status' => 'user'), 'id_modul','DESC');
                $data = array('rows' => $proses, 'record' => $modul, 'akses' => $akses);
                $this->template->load('administrator/template','administrator/mod_users/view_users_edit_profile',$data);
            }else{
                redirect('administrator/edit_manajemenprofile/'.$this->session->id_users);
            }
        }
    }

	function delete_manajemenuser(){
        cek_session_akses('manajemenuser',$this->session->id_session);
		$id = array('id_users' => $this->uri->segment(3));
        $this->model_app->delete('users',$id);
		redirect('administrator/manajemenuser');
	}

    function delete_akses(){
        cek_session_admin();
        $id = array('id_umod' => $this->uri->segment(3));
        $this->model_app->delete('users_modul',$id);
        redirect('administrator/edit_manajemenuser/'.$this->uri->segment(4));
    }



	// Controller Modul Modul

	function manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('modul','id_modul','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('modul',array('id_users'=>$this->session->id_users),'id_modul','DESC');
        }
		$this->template->load('administrator/template','administrator/mod_modul/view_modul',$data);
	}

	function tambah_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		if (isset($_POST['submit'])){
			$data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $this->model_app->insert('modul',$data);
			redirect('administrator/manajemenmodul');
		}else{
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_tambah');
		}
	}

	function edit_manajemenmodul(){
		cek_session_akses('manajemenmodul',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
            $data = array('nama_modul'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'link'=>$this->db->escape_str($this->input->post('b')),
                        'static_content'=>'',
                        'gambar'=>'',
                        'publish'=>$this->db->escape_str($this->input->post('c')),
                        'status'=>$this->db->escape_str($this->input->post('e')),
                        'aktif'=>$this->db->escape_str($this->input->post('d')),
                        'urutan'=>'0',
                        'link_seo'=>'');
            $where = array('id_modul' => $this->input->post('id'));
            $this->model_app->update('modul', $data, $where);
			redirect('administrator/manajemenmodul');
		}else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('modul', array('id_modul' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('modul', array('id_modul' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
			$this->template->load('administrator/template','administrator/mod_modul/view_modul_edit',$data);
		}
	}

	function delete_manajemenmodul(){
        cek_session_akses('manajemenmodul',$this->session->id_session);
		if ($this->session->level=='admin'){
            $id = array('id_modul' => $this->uri->segment(3));
        }else{
            $id = array('id_modul' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('modul',$id);
		redirect('administrator/manajemenmodul');
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('main');
	}

    // Controller Modul Kategori Cerbung

    function kategoricerbung(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('kategori_cerbung','id_kategori_cerbung','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('kategori_cerbung',array('id_users'=>$this->session->id_users),'id_kategori_cerbung','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_kategori_cerbung/view_kategori_cerbung',$data);
    }

    function tambah_kategoricerbung(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('nama_kategori_cerbung'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'kategori_seo_cerbung'=>seo_title($this->input->post('a')),
                        'status_kategori_cerbung'=>$this->db->escape_str($this->input->post('b'))

                    );

            $this->model_app->insert('kategori_cerbung',$data);
            redirect('administrator/kategoricerbung');
        }else{
            $this->template->load('administrator/template','administrator/mod_kategori_cerbung/view_kategori_cerbung_tambah');
        }
    }

   function edit_kategoricerbung(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_kategori_cerbung'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'kategori_seo_cerbung'=>seo_title($this->input->post('a')),
                        'status_kategori_cerbung'=>$this->db->escape_str($this->input->post('b'))
                    );
            $where = array('id_kategori_cerbung' => $this->input->post('id'));
            $this->model_app->update('kategori_cerbung', $data, $where);
            redirect('administrator/kategoricerbung');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('kategori_cerbung', array('id_kategori_cerbung' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('kategori_cerbung', array('id_kategori_cerbung' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_kategori_cerbung/view_kategori_cerbung_edit',$data);
        }
    }

    function delete_kategoricerbung(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_kategori_cerbung' => $this->uri->segment(3));
        }else{
            $id = array('id_kategori_cerbung' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('kategori_cerbung',$id);
        redirect('administrator/kategoricerbung');
    }
    // Controller Modul Tag Cerbung

    function tagcerbung(){
        cek_session_akses('tagberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('tag_cerbung','id_tag_cerbung','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('tag_cerbung',array('id_users'=>$this->session->id_users),'id_tag_cerbung','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_tag_cerbung/view_tag_cerbung',$data);
    }

    function tambah_tagcerbung(){
        cek_session_akses('tagberita',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('nama_tag_cerbung'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo_cerbung'=>seo_title($this->input->post('a')),
                        'count'=>'0');
            $this->model_app->insert('tag_cerbung',$data);
            redirect('administrator/tagcerbung');
        }else{
            $this->template->load('administrator/template','administrator/mod_tag_cerbung/view_tag_cerbung_tambah');
        }




function delete_tagcerbung(){
        cek_session_akses('tagberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_tag_cerbung' => $this->uri->segment(3));
        }else{
            $id = array('id_tag_cerbung' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('tag_cerbung',$id);
        redirect('administrator/tagcerbung');
    }
}

    function edit_tagcerbung(){
        cek_session_akses('tagberita',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_tag_cerbung'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'tag_seo_cerbung'=>seo_title($this->input->post('a')));
            $where = array('id_tag_cerbung' => $this->input->post('id'));
            $this->model_app->update('tag_cerbung', $data, $where);
            redirect('administrator/tagcerbung');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('tag_cerbung', array('id_tag_cerbung' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('tag_cerbung', array('id_tag_cerbung' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_tag_cerbung/view_tag_cerbung_edit',$data);
        }
    }

// Controller Modul Kategori Cerbung

    function kategoriusia(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('kategori_usia','id_kategori_usia','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('kategori_usia',array('id_users'=>$this->session->id_users),'id_kategori_usia','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_kategori_usia/view_kategori_usia',$data);
    }
    function tambah_kategoriusia(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if (isset($_POST['submit'])){
            $data = array('nama_kategori_usia'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'kategori_seo_usia'=>seo_title($this->input->post('a')),
                        'waktu'=>date('Y-m-d'),

                    );

            $this->model_app->insert('kategori_usia',$data);
            redirect('administrator/kategoriusia');
        }else{
            $this->template->load('administrator/template','administrator/mod_kategori_usia/view_kategori_usia_tambah');
        }
    }

    function edit_kategoriusia(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('nama_kategori_usia'=>$this->db->escape_str($this->input->post('a')),
                        'id_users'=>$this->session->id_users,
                        'kategori_seo_usia'=>seo_title($this->input->post('a'))
                    );
            $where = array('id_kategori_usia' => $this->input->post('id'));
            $this->model_app->update('kategori_usia', $data, $where);
            redirect('administrator/kategoriusia');
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('kategori_usia', array('id_kategori_usia' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('kategori_usia', array('id_kategori_usia' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_kategori_usia/view_kategori_usia_edit',$data);
        }
    }
    function delete_kategoriusia(){
        cek_session_akses('kategoriberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $id = array('id_kategori_usia' => $this->uri->segment(3));
        }else{
            $id = array('id_kategori_usia' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('kategori_usia',$id);
        redirect('administrator/kategoriusia');
    }
    // Controller Modul Cerbung

    function listcerbung(){
        cek_session_akses('listberita',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_join_dua('cerbung_db','users','kategori_cerbung','id_users','id_kategori_cerbung','id_cerbung','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('cerbung_db',array('id_users'=>$this->session->id_users),'id_cerbung','DESC');
        }

        $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung',$data);
    }

    function tambah_listcerbung(){
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_cerbung/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('k');
            $hasil=$this->upload->data();

            $config['source_image'] = 'asset/foto_cerbung/'.$hasil['file_name'];

            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'N'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
                        $tag = $this->input->post('j');

            $tags = explode(",", $tag);
            $tags2 = array();
            foreach($tags as $t)
            {
                $sql = "select * from tag_cerbung where tag_seo_cerbung = '" . seo_title($t) . "'";
                $a = $this->db->query($sql)->result_array();
                if(count($a) == 0){
                    $data = array('nama_tag_cerbung'=>$this->db->escape_str($t),
                            'id_users'=>$this->session->id_users,
                            'tag_seo_cerbung'=>seo_title($t),
                            'count'=>'0');
                    $this->model_app->insert('tag_cerbung',$data);
                }
                $tags2[] = seo_title($t);
            }
            $tags = implode(",", $tags2);
            if ($hasil['file_name']==''){
                    $data = array('id_kategori_cerbung'=>$this->db->escape_str($this->input->post('a')),

                                    'id_users'=>$this->session->id_users,
                                    'judul_cerbung'=>$this->input->post('b'),
                                    'judul_cerbung_seo'=>seo_title($this->input->post('b')),
                                     'pratinjau_cerbung'=>$this->input->post('d'),
                                      'nama_tokoh_cerbung'=>$this->input->post('e'),
                                    'headline_cerbung'=>$this->db->escape_str($this->input->post('f')),
                                     'ket_gambar_cerbung'=>$this->input->post('ket'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'tag_cerbung'=>$tag,
                                    'tag_seo_cerbung'=>$tags,
                                    'id_status_bab'=>1,
                                    'status_cerbung'=>$status);
            }else{
                    $data = array('id_kategori_cerbung'=>$this->db->escape_str($this->input->post('a')),

                                    'id_users'=>$this->session->id_users,
                                    'judul_cerbung'=>$this->input->post('b'),
                                    'judul_cerbung_seo'=>seo_title($this->input->post('b')),
                                    'pratinjau_cerbung'=>$this->input->post('d'),
                                      'nama_tokoh_cerbung'=>$this->input->post('e'),
                                    'headline_cerbung'=>$this->db->escape_str($this->input->post('f')),
                                     'ket_gambar_cerbung'=>$this->input->post('ket'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'foto_cerbung'=>$hasil['file_name'],
                                    'tag_cerbung'=>$tag,
                                    'tag_seo_cerbung'=>$tags,
                                    'id_status_bab'=>1,
                                    'status_cerbung'=>$status);
            }
            $this->model_app->insert('cerbung_db',$data);
            redirect('administrator/listcerbung');
        }else{
                          // $data['get_combo_kategori_cerbung'] = $this->Kategori_cerbung_model->get_combo_kategori_cerbung();
            $data['tag'] = $this->model_app->view_ordering('tag_cerbung','id_tag_cerbung','DESC');
            $data['record'] = $this->model_app->view_ordering('kategori_cerbung','id_kategori_cerbung','DESC');
             $data['usia'] = $this->model_app->view_ordering('kategori_usia','id_kategori_usia','DESC');
            $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_tambah',$data);
        }
    }

    function edit_listcerbung(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $config['upload_path'] = 'asset/foto_cerbung/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
            $config['max_size'] = '3000'; // kb
            $this->load->library('upload', $config);
            $this->upload->do_upload('k');
            $hasil=$this->upload->data();

            $config['source_image'] = 'asset/foto_cerbung/'.$hasil['file_name'];

            $this->load->library('image_lib',$config);
            $this->image_lib->watermark();

            if ($this->session->level == 'kontributor'){ $status = 'y'; }else{ $status = 'Y'; }
            if ($this->input->post('j')!=''){
                $tag_seo = $this->input->post('j');
                $tag=implode(',',$tag_seo);
            }else{
                $tag = '';
            }
            $tag = $this->input->post('j');

            $tags = explode(",", $tag);
            $tags2 = array();
            foreach($tags as $t)
            {
                $sql = "select * from tag_cerbung where tag_seo_cerbung = '" . seo_title($t) . "'";
                $a = $this->db->query($sql)->result_array();
                if(count($a) == 0){
                    $data = array('nama_tag_cerbung'=>$this->db->escape_str($t),
                            'id_users'=>$this->session->id_users,
                            'tag_seo_cerbung'=>seo_title($t),
                            'count'=>'0');
                    $this->model_app->insert('tag_cerbung',$data);
                }
                $tags2[] = seo_title($t);
            }
            $tags = implode(",", $tags2);

            if ($hasil['file_name']==''){
                    $data = array('id_kategori_cerbung'=>$this->db->escape_str($this->input->post('a')),

                                    'judul_cerbung'=>$this->input->post('b'),
                                    'judul_cerbung_seo'=>seo_title($this->input->post('b')),
                                     'pratinjau_cerbung'=>$this->input->post('d'),
                                      'nama_tokoh_cerbung'=>$this->input->post('e'),
                                    'headline_cerbung'=>$this->db->escape_str($this->input->post('f')),
                                     'ket_gambar_cerbung'=>$this->input->post('ket'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'tag_cerbung'=>$tag,
                                    'tag_seo_cerbung'=>$tags);
            }else{
                    $data = array
                                    (
                                    'judul_cerbung'=>$this->input->post('b'),
                                    'judul_cerbung_seo'=>seo_title($this->input->post('b')),
                                    'pratinjau_cerbung'=>$this->input->post('d'),
                                      'nama_tokoh_cerbung'=>$this->input->post('e'),
                                    'headline_cerbung'=>$this->db->escape_str($this->input->post('f')),
                                     'ket_gambar_cerbung'=>$this->input->post('ket'),
                                    'hari'=>hari_ini(date('w')),
                                    'tanggal'=>date('Y-m-d'),
                                    'jam'=>date('H:i:s'),
                                    'foto_cerbung'=>$hasil['file_name'],
                                    'tag_cerbung'=>$tag,
                                    'tag_seo_cerbung'=>$tags
                                    );
            }
            $where = array('id_cerbung' => $this->input->post('id'));
            $this->model_app->update('cerbung_db', $data, $where);
            redirect('administrator/listcerbung');
        }else{
             $data['tag'] = $this->model_app->view_ordering('tag_cerbung','id_tag_cerbung','DESC');
            $record = $this->model_app->view_ordering('kategori_cerbung','id_kategori_cerbung','DESC');
            $usia = $this->model_app->view_ordering('kategori_usia','id_kategori_usia','DESC');
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('cerbung_db', array('id_cerbung' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('cerbung_db', array('id_cerbung' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses,'tag' => $tag,'record' => $record,'usia' => $usia);
            $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_edit',$data);
        }
    }
    function publish_cerbung(){
        cek_session_akses('publish',$this->session->id_session);
        if ($this->uri->segment(4)=='Y'){
            $data = array('status_cerbung'=>'N');
        }else{
            $data = array('status_cerbung'=>'Y');
        }
        $where = array('id_cerbung' => $this->uri->segment(3));
        $this->model_app->update('cerbung_db', $data, $where);
        redirect('administrator/listcerbung');
    }


    function detailscerbung($id){


        $row = $this->Cerbung_model->get_by_id($id);
    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
    if ($row)
    {
    /* memanggil function dari masing2 model yang akan digunakan */
    $cerbung = $this->Cerbung_model->get_by_id($id);
    $data['cerbung']            = $cerbung;
    $data['cerbungbab']            = $this->Cerbung_model->get_by_id2($id);

    $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_detail',$data);

}
}
 function delete_cerbung(){
             $id = array('id_cerbung' => $this->uri->segment(3));


$this->model_app->delete('cerbung_db',$id);
$this->model_app->delete('cerbung_bab_db',$id);
redirect('administrator/listcerbung');
}

function add_bab($id)
    {
        $cerbung = $this->Cerbung_model->get_by_id_($id);
        $data['cerbung']            = $cerbung;






        $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_bab_tambah',$data);
    }


public function simpan_cerbung_bab()
     {

        $id = $this->input->post('id_cerbung');
         $cerbung = $this->Cerbung_model->get_by_id_($id);

             $seo = seo_title($this->input->post('b'));
              if ($this->session->level == 'kontributor'){ $status_bab = 'N'; }else{ $status_bab = 'Y'; }
              if ($this->session->level == 'kontributor'){ $status_lang_bab = 'y'; }else{ $status_lang_bab = 'Y'; }
             $data = array(

                    'judul_cerbung_bab' =>$this->input->post('b'),
                    'id_cerbung' =>$this->input->post('id_cerbung'),
                     'judul_cerbung_bab_seo'      =>$seo.'-'.date("dmYHis"),
                     'isi_cerbung'         =>$this->input->post('c'),
                     'tanggal_posting_bab'         => date("Y-m-d"),
                      'status_cerbung_bab'         =>$status_bab,
                      'status_lang_cerbung_bab'         =>$status_lang_bab,
                     'id_users'         => $this->session->id_users

             );


             $this->Cerbung_model->insert_bab($data);


             redirect('administrator/detailscerbung/' . $id);

     }

      function detailscerbungbab($id){


        $row = $this->Cerbung_model->get_by_id_bab($id);
    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
    if ($row)
    {
    /* memanggil function dari masing2 model yang akan digunakan */
    $cerbung_bab = $this->Cerbung_model->get_by_id_bab($id);
    $data['cerbung_bab']            = $cerbung_bab;

    $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_bab_detail',$data);

}
}

     function publish_bab_cerbung(){
        cek_session_akses('publish',$this->session->id_session);
        if ($this->uri->segment(4)=='Y'){
            $data = array('status_cerbung_bab'=>'N');
        }else{
            $data = array('status_cerbung_bab'=>'Y');
        }
        $where = array('id_cerbung_bab' => $this->uri->segment(3));
        $this->model_app->update('cerbung_bab_db', $data, $where);
        redirect($_SERVER['HTTP_REFERER']);
    }

    function publish_lang_bab_cerbung(){
        cek_session_akses('publish',$this->session->id_session);
        if ($this->uri->segment(4)=='Y'){
            $data = array('status_lang_cerbung_bab'=>'N');
        }else{
            $data = array('status_lang_cerbung_bab'=>'Y');
        }
        $where = array('id_cerbung_bab' => $this->uri->segment(3));
        $this->model_app->update('cerbung_bab_db', $data, $where);
        redirect($_SERVER['HTTP_REFERER']);
    }
 function publish_cerbung_selesai(){
        if ($this->uri->segment(4)=='2'){
            $data = array('id_status_bab'=>'1');
        }else{
            $data = array('id_status_bab'=>'2');
        }
        $where = array('id_cerbung' => $this->uri->segment(3));
        $this->model_app->update('cerbung_db', $data, $where);
        redirect($_SERVER['HTTP_REFERER']);


}
function edit_cerbung_bab(){
         $ids = $this->input->post('id_cerbung_bab');
         $seo = seo_title($this->input->post('a'));
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array('judul_cerbung_bab'=>$this->db->escape_str($this->input->post('a')),

                        'judul_cerbung_bab_seo'=>$seo.'-'.date("dmYHis"),
                        'id_cerbung'=>$this->db->escape_str($this->input->post('t')),
                        'isi_cerbung'=>$this->input->post('b')

                                            );
            $where = array('id_cerbung_bab' => $this->input->post('id'));

            $this->model_app->update('cerbung_bab_db', $data, $where);
            redirect('administrator/detailscerbung/' .$this->input->post('t'));
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('cerbung_bab_db', array('id_cerbung_bab' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('cerbung_bab_db', array('id_cerbung_bab' => $id, 'id_users' => $this->session->id_users))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_cerbung/view_cerbung_bab_edit',$data);
        }

}
function delete_cerbung_bab(){
        if ($this->session->level=='admin'){
            $id = array('id_cerbung_bab' => $this->uri->segment(3));
        }else{
            $id = array('id_cerbung_bab' => $this->uri->segment(3), 'id_users'=>$this->session->id_users);
        }
        $this->model_app->delete('cerbung_bab_db',$id);
        redirect($_SERVER['HTTP_REFERER']);



}


function listidentitasweb(){
        cek_session_akses('identitas',$this->session->id_session);
        if ($this->session->level=='admin'){
            $data['record'] = $this->model_app->view_ordering('identitas_web','id_identitas_web','DESC');
        }else{
            $data['record'] = $this->model_app->view_where_ordering('identitas_web','id_identitas_web','DESC');
        }
        $this->template->load('administrator/template','administrator/mod_identitas_web/view_identitas',$data);
    }

function detailsidentitas($id){


        $row = $this->Identitas_web_model->get_by_identitas($id);
    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
    if ($row)
    {
    /* memanggil function dari masing2 model yang akan digunakan */
    $identitas = $this->Identitas_web_model->get_by_identitas($id);
    $data['identitas']            = $identitas;

    $this->template->load('administrator/template','administrator/mod_identitas_web/view_identitas_detail',$data);

}
}
function edit_identitas_web(){
        $id = $this->uri->segment(3);
        if (isset($_POST['submit'])){
            $data = array( 'kontak_kami_db'=>$this->input->post('a'),
                        'syarat_db'=>$this->input->post('b'),
                       'faq_db'=>$this->input->post('c'),
                        'pedoman_db'=>$this->input->post('d')

                                            );
            $where = array('id_identitas_web' => $this->input->post('id'));

            $this->model_app->update('identitas_web', $data, $where);
            redirect('administrator/detailsidentitas/' .$this->input->post('id'));
        }else{
            if ($this->session->level=='admin'){
                 $proses = $this->model_app->edit('identitas_web', array('id_identitas_web' => $id))->row_array();
            }else{
                $proses = $this->model_app->edit('identitas_web', array('id_identitas_web' ))->row_array();
            }
            $data = array('rows' => $proses);
            $this->template->load('administrator/template','administrator/mod_identitas_web/view_identitas_edit',$data);
        }


}
}
