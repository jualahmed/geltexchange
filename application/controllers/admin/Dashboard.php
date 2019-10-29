<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {
  public function __construct()
  {
      parent::__construct();

      /* Load :: Common */
      $this->load->helper('number');
      $this->load->model('admin/dashboard_model');
  }

	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();
            
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            $this->data['count_users']       = $this->dashboard_model->get_count_record('users');
            $this->data['testimonials']      = $this->dashboard_model->get_count_record('testimonials');
            $this->data['exchanges']      = $this->dashboard_model->get_count_record('exchanges');
            $this->data['gateways']      = $this->dashboard_model->get_count_record('gateways');
            $this->data['disk_totalspace']   = $this->dashboard_model->disk_totalspace(DIRECTORY_SEPARATOR);
            $this->data['disk_freespace']    = $this->dashboard_model->disk_freespace(DIRECTORY_SEPARATOR);
            $this->data['disk_usespace']     = $this->data['disk_totalspace'] - $this->data['disk_freespace'];
            $this->data['disk_usepercent']   = $this->dashboard_model->disk_usepercent(DIRECTORY_SEPARATOR, FALSE);
            $this->data['memory_usage']      = $this->dashboard_model->memory_usage();
            $this->data['memory_peak_usage'] = $this->dashboard_model->memory_peak_usage(TRUE);
            $this->data['memory_usepercent'] = $this->dashboard_model->memory_usepercent(TRUE, FALSE);

            $this->db->select('users.*,gateways.*,currency.*,exchanges.*,exchanges.status as statuss');
            $this->db->join('users', 'users.id = exchanges.user_id');
            $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
            $this->db->join('currency', 'gateways.currency = currency.currency_id');
            $this->db->order_by("exchanges.id", "desc");
            $this->db->where('exchanges.status',1);
            $this->data['results'] = $this->db->get("exchanges")->result();

            $this->data['url_exist']    = is_url_exist('http://www.domprojects.com');
            $this->template->admin_render('admin/dashboard/index', $this->data);
        }
	}
}
