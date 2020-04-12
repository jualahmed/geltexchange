<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rates_model extends CI_Model {

  public function all($value='')
  { 
    $this->db->join('gateways', 'gateways.id = rates.gateway_from');
    return $this->db->get('rates');
  }  

  public function record_count()
  {
     return $this->db->count_all("rates");
  }

  public function fetch_gateways($limit, $start) {
    $this->db->select('gateways.*, currency.*,rates.*,rates.id as rid');
    $this->db->order_by("rates.id", "desc");
    $this->db->limit($limit, $start);
    $this->db->join('gateways', 'gateways.id = rates.gateway_from','left');
    $this->db->join('currency','currency.currency_id = gateways.currency','left');
    $query = $this->db->get("rates")->result();
    return $query;
  }

  public function find($sendid,$reciveid)
  {
    $this->db->join('gateways','gateways.id = rates.gateway_from');
    $this->db->join('currency','currency.currency_id = gateways.currency');
    $this->db->where('rates.gateway_from', $sendid);
    $this->db->where('rates.gateway_to', $reciveid);
    return $this->db->get('rates')->row();
  }

  public function findid($id)
  {
    $this->db->where('id', $id);
    return $this->db->get('rates')->row();
  }

  public function create(array $value)
  {
    return $this->db->insert('rates', $value);
  }

  public function update($id,$additional_data)
  {
    $this->db->where('id', $id);
    return $this->db->update('rates', $additional_data);
  }
}

/* End of file Rates_model.php */
/* Location: ./application/models/admin/Rates_model.php */