<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_model extends CI_Model {
  public function all(){
    return $this->db->get('settings')->row();
  }
}

/* End of file Setting_model.php */
/* Location: ./application/models/admin/Setting_model.php */