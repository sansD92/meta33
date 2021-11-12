<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member extends CI_Controller {
	public function index(){
		$data['title'] = "Pendaftaran Kontributor";
		$data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
				 $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
				

        $cap = create_captcha($vals);
        $data['image'] = $cap['image'];
        $this->session->set_userdata('mycaptcha', $cap['word']);
	
		$this->load->view('fronts/register/index', $data);
	}

	function pendaftaran(){
		if (isset($_POST['submit'])){
			$cek = $this->model_app->view_where('users',array('email'=>cetak($this->input->post('d'))));
			if ($cek->num_rows()>0){
				echo $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf, email '.cetak($this->input->post('d')).' tidak tersedia !</div>');
				redirect('member/index');
			}else{
				$config['upload_path'] = 'asset/foto_user/';
	            $config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
	            $config['max_size'] = '1000'; // kb
	            $this->load->library('upload', $config);
	            $this->upload->do_upload('f');
	            $hasil=$this->upload->data();
	            if ($this->input->post() && (strtolower($this->input->post('secutity_code')) == strtolower($this->session->userdata('mycaptcha')))) {
		            if ($hasil['file_name']==''){
		                    $data = array('username'=>cetak($this->input->post('a',TRUE)),
		                                    'password'=>hash("sha512", md5(cetak($this->input->post('b',TRUE)))),
		                                    'nama_lengkap'=>cetak($this->input->post('c',TRUE)),
		                                    'email'=>cetak($this->input->post('d',TRUE)),
		                                    'no_telp'=>cetak($this->input->post('e',TRUE)),
		                                    'level'=>'kontributor',
		                                    'blokir'=>'N',
		                                    'id_session'=>md5(cetak($this->input->post('d'))).'-'.date('YmdHis'));
		            }else{
		                    $data = array('username'=>cetak($this->input->post('a',TRUE)),
		                                    'password'=>hash("sha512", md5(cetak($this->input->post('b',TRUE)))),
		                                    'nama_lengkap'=>cetak($this->input->post('c',TRUE)),
		                                    'email'=>cetak($this->input->post('d',TRUE)),
		                                    'no_telp'=>cetak($this->input->post('e',TRUE)),
		                                    'foto'=>$hasil['file_name'],
		                                    'level'=>'kontributor',
		                                    'blokir'=>'N',
		                                    'id_session'=>md5(cetak($this->input->post('d'))).'-'.date('YmdHis'));
		            }

		            $this->model_app->insert('users',$data);
		            $datam = array('id_session'=>md5(cetak($this->input->post('d'))).'-'.date('YmdHis'),
		                           'id_modul'=>18);
		            $this->model_app->insert('users_modul',$datam);
		            $this->session->set_userdata('upload_image_file_manager',true);
					$this->session->set_userdata(array('id_users'=>cetak($this->input->post('d')),
									   'level'=>'kontributor',
	                                   'id_session'=>md5(cetak($this->input->post('d'))).'-'.date('YmdHis')));
				}

				redirect('administrator/home');
			}
		}
	}
	public function profile($id)
	{

		$page1 = 'Y';
			$query = $this->model_utama->view_ordering('users','id_users',array('id_users' => $this->uri->segment(3)),'id_users','DESC',0,1);
			if ($query->num_rows()<=0){
				redirect('main');
			}else{

				$row = $query->row_array();
			
				$data['rows'] = $row;
		$data['opini_top'] = $this->db->query("select * from berita a join users b on a.id_users = b.id_users join kategori c on a.id_kategori = c.id_kategori where a.status = 'Y'  ORDER BY  id_berita desc limit 5
			")->result();
				 $data['cerbung_top'] = $this->db->query("select * from cerbung_db a join users b on a.id_users = b.id_users join kategori_cerbung c on a.id_kategori_cerbung = c.id_kategori_cerbung where status_cerbung = 'Y' ORDER BY  id_cerbung desc limit 5
			")->result();
				 $data['user']            = $this->Member_model->get_by_id_front($id);
   
			$this->load->view('fronts/profile/index',$data);
	

	
}
}
}