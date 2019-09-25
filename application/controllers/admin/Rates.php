<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rates extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->lang->load('admin/users');
    $this->page_title->push(lang('menu_users'));
    $this->data['pagetitle'] = $this->page_title->show();
    $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
    $this->load->model('admin/rates_model');
    $this->load->model('admin/gateways_model');
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
      /* Breadcrumbs */
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      /* Get all users */
      $config['base_url']    = base_url().'admin/rates/index';
      $config['uri_segment'] = 4;
      $config['total_rows']  = $this->rates_model->record_count();
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
      $this->data['start']=$start;
      $this->data['results'] = $this->rates_model->fetch_gateways($limit,$start);
      /* Load Template */
      $this->template->admin_render('admin/rates/index', $this->data);
    }
  }

  public function create($id='')
  {
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->form_validation->set_rules('gateway_from', 'gateway_from', 'required');
    $this->form_validation->set_rules('gateway_to', 'gateway_to', 'required');
    $this->form_validation->set_rules('rate_from', 'rate_from', 'required');
    $this->form_validation->set_rules('rate_to', 'rate_to', 'required');
    if ($this->form_validation->run() == TRUE)
    { 
      $gateway_from=$this->input->post('gateway_from');
      $gateway_to=$this->input->post('gateway_to');
      $this->db->where('gateway_from', $gateway_from);
      $this->db->where('gateway_to', $gateway_to);
      $d=$this->db->get('rates')->result();
      if(count($d)>0){
        $this->session->set_flashdata('message',"Rate Already Used");
        redirect('admin/rates/create', 'refresh');
      }else{
        $additional_data = array(
          'gateway_from' => $gateway_from,
          'gateway_to' => $gateway_to,
          'rate_from' => $this->input->post('rate_from'),
          'rate_to' => $this->input->post('rate_to'),
        );
        $this->rates_model->create($additional_data);
        $this->session->set_flashdata('message',"Rate Create Successfully");
        redirect('admin/rates/create', 'refresh');
      }
    }
    else{
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      $this->data['gateways']=$this->gateways_model->all()->result();
      $this->template->admin_render('admin/rates/create', $this->data);
    }
  }

  public function edit($id='')
  {
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->form_validation->set_rules('gateway_from', 'gateway_from', 'required');
    $this->form_validation->set_rules('gateway_to', 'gateway_to', 'required');
    $this->form_validation->set_rules('rate_from', 'rate_from', 'required');
    $this->form_validation->set_rules('rate_to', 'rate_to', 'required');
    if ($this->form_validation->run() == TRUE)
    { 
      $ddddddd=$this->input->post('idssss');
      $gateway_from=$this->input->post('gateway_from');
      $gateway_to=$this->input->post('gateway_to');
        $additional_data = array(
          'gateway_from' => $gateway_from,
          'gateway_to' => $gateway_to,
          'rate_from' => $this->input->post('rate_from'),
          'rate_to' => $this->input->post('rate_to'),
        );
        $this->rates_model->update($ddddddd,$additional_data);
        $this->session->set_flashdata('message',"Rate Update Successfully");
        redirect('admin/rates', 'refresh');
    }
    else{
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      $this->data['gateways']=$this->gateways_model->all()->result();
      $this->data['rates']=$this->rates_model->findid($id);
      $this->template->admin_render('admin/rates/edit', $this->data);
    }
  }

  public function delete($id='')
  { 
    $this->db->where('id', $id);
    $this->db->delete('rates');
     $this->session->set_flashdata('message',"Rate Update Successfully");
    redirect('admin/rates/index','refresh');
  }

}

/* End of file Rates.php */
/* Location: ./application/controllers/admin/Rates.php */