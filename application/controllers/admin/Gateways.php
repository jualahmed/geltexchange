<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Gateways extends Admin_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->data['pagetitle'] = "Gateways";
    $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/gateways');
    $this->load->model('admin/gateways_model');
    $this->load->model('admin/currency_model');
    $this->load->library('pagination');
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
      //pagination config
      $config['base_url']    = base_url().'admin/gateways/index';
      $config['uri_segment'] = 4;
      $config['total_rows']  = $this->gateways_model->record_count();
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
      $this->data['results'] = $this->gateways_model->fetch_gateways($limit,$start);
      $this->template->admin_render('admin/gateways/index', $this->data);
    }
  }


  public function create()
  {
    /* Breadcrumbs */
    $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/users/create');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    /* Variables */
    $tables = $this->config->item('tables', 'ion_auth');
    /* Validate form input */
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('currency', 'currency', 'required');
    $this->form_validation->set_rules('reserve', 'reserve', 'required');
    $this->form_validation->set_rules('min_amount', 'min_amount', 'required');
    $this->form_validation->set_rules('min_received', 'min_received', 'required');
    $this->form_validation->set_rules('max_amount', 'max_amount', 'required');
    $this->form_validation->set_rules('extra_fee', 'extra_fee');
    $this->form_validation->set_rules('fee', 'fee');
    $this->form_validation->set_rules('allow_send', 'allow_send');
    $this->form_validation->set_rules('allow_receive', 'allow_receive');
    $this->form_validation->set_rules('buy_price', 'buy_price');
    $this->form_validation->set_rules('sales_price', 'sales_price');
    $this->form_validation->set_rules('account', 'account');
    $this->form_validation->set_rules('t_message', 't_message');
    if ($this->form_validation->run() == TRUE)
    { 
      $file_name='';
      $config['upload_path']          = './assets/temp/img/gicon';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 100;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;
      $this->load->library('upload', $config);
      if ( ! $this->upload->do_upload('external_icon'))
      {
        $error = array('error' => $this->upload->display_errors());
      }
      else
      {
       $upload_data = $this->upload->data();
       $file_name = 'assets/temp/img/gicon/'.$upload_data['file_name'];
      }

      $l=$this->input->post('allow_send');
      if($l==NULL){
        $l=0;
      }else{
        $l=1;
      }
      $r=$this->input->post('allow_receive');
      if($r==NULL){
        $r=0;
      }else{
        $r=1;
      }
      $additional_data = array(
        'name' => $this->input->post('name'),
        'currency' => $this->input->post('currency'),
        'reserve' => $this->input->post('reserve'),
        'min_amount' => $this->input->post('min_amount'),
        'min_received' => $this->input->post('min_received'),
        'max_amount' => $this->input->post('max_amount'),
        'extra_fee' => $this->input->post('extra_fee'),
        'fee' => $this->input->post('fee'),
        'allow_send' => $l,
        'allow_receive' => $r,
        'buy_price' => $this->input->post('buy_price'),
        'sales_price' => $this->input->post('sales_price'),
        'account' => $this->input->post('account'),
        'external_icon' => $file_name,
        't_message' => $this->input->post('t_message'),
      );
      $this->gateways_model->create($additional_data);
      $this->session->set_flashdata('message',"Gateways Create Successfully");
      redirect('admin/gateways/create', 'refresh');
    }
    else
    {
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      $this->data['currency']=$this->currency_model->all();
      $this->template->admin_render('admin/gateways/create', $this->data);
    }
  }

  public function edit($id='')
  { 
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['var']=$this->gateways_model->find($id);
    $this->data['currency']=$this->currency_model->all();
    $this->template->admin_render('admin/gateways/edit', $this->data);
  }

  public function update($idssssss='')
  {
    $file_name='';
    $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/users/edit');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $tables = $this->config->item('tables', 'ion_auth');
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('currency', 'currency', 'required');
    $this->form_validation->set_rules('reserve', 'reserve', 'required');
    $this->form_validation->set_rules('min_amount', 'min_amount', 'required');
    $this->form_validation->set_rules('min_received', 'min_received', 'required');
    $this->form_validation->set_rules('max_amount', 'max_amount', 'required');
    $this->form_validation->set_rules('extra_fee', 'extra_fee');
    $this->form_validation->set_rules('fee', 'fee');
    $this->form_validation->set_rules('allow_send', 'allow_send');
    $this->form_validation->set_rules('allow_receive', 'allow_receive');
    $this->form_validation->set_rules('buy_price', 'buy_price');
    $this->form_validation->set_rules('sales_price', 'sales_price');
    $this->form_validation->set_rules('account', 'account');
    $this->form_validation->set_rules('t_message', 't_message');
    if ($this->form_validation->run() == TRUE)
    { 
      $config['upload_path']          = './assets/temp/img/gicon';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1000;
      $config['max_width']            = 2024;
      $config['max_height']           = 1468;
      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('external_icon'))
      {
        $error = array('error' => $this->upload->display_errors());
        var_dump($error);
      }
      else
      {
       $upload_data = $this->upload->data();
       $file_name = 'assets/temp/img/gicon/'.$upload_data['file_name'];
      }
      $l=$this->input->post('allow_send');
      if($l==NULL){
        $l=0;
      }else{
        $l=1;
      }
      $r=$this->input->post('allow_receive');
      if($r==NULL){
        $r=0;
      }else{
        $r=1;
      }

      if($file_name){
        $additional_data = array(
          'name' => $this->input->post('name'),
          'currency' => $this->input->post('currency'),
          'reserve' => $this->input->post('reserve'),
          'min_amount' => $this->input->post('min_amount'),
          'min_received' => $this->input->post('min_received'),
          'max_amount' => $this->input->post('max_amount'),
          'extra_fee' => $this->input->post('extra_fee'),
          'fee' => $this->input->post('fee'),
          'allow_send' => $l,
          'allow_receive' => $r,
          'buy_price' => $this->input->post('buy_price'),
          'sales_price' => $this->input->post('sales_price'),
          'account' => $this->input->post('account'),
          'external_icon' => $file_name,
          't_message' => $this->input->post('t_message'),
        );
      }else{
        $additional_data = array(
          'name' => $this->input->post('name'),
          'currency' => $this->input->post('currency'),
          'reserve' => $this->input->post('reserve'),
          'min_amount' => $this->input->post('min_amount'),
          'min_received' => $this->input->post('min_received'),
          'max_amount' => $this->input->post('max_amount'),
          'extra_fee' => $this->input->post('extra_fee'),
          'fee' => $this->input->post('fee'),
          'allow_send' => $l,
          'allow_receive' => $r,
          'buy_price' => $this->input->post('buy_price'),
          'sales_price' => $this->input->post('sales_price'),
          'account' => $this->input->post('account'),
          't_message' => $this->input->post('t_message'),
        );
      }
      $this->gateways_model->update($idssssss,$additional_data);
      $this->session->set_flashdata('message',"Update Create Successfully");
      redirect('admin/gateways', 'refresh');
    }
    else
    {
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      $this->data['currency']=$this->currency_model->all();
      redirect('admin/gateways', 'refresh');
    }

  }

  public function delete($idssssss='')
  {
    $this->db->where('id', $idssssss);
    $this->db->delete('gateways');
    $this->session->set_flashdata('message',"Delete Create Successfully");
    redirect('admin/gateways', 'refresh');
  }
}

/* End of file Gateways.php */
/* Location: ./application/controllers/admin/Gateways.php */
// 