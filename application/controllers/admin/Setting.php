<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Admin_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->lang->load('admin/users');
    $this->page_title->push(lang('menu_users'));
    $this->data['pagetitle'] = "Setting";
    $this->breadcrumbs->unshift(1, lang('menu_users'), 'admin/users');
    $this->load->model('admin/setting_model');
  }

  public function index()
  {
    if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
    {
      redirect('auth/login', 'refresh');
    }
    else
    {
      $this->data['settiong']=$this->db->get('settings')->row();
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->template->admin_render('admin/setting/index', $this->data);
    }
  }

  public function settingother($value='')
  {
    if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
    {
      redirect('auth/login', 'refresh');
    }
    else
    {
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->template->admin_render('admin/setting/othersetting', $this->data);
    }
  }

  public function create()
  {
    $keaaaaaaaa=$this->input->post('key');
    $valuesssssss=$this->input->post('value');
    $keaaaaaaaa= preg_replace('/\s+/', '', $keaaaaaaaa);
    $decodedate= array();
    if (isset($valuesssssss)) {
      $alldate=$this->db->get('settings')->row();
      foreach (json_decode($alldate->data) as $key => $value) {
        $new = array($key=>$value);
        $decodedate=array_merge($decodedate, $new);
      }
      $new_array = array($keaaaaaaaa => $valuesssssss);
      $decodedate=array_merge($decodedate, $new_array);
      $this->db->set('data',json_encode($decodedate));
      $this->db->where('id', 1);
      $this->db->update('settings');
      redirect('admin/setting','refresh');
    }
    $this->template->admin_render('admin/setting/create', $this->data);
  }

  public function udpate()
  { 
    $keynew=$this->input->post('key');
    $valuenew=$this->input->post('value');
    $decodedate= array();
    $alldate=$this->db->get('settings')->row();
    foreach (json_decode($alldate->data) as $key => $value) {
      if($keynew==$key){
        $value=$valuenew;
      }
      $new = array($key=>$value);
      $decodedate=array_merge($decodedate, $new);
    }

    $this->db->set('data',json_encode($decodedate));
    $this->db->where('id', 1);
    $this->db->update('settings');
    return redirect('admin/setting','refresh');
  }

  public function delete($keyaaa='')
  {
    $keynew=$keyaaa;
    $decodedate= array();
    $alldate=$this->db->get('settings')->row();
    foreach (json_decode($alldate->data) as $key => $value) {
      if($keynew==$key){
        continue;
      }else{
        $new = array($key=>$value);
        $decodedate=array_merge($decodedate, $new);
      }
    }
    $this->db->set('data',json_encode($decodedate));
    $this->db->where('id', 1);
    $this->db->update('settings');
    return redirect('admin/setting','refresh');
  }

  public function edit($id='')
  {
    if($id!=1){
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->db->where('id', $id);
      $this->data['sssssss']=$this->db->get('settings')->row();
      $this->template->admin_render('admin/setting/edit', $this->data);
    }else{
      echo "You do not have purmissition to edit";
    }
  }

  public function update($id='')
  {
    $data=$this->input->post('content');
    $this->db->set("data",$data);
    $this->db->where('id', $id);
    $this->db->update('settings');
    return redirect('/admin/setting/settingother','refresh');
  }

}

/* End of file Setting.php */
/* Location: ./application/controllers/admin/Setting.php */