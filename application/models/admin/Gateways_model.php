<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gateways_model extends CI_Model {

	public function all($value='')
	{
		return $this->db->get('gateways');
	}

	public function create(array $arr)
	{
	 return $this->db->insert('gateways', $arr);
	}

	public function record_count()
	{
		 return $this->db->count_all("gateways");
	}

	public function fetch_gateways($limit, $start) {
		 $this->db->limit($limit, $start);
		 $this->db->order_by("id", "desc");
		 $this->db->join('currency', 'currency.currency_id = gateways.currency');
		 $query = $this->db->get("gateways");
		 if ($query->num_rows() > 0) {
				 foreach ($query->result() as $row) {
						 $data[] = $row;
				 }
				 return $data;
		 }
		 return false;
	 }

	 public function find($id='')
	 {
		 $this->db->where('id', $id);
		 return $this->db->get('gateways')->row();
	 }

	 public function update($id='',array $arr)
	 {
		 $this->db->where('id', $id);
		 return $this->db->update('gateways', $arr);
	 }

}

/* End of file Gateways_model.php */
/* Location: ./application/models/admin/Gateways_model.php */