<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_model extends CI_Model
{
  public $table = 'berita';
  public $id    = 'id_berita';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_berita()
  {
    $this->db->order_by('judul', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['id_berita']] = $row['judul'];
      }
      return $data;
    }
  }

  function get_all_random()
  {
    $this->db->limit(2);
    $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 3 DAY)');
    $this->db->order_by($this->id, 'random');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_new_iklanatas()
      {
        $this->db->limit(1);
        $this->db->order_by('id_iklanatas', $this->order);
        return $this->db->get('iklanatas')->result();
      }
      function get_all_new_iklanhome()
          {
            $this->db->limit(1);
            $this->db->order_by('id_iklantengah', $this->order);
            return $this->db->get('iklantengah')->result();
          }
  function get_all_new_home()
  {
    $this->db->limit(5);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_new_content()
  {
    $this->db->limit(6);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_latest($order,$ordering,$baris,$dari)
  {
    $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
    return $this->db->get($this->table)->result();
  }
  function get_all_slider($page1)
  {
    $this->db->limit(4);
    $this->db->where('headline',$page1);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_slider_footer($page1)
  {
    $this->db->limit(4);
    $this->db->where('headline',$page1);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_slider2($page1,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('headline',$page1);
    $this->db->order_by($order,$ordering);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_slider3($page1,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('headline',$page1);
    $this->db->order_by($order,$ordering);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_slider4($page1,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('headline',$page1);
    $this->db->order_by($order,$ordering);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }

  function get_all_motogp($motogp)
  {
    $this->db->limit(1);
    $this->db->where('id_kategori',$motogp);
    $this->db->order_by($this->id, $this->order);
      $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_motogp_2($motogp,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$motogp);
    $this->db->order_by($order,$ordering);
      $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }

  function get_all_ragam($ragam)
  {
    $this->db->limit(9);
    $this->db->where('berita.id_kategori',$ragam);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_ragam_2($ragam,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$ragam);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_daerah_3($daerah,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$daerah);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_olahraga($olahraga)
  {
    $this->db->limit(1);
    $this->db->where('id_kategori',$olahraga);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_olahraga_2($olahraga,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$olahraga);
    $this->db->order_by($order,$ordering);
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_ingris($ingris)
  {
    $this->db->limit(1);
    $this->db->where('id_kategori',$ingris);
    $this->db->order_by($this->id, $this->order);
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_ingris_2($ingris,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$ingris);
    $this->db->order_by($order,$ordering);
      $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }
  function get_all_politik($politik)
  {
    $this->db->limit(1);
    $this->db->where('id_kategori',$politik);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_politik_2($politik,$order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->where('id_kategori',$politik);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_terbaru()
  {
    $this->db->limit(4);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_video()
  {
    $this->db->limit(7);
    $this->db->order_by($this->id, 'DESC');
    return $this->db->get('video',$number,$offset)->result();
  }

  function get_count_new_video()
{
return $this->db->get('Video')->num_rows();

}
  function get_all_popular()
  {
    $this->db->limit(5);
    $this->db->where('tanggal >= DATE_SUB(NOW(), INTERVAL 3 DAY)');
    $this->db->order_by('views', $this->order);
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result();
  }

  function get_all_new_terbaru_kiri()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_berita_sidebar()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_komentar_sidebar()
  {
    $this->db->from($this->table);
    $this->db->where('status', 'ya');
    $this->db->limit(5);
    $this->db->order_by('time_verif', $this->order);
    $this->db->join('komentar', 'berita.id_berita = komentar.id_berita');
    return $this->db->get()->result();
  }

  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('judul_seo', $id);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->row();
  }
  function get_by_id2($id)
  {
    $this->db->where($this->id, $id);
    $this->db->or_where('judul_seo', $id);
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    return $this->db->get($this->table)->result_array();
  }

  function get_komentar($id)
  {
    $this->db->from($this->table);
    $this->db->where('judul_seo', $id);
    $this->db->where('status', 'ya');
    $this->db->join('komentar', 'berita.id_berita = komentar.id_berita');
    return $this->db->get()->result();
  }

  function get_all_arsip($per_page,$dari)
  {
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }


  // get total rows


  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // insert data
  function insert_komentar($data)
  {
    $this->db->insert('komentar', $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }
  function get_all_news($per_page,$dari)
  {
    $this->db->order_by($this->id, 'DESC');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
  function get_all_pilihan($per_page,$dari)
  {
    $this->db->where('pilihan', 'Y');
    $this->db->where('status', 'Y');
    $this->db->order_by($this->id, 'DESC');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
  function get_all_headline($per_page,$dari)
  {
    $this->db->where('headline', 'Y');
    $this->db->where('status', 'Y');
    $this->db->order_by($this->id, 'DESC');
    $this->db->join('kategori', 'kategori.id_kategori = berita.id_kategori','inner');
    $this->db->join('users', 'users.id_users = berita.id_users','inner');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
  // get all
  function get_cari_berita($per_page,$dari,$cari_berita)
  {
    $cari_berita = $this->input->post('cari_berita');
    $this->db->limit(4);
    $this->db->order_by($this->id, 'DESC');
    $this->db->like('judul', $cari_berita);
    $query = $this->db->get('berita',$per_page,$dari,$cari_berita);
    return $query->result();
  }
  function banyakcariproduk($cari_berita){
$data = 0;
$this->db->select('*');
$this->db->from('berita');
$this->db->like('judul',$cari_berita);
$this->db->order_by($this->id, 'DESC');
$hasil=$this->db->get();
$data=$hasil->num_rows();
return $data;
}
function total_rows() {
  return $this->db->get($this->table)->num_rows();
}
  function total_rows2($cari_berita){

    $data = 0;
    $this->db->select("*");
    $this->db->from("berita");
    $this->db->like('judul',$cari_berita);
    $this->db->OR_like('id_berita',$cari_berita);
    $this->db->order_by('tanggal','desc');
    $hasil=$this->db->get();
    $data=$hasil->num_rows();
return $data;
    }


  function get_one($slug)
    {
        $this->db->get_where('berita', array('judul_seo' => $slug));
        $query = $this->db->get('berita');
        return $query->row();
    }

   function update_counter($id)
    {
        //return current article views
        $this->db->where('judul_seo', urldecode($id));
        $this->db->select('views'); $count = $this->db->get('berita')->row();
        // then increase by one
        $this->db->where('judul_seo', urldecode($id));
        $this->db->set('views', ($count->views + 1));
        $this->db->update('berita');
    }
    function del($id){
            $row = $this->db->where('id_berita',$id)->get('berita')->row();
            unlink('assets/images/berita/'.$row->userfile.$row->userfile_type);
            $this->db->where('id_berita', $id);
            $this->db->delete($this->table);
            return true;
          }
          public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }
    function generate()
    {
        $this->db->select('judul_seo,hari,tanggal,jam');
        $this->db->from('berita');
        $this->db->order_by('id_berita',"DESC");
        $query = $this->db->get();

        return $query->result();
    }

}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
