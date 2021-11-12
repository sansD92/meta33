<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model
{
  public $table = 'video';
  public $id    = 'id_video';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->limit(3);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_combo_berita()
  {
    $this->db->order_by('judul_berita', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['id_berita']] = $row['judul_berita'];
      }
      return $data;
    }
  }
  function get_count_new_video()
{
return $this->db->get('video')->num_rows();

}
  function get_all_random()
  {
    $this->db->limit(2);
    $this->db->order_by($this->id, 'random');
    return $this->db->get($this->table)->result();
  }

  function get_all_new_video()
  {
    $this->db->limit(1);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_video2($order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_video3($order,$ordering,$baris,$dari)
  {
    $this->db->limit($dari, $baris);
    $this->db->order_by($order,$ordering);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_video_paging($number, $offset)
  {
    $this->db->order_by($this->id, $this->order);
    return $query = $this->db->get('video',$number,$offset)->result();
  }

  function get_all_new_home_1($page1)
  {
    $this->db->limit(4);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page1);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home_1_2($page1_2)
  {
    $this->db->limit(4);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page1_2);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home_2($page2)
  {
    $this->db->limit(8);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page2);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home_3($page3)
  {
    $this->db->limit(2);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page3);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home_3_2($page3_2)
  {
    $this->db->limit(2);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page3_2);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_new_home_3_3($page3_3)
  {
    $this->db->limit(2);
    $this->db->where('publish','ya');
    $this->db->where('kategori',$page3_3);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }
  function get_all_popular()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by('views', $this->order);
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
    $this->db->or_where('video_seo', $id);
    return $this->db->get($this->table)->row();
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
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

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

  // get all
  function get_cari_berita()
  {
    $cari_berita = $this->input->post('cari_berita');

    $this->db->like('judul_berita', $cari_berita);
    return $this->db->get($this->table)->result();
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

}

/* End of file Berita_model.php */
/* Location: ./application/models/Berita_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-10-17 02:19:21 */
/* http://harviacode.com */
