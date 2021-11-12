<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model
{
  public $table = 'users';
  public $id    = 'id_users';
  public $order = 'DESC';

  function get_by_id_front($id)
  {
  $this->db->where('id_users', $id);
  $this->db->join('berita', 'berita.id_users = users.id_users','inner');
  return $this->db->get('users')->result();
  }
}