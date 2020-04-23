<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}


	function index()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}

  public function getloginuser()
  {
    echo json_encode($this->ion_auth->user()->row());
  }

  function login()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');

            if ($this->form_validation->run() == TRUE)
            {
                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    if ( ! $this->ion_auth->is_admin())
                    {
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        redirect('/', 'refresh');
                    }
                    else
                    {
                        /* Data */
                        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                        /* Load Template */
                        $this->template->auth_render('auth/choice', $this->data);
                    }
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
				            redirect('auth/login', 'refresh');
                }
            }
            else
            {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['identity'] = array(
                    'name'        => 'identity',
                    'id'          => 'identity',
                    'type'        => 'email',
                    'value'       => $this->form_validation->set_value('identity'),
                    'class'       => 'form-control',
                    'placeholder' => lang('auth_your_email')
                );
                $this->data['password'] = array(
                    'name'        => 'password',
                    'id'          => 'password',
                    'type'        => 'password',
                    'class'       => 'form-control',
                    'placeholder' => lang('auth_your_password')
                );

                /* Load Template */
                $this->template->auth_render('auth/login', $this->data);
            }
        }
        else
        {
            redirect('/', 'refresh');
        }
  }
  // aja login
  public function loginajax(){
    $jsonData = array('errors' => array(), 'success' => false, 'check' => false, 'output' => '');
    $rules = array(
      array(
        'field' => 'identity',
        'label' => 'Identity',
        'rules' => 'required'
      ),
      array(
        'field' => 'password',
        'label' => 'password',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
    if ($this->form_validation->run() == TRUE) {
      $jsonData['check'] = true;
      $remember = (bool) $this->input->post('remember');
      if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
      {
        $jsonData['errors']["resmessage"] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $jsonData['success'] = true;
      }
      else
      {
        $jsonData['errors']["resmessage"]=$this->ion_auth->errors();
      }
    }else {
      foreach ($_POST as $key => $value) {
        $jsonData['errors'][$key] = form_error($key);
      }
    }
    echo json_encode($jsonData);
  }

  public function ajaxcreate()
  {
    $jsonData = array('errors' => array(), 'success' => false, 'check' => false, 'output' => '');
    $rules = array(
      array(
        'field' => 'first_name',
        'label' => 'first_name',
        'rules' => 'required'
      ),
      array(
        'field' => 'last_name',
        'label' => 'last_name',
        'rules' => 'required'
      ),
      array(
        'field' => 'username',
        'label' => 'username',
        'rules' => 'required|is_unique[users.username]'
      ),
      array(
        'field' => 'email',
        'label' => 'email',
        'rules' => 'required|is_unique[users.email]'
      ),
      array(
        'field' => 'phone',
        'label' => 'phone',
        'rules' => 'required'
      ),
      array(
        'field' => 'address',
        'label' => 'address',
        'rules' => 'required'
      ),
      array(
        'field' => 'passwords',
        'label' => 'passwords',
        'rules' => 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]'
      ),
      array(
        'field' => 'password_confirm',
        'label' => 'password_confirm',
        'rules' => 'required'
      )
    );
    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters('<p class="text-danger text-left">', '</p>');
       if ($this->form_validation->run() == TRUE)
    {
      $jsonData['check'] = true;
      $username = strtolower($this->input->post('username'));
      $username = str_replace(' ', '', $username);
      $email    = strtolower($this->input->post('email'));
      $password = $this->input->post('passwords');

      $additional_data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name'  => $this->input->post('last_name'),
        'phone'      => $this->input->post('phone'),
        'address'      => $this->input->post('address'),
      );
      if ($this->form_validation->run() == TRUE && $this->ion_auth->register($username, $password, $email, $additional_data))
      {
        $this->session->set_flashdata('message', $this->ion_auth->messages());
         $jsonData['success'] = true;
      }

      $remember=false;
      if ($this->ion_auth->login($email, $password, $remember))
      {
        $jsonData['errors']["resmessage"] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      }
    }
    else
    {
      foreach ($_POST as $key => $value) {
        $jsonData['errors'][$key] = form_error($key);
      }
    }
    echo json_encode($jsonData);
  }

    public function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin')
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}

}
