<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exchanges_model extends CI_Model {

  public function all($value='')
  { 
    return $this->db->get('exchanges');
  }  

  public function record_count()
  {
     return $this->db->count_all("exchanges");
  }

  public function fetch_exchanges($limit, $start) {
    $this->db->select('users.*,gateways.*,currency.*,exchanges.*,exchanges.status as statuss');
    $this->db->join('users', 'users.id = exchanges.user_id');
    $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
    $this->db->join('currency', 'gateways.currency = currency.currency_id');
    $this->db->order_by("exchanges.id", "desc");
    $this->db->limit($limit, $start);
    $query = $this->db->get("exchanges")->result();
    return $query;
  }

  public function create(array $value)
  {
    $this->db->insert('exchanges', $value);
    $id=$this->db->insert_id();

    $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
    $this->db->where('exchanges.id', $id);
    return $this->db->get('exchanges')->row();
  }

  public function find($id='')
  {
    $this->db->select('users.*,gateways.*,currency.*,exchanges.*,exchanges.status as statuss');
    $this->db->where('exchanges.id', $id);
    $this->db->join('users', 'users.id = exchanges.user_id');
    $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
    $this->db->join('currency', 'gateways.currency = currency.currency_id');
    return $this->db->get('exchanges')->row();
  }

}

/* End of file Exchanges_model.php */
/* Location: ./application/models/Exchanges_model.php */