<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Public_Controller {

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
    $this->db->where('id',$this->ion_auth->user()->row()->id);
    $this->data['user']=$this->db->get('users')->row();
  }

  public function index()
  {
    $this->__randerview('profile/index', $this->data);
  }

  public function exchanges()
  {
    $id=$this->ion_auth->user()->row()->id;
    $this->db->select('currency.*,gateways.*,exchanges.*,exchanges.status as statuss');
    $this->db->join('gateways', 'gateways.id = exchanges.gateway_send');
    $this->db->join('currency', 'currency.currency_id = gateways.currency');
    $this->db->where('exchanges.user_id',$id);
    $this->data['myexchange']=$this->db->get('exchanges')->result();
    $this->__randerview('profile/exchanges', $this->data);
  }

  public function testimonials($value='')
  { 
    $this->db->where('user_id', $this->ion_auth->user()->row()->id);
    $this->data['testmo']=$this->db->get('testimonials')->result();
    $this->__randerview('profile/testimonials', $this->data);
  }

  public function referrals($value='')
  {
     $this->__randerview('profile/testimonials', $this->data);
  }

  public function submit_testimonial($value='')
  {
    $this->form_validation->set_rules('type', 'type', 'required');
    $this->form_validation->set_rules('content', 'content', 'required');
    if ($this->form_validation->run() == TRUE)
    {
      $data = array(
        'type' => $this->input->post('type'), 
        'content' => $this->input->post('content'), 
        'exchange_id' => $this->input->post('exchange_id'), 
        'user_id' => $this->ion_auth->user()->row()->id, 
      );
      $this->db->insert('testimonials', $data);
      redirect('profile/testimonials','refresh');
    }else{
       $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
    }
    $this->__randerview('profile/submit_testimonial', $this->data);
  }

   // edit a user
  public function editprofile($id='')
  {
    if (!$this->ion_auth->logged_in() && !($this->ion_auth->user()->row()->id == $id))
    {
      redirect('auth', 'refresh');
    }
    // validate form input
    $this->form_validation->set_rules('first_name', 'first_name','required');
    $this->form_validation->set_rules('last_name', 'last_name', 'required');
    $this->form_validation->set_rules('phone', 'phone', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');

    if ($this->form_validation->run() == TRUE)
    {
      $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
      $email    = strtolower($this->input->post('email'));
      $password = $this->input->post('password');
      $additional_data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name'  => $this->input->post('last_name'),
        'phone'      => $this->input->post('phone'),
        'email'      => $this->input->post('email'),
      );
      $this->db->where('id', $id);
      $this->db->update('users', $additional_data);
      $this->data['message']="Your Profile Update Successfully";
      $this->db->where('id',$this->ion_auth->user()->row()->id);
      $this->data['user']=$this->db->get('users')->row();
    }else{
      $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
    }
    $this->__randerview('profile/editprofile', $this->data);
  }

  public function changeprofile($id='')
  {
    $config['upload_path']          = './assets/images/users';
    $config['allowed_types']        = '*';
    $config['max_size']             = 100;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('userfile'))
    {
      $this->data['message'] = array('error' => $this->upload->display_errors());
      $this->__randerview('profile/changeprofile', $this->data);
    }
    else
    {
      $dddd =$this->upload->data();
      $this->db->where('id', $id);
      $this->db->set('profile','/users/'.$dddd['file_name']);
      $this->db->update('users');
      $this->db->where('id',$this->ion_auth->user()->row()->id);
      $this->data['user']=$this->db->get('users')->row();
      $this->__randerview('profile/changeprofile', $this->data);
    }
  }

  public function verification($value='')
  {
    $this->db->where('id', $this->ion_auth->user()->row()->id);
    $this->data['users_info']=$this->db->get('users')->row();
    $this->__randerview('profile/verification', $this->data);
  }

  public function document_verified($value='')
  {
    $config['upload_path']          = './assets/images/document';
    $config['allowed_types']        = '*';
    $config['max_size']             = 100;
    $config['max_width']            = 1524;
    $config['max_height']           = 968;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('document_1'))
    {
      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->data['users_info']=$this->db->get('users')->row();
      $this->data['error'] = $this->upload->display_errors();
      $this->__randerview('profile/verification', $this->data);
    }
    else
    {
      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->data['users_info']=$this->db->get('users')->row();

      $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
      $file_name = $upload_data['file_name'];

      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->db->set('document_1',$file_name);
      $this->db->update('users');

      $this->__randerview('profile/verification', $this->data);
    }

    if ( ! $this->upload->do_upload('document_2'))
    {
      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->data['users_info']=$this->db->get('users')->row();
      $this->data['error'] = $this->upload->display_errors();
      $this->__randerview('profile/verification', $this->data);
    }
    else
    {

      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->db->set('document_2',$file_name);
      $this->db->update('users');

      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->data['users_info']=$this->db->get('users')->row();
      $this->__randerview('profile/verification', $this->data);
    }
  }

  public function send() {
    $this->load->library("phpmailer_library");
    $mail = $this->phpmailer_library->load();
    //Enable SMTP debugging. 
    $mail->SMTPDebug = 0;                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    $mail->Host = "smtp.gmail.com";
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = "md.jual1212.ah@gmail.com";                 
    $mail->Password = "Ad009257"; 
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = "ssl";                           
    //Set TCP port to connect to 
    $mail->Port = 465;                                   
    $mail->From = "md.jual1212.ah@gmail.com";
    $mail->FromName = "";
    $mail->smtpConnect(
        array(
          "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
            "allow_self_signed" => true
          )
        )
    );
      
    $hash=md5($this->ion_auth->user()->row()->username);
    $this->db->where('id', $this->ion_auth->user()->row()->id);
    $this->db->set("activation_code",$hash);
    $this->db->update('users');

    $msubject = 'Email verification';
    $message = 'Hello, '.$this->ion_auth->user()->row()->username.' To activate your account and make exchanges need to confirm your email address. Click on the link below:'.base_url().'profile/emailverify/'.$hash.' If you have some problems please feel free to contact with us on';

    $mail->addAddress($this->ion_auth->user()->row()->email, "Recepient Name");
    $mail->isHTML(true);
    $mail->Subject = $msubject;
    $mail->Body = $message;
    if(!$mail->send()) 
    {
      echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
      $this->db->where('id', $this->ion_auth->user()->row()->id);
      $this->data['users_info']=$this->db->get('users')->row();
      $this->data['emailmessage']="We have send a link to your email. please check your email to varify email";
      $this->__randerview('profile/verification', $this->data);
    }
  }

  public function emailverify($value='')
  { 
    $this->db->where('activation_code', $value);
    $this->db->set('email_verified',1);
    $this->db->update('users');
    redirect('/profile');
  }

}