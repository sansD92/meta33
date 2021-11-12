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
}