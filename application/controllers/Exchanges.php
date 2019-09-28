<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exchanges extends Public_Controller {

  public function __construct()
  {
     parent::__construct();
    $this->load->model('admin/setting_model');
    $this->load->model('prefs_model');
    $this->lang->load('auth');
    $this->lang->load('admin/users');
    $this->load->model('exchanges_model');
    $this->load->library('pagination');
    $this->load->model('admin/gateways_model');
    $this->load->model('admin/rates_model');
  }

  public function index()
  {
    if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
    {
      redirect('auth/login', 'refresh');
    }
    else
    {
      $config['base_url']    = base_url().'admin/rates/index';
      $config['uri_segment'] = 4;
      $config['total_rows']  = $this->exchanges_model->record_count();
      $config['per_page']    = 8;
        //styling
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] ="</ul>";
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
      $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
      $config['next_tag_open'] = "<li>";
      $config['next_tagl_close'] = "</li>";
      $config['prev_tag_open'] = "<li>";
      $config['prev_tagl_close'] = "</li>";
      $config['first_tag_open'] = "<li>";
      $config['first_tagl_close'] = "</li>";
      $config['last_tag_open'] = "<li>";
      $config['last_tagl_close'] = "</li>";
      $this->pagination->initialize($config);
      $page = $this->uri->segment(4);
      $offset = !$page?0:$page;
      $start = $offset;
      $limit = 8;
      $this->data['results'] = $this->exchanges_model->fetch_gateways($limit,$start);
      /* Load Template */
      $this->template->admin_render('admin/exchanges/index', $this->data);
    }
  }


  public function gateway_info($id)
  { 
    $data=$this->gateways_model->find($id);
    echo json_encode($data);
  }

  public function rates()
  {
    $rate = array();
    $sendid=$this->input->post('sendid');
    $reciveid=$this->input->post('reciveid');
    $rate['status']="success";

    $this->db->join('gateways','gateways.id = rates.gateway_to');
    $this->db->join('currency','currency.currency_id = gateways.currency');
    $this->db->where('rates.gateway_to', $reciveid);
    $rate['currency_name1']=$this->db->get('rates')->row()->currency_name;

    $rate['alldata']=$this->rates_model->find($sendid,$reciveid);
    echo json_encode($rate);
  }

  public function make_exchange()
  {
    $data = array(
      'user_id'=>  $this->input->post('user_id'),
      'gateway_account'=> $this->input->post('gateway_account'),
      'gateway_send'=> $this->input->post('gateway_send'),
      'gateway_receive'=> $this->input->post('gateway_receive'),
      'amount_send'=> $this->input->post('amount_send'),
      'amount_receive'=> $this->input->post('amount_receive'),
      'rate_from'=> $this->input->post('rate_from'),
      'rate_to'=> $this->input->post('rate_to'),
    );
    $gateway =$this->exchanges_model->create($data);
    echo json_encode($gateway);
  }

  public function make_exchangefinal()
  {
    $send_account=$this->input->post('send_account');
    $id = $this->input->post('id');
    $this->db->where('id', $id);
    $ddddd=$this->db->get('exchanges')->row();

    $this->db->where('id', $ddddd->gateway_send);
    $this->db->set('reserve', 'reserve +'.$ddddd->amount_send,FALSE);
    $this->db->update('gateways');

    $this->db->where('id', $ddddd->gateway_receive);
    $this->db->set('reserve', 'reserve -'.$ddddd->amount_receive,FALSE);
    $this->db->update('gateways');


    $this->db->where('id', $id);
    $this->db->set('send_account',$send_account);
    $this->db->set('status',1);
    $this->db->update('exchanges');
    echo "1"; 
  }

}

/* End of file Exchanges.php */
/* Location: ./application/controllers/Exchanges.php */