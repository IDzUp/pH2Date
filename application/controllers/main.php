<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Website_Controller
{
    public function index()
    {
        redirect('user/login');
    }

    public function page($id = null)
    {
        if ($id) {
            $this->data['page_content'] = $this->db->get_where('page', array('page_url' => $id))->row();
            if (empty($this->data['page_content'])) {
                redirect('user/login');
            }
        } else {
            redirect('user/login');
        }

        $this->load->view('page', $this->data);
    }

    public function switchLanguage($language = '')
    {
        $language = $language !== '' ? $language : 'english';
        $this->session->set_userdata('site_lang', $language);
        redirect(base_url());
    }
}
