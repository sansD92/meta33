<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cerbung_model extends CI_Model
{
  public $table = 'cerbung_db';
  public $id    = 'id_cerbung';
  public $order = 'DESC';

  function get_by_id($id)
  {
    $this->db->where('id_cerbung', $id);
    $this->db->or_where('id_cerbung', $id);
    $this->db->join('kategori_cerbung', 'kategori_cerbung.id_kategori_cerbung = cerbung_db.id_kategori_cerbung','inner');
    $this->db->join('users', 'users.id_users = cerbung_db.id_users','inner');
    
     $this->db->join('status_bab', 'status_bab.id_status_bab = cerbung_db.id_status_bab','inner'); 
    return $this->db->get('cerbung_db')->result_array();
  }
  function get_by_id_($id)
  {
    $this->db->where('id_cerbung', $id);
    $this->db->or_where('id_cerbung', $id);
    $this->db->join('kategori_cerbung', 'kategori_cerbung.id_kategori_cerbung = cerbung_db.id_kategori_cerbung','inner');
    
     $this->db->join('status_bab', 'status_bab.id_status_bab = cerbung_db.id_status_bab','inner'); 
    return $this->db->get('cerbung_db')->row();
  }

  function get_by_id2($id)
  {
  $this->db->where('cerbung_bab_db.id_cerbung', $id);
  $this->db->or_where('cerbung_bab_db.id_cerbung', $id);
  $this->db->join('cerbung_db', 'cerbung_db.id_cerbung = cerbung_bab_db.id_cerbung','inner');
  return $this->db->get('cerbung_bab_db')->result_array();
  }
  function get_by_id_front($id)
  {
  $this->db->where('cerbung_bab_db.id_cerbung', $id);
  $this->db->where('status_cerbung_bab', 'Y');
  $this->db->join('cerbung_db', 'cerbung_db.id_cerbung = cerbung_bab_db.id_cerbung','inner');
  return $this->db->get('cerbung_bab_db')->result();
  }

  function insert_bab($data)
  {

    $this->db->insert('cerbung_bab_db', $data);
  }
  function get_by_id_bab($id)
  {
  $this->db->where('id_cerbung_bab', $id);
  $this->db->or_where('id_cerbung_bab', $id);
  $this->db->join('cerbung_db', 'cerbung_db.id_cerbung = cerbung_bab_db.id_cerbung','inner');
  return $this->db->get('cerbung_bab_db')->result_array();
  }
  function total_rows() {
  return $this->db->get($this->table)->num_rows();
}
function get_all_cerbung($per_page,$dari)
  {
    $this->db->where('status_cerbung', 'Y');
    $this->db->order_by($this->id, 'DESC');
    $this->db->join('kategori_cerbung', 'kategori_cerbung.id_kategori_cerbung = cerbung_db.id_kategori_cerbung','inner');
    $this->db->join('users', 'users.id_users = cerbung_db.id_users','inner');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }
}