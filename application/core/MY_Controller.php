<?php

class MY_Controller extends CI_Controller {

    /**
     * @var array $data
     */
    protected $data;

    public function __construct() {

        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('image_CRUD');
        $this->load->database();
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->load->helper('language');
        $this->data['setting'] = $this->db->get('setting')->row();


    }

}

class Admin_Controller extends MY_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('grocery_CRUD');
        if (!$this->ion_auth->is_admin() AND $this->uri->segment(2) != "login") {
            redirect('admin/login', 'refresh');
        }

        $this->load->admin_theme('blue');
    }

}

class Website_Controller extends MY_Controller {



    public function __construct() {
        parent::__construct();
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('website',$this->session->userdata('site_lang'));
            $this->lang->load('auth',$this->session->userdata('site_lang'));
        } else {
            $this->lang->load('website','english');
            $this->lang->load('auth','english');
        }
        $this->load->helper('language');

        $newdata['template_site'] = $this->input->get('theme');
        if ($newdata['template_site']) {
            $this->session->set_userdata($newdata);
            redirect(current_url());
        }
       $current_template= ($this->session->userdata('template_site')) ? $this->session->userdata('template_site') : $this->config->item('website_template');


        $this->load->site_theme($current_template);
        $this->current_template_url = base_url("templates/website/".$current_template).'/';

        $this->data['pages'] = $this->db->get('page')->result();
        $this->msg_error_left = $this->session->flashdata('msg_error_left');
        $this->msg_error_right = $this->session->flashdata('msg_error_right');
        $this->msg_success_left = $this->session->flashdata('msg_success_left');
        $this->msg_success_right = $this->session->flashdata('msg_success_right');
        }
}