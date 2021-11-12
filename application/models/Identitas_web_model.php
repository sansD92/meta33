<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identitas_web_model extends CI_Model
{
  public $table = 'identitas_web';
  public $id    = 'id_identitas_web';
  public $order = 'DESC';

   function get_by_identitas($id)
  {
    $this->db->where('id_identitas_web', $id);
     $this->db->or_where('id_identitas_web', $id);
    return $this->db->get($this->table)->result_array();
  }
}
