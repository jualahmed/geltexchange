<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqandtutirial_model extends CI_Model {

   public function all($value='')
  {
    return $this->db->get('faqandtutorial');
  }

  public function create(array $arr)
  {
   return $this->db->insert('faqandtutorial', $arr);
  }

  public function record_count()
  {
     return $this->db->count_all("faqandtutorial");
  }

  public function fetch_faqandtutorial($limit, $start) {
       $this->db->limit($limit, $start);
       $this->db->order_by("id", "desc");
       $query = $this->db->get("faqandtutorial");
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
     return $this->db->get('faqandtutorial')->row();
   }

   public function update($id='',array $arr)
   {
     $this->db->where('id', $id);
     return $this->db->update('faqandtutorial', $arr);
   }

}

/* End of file Faqandtutirial_model.php */
/* Location: ./application/models/admin/Faqandtutirial_model.php */