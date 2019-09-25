<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency_model extends CI_Model {

  public function all($value='')
  {
    return $this->db->get('currency')->result();
  }

}

/* End of file Currency_model.php */
/* Location: ./application/models/admin/Currency_model.php */