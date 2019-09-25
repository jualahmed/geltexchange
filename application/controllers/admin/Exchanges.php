<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Exchanges extends Admin_Controller {
  public function __construct()
  {
     parent::__construct();
    $this->data['pagetitle'] = "Gateways";
    $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/gateways');
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
      $this->load->library("pagination");
      $this->load->helper("url");
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $config['base_url']    = base_url().'admin/exchanges/index';
      $config['uri_segment'] = 4;
      $config['total_rows']  = $this->exchanges_model->record_count();
      $config['per_page']    = 10;
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
      $this->data['results'] = $this->exchanges_model->fetch_exchanges($limit,$start);
      $this->data['start'] = $start;
      /* Load Template */
      $this->template->admin_render('admin/exchanges/index', $this->data);
    }
  }

  public function view($id='')
  { 
    $this->data['stinglegetway']=$this->exchanges_model->find($id);
    $this->template->admin_render('admin/exchanges/view', $this->data);
  }

  public function update()
  {
    $exid=$this->input->post('exid');
    $status=$this->input->post('status');
    $note=$this->input->post('note');
    $this->db->set('status',$status);
    $this->db->set('note',$note);
    $this->db->where('id', $exid);
    $this->db->update('exchanges');
    redirect('admin/exchanges','refresh');
  }
}

/* End of file Exchanges.php */
/* Location: ./application/controllers/Exchanges.php */