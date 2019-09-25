<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqandtutirial extends Admin_Controller {

 public function __construct()
  {
    parent::__construct();
    $this->data['pagetitle'] = "faqandtutirial";
    $this->load->model('admin/faqandtutirial_model');
    $this->load->model('admin/currency_model');
    $this->load->library('pagination');
     $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/gateways');
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
      $config['base_url']    = base_url().'admin/faqandtutirial/index';
      $config['uri_segment'] = 4;
      $config['total_rows']  = $this->faqandtutirial_model->record_count();
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
      $this->data['results'] = $this->faqandtutirial_model->fetch_faqandtutorial($limit,$start);
      $this->template->admin_render('admin/faqandtutirial/index', $this->data);
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
    $this->form_validation->set_rules('title', 'title', 'required');
    $this->form_validation->set_rules('content', 'content', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    if ($this->form_validation->run() == TRUE)
    { 
      $additional_data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
        'status' => $this->input->post('status'),
      );
      $this->faqandtutirial_model->create($additional_data);
      $this->session->set_flashdata('message',"Faq or Tutorial Create Successfully");
      redirect('admin/faqandtutirial/create', 'refresh');
    }
    else
    {
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      $this->template->admin_render('admin/faqandtutirial/create', $this->data);
    }
  }

  public function edit($id='')
  { 
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['var']=$this->faqandtutirial_model->find($id);
    $this->template->admin_render('admin/faqandtutirial/edit', $this->data);
  }

  public function update($idssssss='')
  {
    $file_name='';
    $this->breadcrumbs->unshift(2, lang('menu_users_create'), 'admin/users/edit');
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $tables = $this->config->item('tables', 'ion_auth');
    $this->form_validation->set_rules('title', 'title', 'required');
    $this->form_validation->set_rules('content', 'content', 'required');
    $this->form_validation->set_rules('status', 'status', 'required');
    if ($this->form_validation->run() == TRUE)
    { 
      $additional_data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content'),
        'status' => $this->input->post('status'),
      );
      $this->faqandtutirial_model->update($idssssss,$additional_data);
      $this->session->set_flashdata('message',"Updated Successfully");
      redirect('admin/faqandtutirial', 'refresh');
    }
    else
    {
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
      redirect('admin/faqandtutirial', 'refresh');
    }

  }

  public function delete($idssssss='')
  {
    $this->db->where('id', $idssssss);
    $this->db->delete('faqandtutorial');
    $this->session->set_flashdata('message',"Delete Successfully");
    redirect('admin/faqandtutirial', 'refresh');
  }

}

/* End of file Faqandtutirial.php */
/* Location: ./application/controllers/admin/Faqandtutirial.php */