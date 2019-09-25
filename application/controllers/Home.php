<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/setting_model');
    $this->load->model('prefs_model');
    $this->lang->load('auth');
    $this->lang->load('admin/users');
    if($this->ion_auth->logged_in()){
      $this->data['user_login']=$this->prefs_model->user_info_login($this->ion_auth->user()->row()->id);
    }
      $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');
    $this->data['setting']=$this->setting_model->all();
    $this->data['vuecomp']='home.js';
    $this->load->model('exchanges_model');
  }

	public function index()
	{ 
    $this->__randerview('index', $this->data);
	}

  public function contact($value='')
  {
    $this->__randerview('contact', $this->data);
  }

  public function paymentproff($value='')
  {
    $this->load->library("pagination");
    $this->load->helper("url");
    $config['base_url']    = base_url().'home/paymentproff/index';
    $config['uri_segment'] = 4;
    $config['total_rows']  = $this->exchanges_model->record_count();
    $config['per_page']    = 10;
      //styling
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>'; 
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tagl_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tagl_close'] = '</li>';
    $config['first_tag_open'] = '<li class="page-item disabled">';
    $config['first_tagl_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tagl_close'] = '</a></li>';
    $config['attributes'] = array('class' => 'page-link');
    $this->pagination->initialize($config);
    $page = $this->uri->segment(4);
    $offset = !$page?0:$page;
    $start = $offset;
    $limit = 8;
    $this->data['results'] = $this->exchanges_model->fetch_exchanges($limit,$start);
    $this->data['start'] = $start;
    $this->__randerview('paymentproff', $this->data);
  }

  public function affiliate($value='')
  {
    $this->__randerview('affiliate', $this->data);
  }

  public function tutorial($value='')
  {
    $this->db->where('status',2);
    $this->data['info']=$this->db->get('faqandtutorial')->result();
    $this->__randerview('tutorial', $this->data);
  }

  public function faq($value='')
  {
    $this->db->where('status',1);
    $this->data['info']=$this->db->get('faqandtutorial')->result();
    $this->__randerview('faq', $this->data);
  }

  public function about($value='')
  {
    $this->__randerview('about', $this->data);
  }

  public function testimonials($value='')
  {
    $this->__randerview('testimonials', $this->data);
  }

  public function termsofservices($value='')
  {
    $this->__randerview('termsofservices', $this->data);
  }

  public function privacypolicy($value='')
  {
    $this->__randerview('privacypolicy', $this->data);
  }

  public function allfeedback()
  {
    $this->load->library("pagination");
    $this->load->helper("url");
    $config['base_url']    = base_url().'home/allfeedback';
    $config['uri_segment'] = 3;
    $config['total_rows']  = $this->db->count_all("testimonials");
    $config['per_page']    = 10;
      //styling
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>'; 
    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tagl_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tagl_close'] = '</li>';
    $config['first_tag_open'] = '<li class="page-item disabled">';
    $config['first_tagl_close'] = '</li>';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tagl_close'] = '</a></li>';
    $config['attributes'] = array('class' => 'page-link');
    $this->pagination->initialize($config);
    $page = $this->uri->segment(4);
    $offset = !$page?0:$page;
    $start = $offset;
    $limit = 8;

    $this->db->join('users', 'users.id = testimonials.user_id');
    $this->db->order_by("testimonials.id", "desc");
    $this->db->where('testimonials.status', 0);
    $this->db->limit($limit, $start);
    $this->data['results'] = $this->db->get("testimonials")->result();
    $this->data['start'] = $start;
    $this->__randerview('allfeedback', $this->data);
  }
}
