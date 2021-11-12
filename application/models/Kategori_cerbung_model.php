<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_cerbung_model extends CI_Model
{
  public $table = 'kategori_cerbung';
  public $id    = 'id_kategori_cerbung';
  public $order = 'DESC';


  function get_combo_kategori_cerbung()
  {
    $this->db->order_by('nama_kategori_cerbung', 'ASC');
    $query = $this->db->get($this->table);

    if($query->num_rows() > 0){
      $data = array();
      foreach ($query->result_array() as $row)
      {
        $data[$row['nama_kategori_cerbung']] = $row['nama_kategori_cerbung'];
      }
      return $data;
    }
  }
}