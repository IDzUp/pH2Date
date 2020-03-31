<?php

class Admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->users();
    }

    public function users()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('users');
        $crud->columns('profile_photo', 'first_name', 'username', 'email');
        $crud->set_field_upload('profile_photo', 'assets/uploads/member');
        $crud->fields('first_name', 'last_name', 'username', 'email', 'phone', 'sex', 'prefer_opposite_sex', 'profile_photo');
        $crud->edit_fields('first_name', 'last_name', 'username', 'email', 'phone', 'sex', 'prefer_opposite_sex', 'profile_photo', 'ip_address');
        //$crud->callback_insert(array($this,'register_user'));
        $crud->callback_after_insert(array($this, 'update_user_after_insert'));

        $crud->add_fields('first_name', 'last_name', 'username', 'email', 'phone', 'password', 'sex', 'prefer_opposite_sex', 'profile_photo');
        $crud->set_subject('users');
        $output = $crud->render();
        $this->_admin_output($output);
    }

    public function _admin_output($output = null)
    {
        $this->load->view('view.php', $output);
    }

    public function setting()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('setting');
        $crud->unset_texteditor('inject_html_code');
        $crud->unset_add();
        $crud->unset_delete();
        $crud->set_subject('site setting');
        $output = $crud->render();
        $this->_admin_output($output);
    }

    public function update_user_after_insert($post_array, $primary_key)
    {
        $city_data = $this->_city();

        $additional_data['country'] = $city_data['country'];
        $additional_data['state'] = $city_data['state'];
        $additional_data['city'] = $city_data['city'];
        $additional_data['password'] = $post_array['password'];
        $additional_data['active'] = 1;

        $this->ion_auth->update($primary_key, $additional_data);

        return true;
    }

    private function _city()
    {
        $data = json_decode(file_get_contents('https://freegeoip.app/json/'), true);
        $data['country'] = $data['country_name'];
        $data['state'] = $data['region_name'];
        $data['city'] = $data['city'];

        return $data;
    }

    public function register_user($post_array)
    {
        $city_data = $this->_city();

        $additional_data['first_name'] = $post_array['first_name'];
        $additional_data['last_name'] = $post_array['last_name'];
        $additional_data['phone'] = $post_array['phone'];
        $additional_data['sex'] = $post_array['sex'];
        $additional_data['prefer_opposite_sex'] = $post_array['prefer_opposite_sex'];
        $additional_data['profile_photo'] = $post_array['profile_photo'];
        $additional_data['country'] = $city_data['country'];
        $additional_data['state'] = $city_data['state'];
        $additional_data['city'] = $city_data['city'];

        $this->ion_auth->register(
            $post_array['username'],
            $post_array['password'],
            $post_array['email'],
            $additional_data,
            $post_array['group']
        );

        return true;
    }

    public function groups()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('groups');
        $crud->set_subject('user groups');
        $output = $crud->render();
        $this->_admin_output($output);
    }

    public function page()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('page');
        $crud->set_subject('page');
        $output = $crud->render();

        $this->_admin_output($output);
    }

    public function video()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('video');
        $crud->set_subject('video');
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_field_upload('video_file', 'assets/uploads/video');
        $crud->set_field_upload('video_img', 'assets/uploads/video');
        $crud->unset_texteditor('text');
        $output = $crud->render();

        $this->_admin_output($output);
    }

    public function photo()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('photo');
        $crud->set_subject('photo');
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_field_upload('url', 'assets/uploads');
        $crud->unset_texteditor('text');
        $output = $crud->render();

        $this->_admin_output($output);
    }

    public function likes()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('user_likes');
        $crud->set_subject('user likes');
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_relation('liked_user_id', 'users', 'username');
        $crud->unset_add();
        $crud->unset_edit();
        $output = $crud->render();
        $this->_admin_output($output);
    }

    public function matches()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('match');
        $crud->set_subject('matched user');
        $crud->set_relation('user_id', 'users', 'username');
        $crud->set_relation('matched_user_id', 'users', 'username');
        $crud->unset_add();
        $crud->unset_edit();
        $output = $crud->render();
        $this->_admin_output($output);
    }

    public function login()
    {
        if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
            redirect('admin/', 'refresh');
        }

        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            $remember = (bool)$this->input->post('remember');
            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('admin/', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('admin/login', 'refresh');
            }
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->load->view('auth_login', $this->data);
        }
    }

    public function logout()
    {
        $this->ion_auth->logout();
        $this->session->set_flashdata('message', $this->ion_auth->messages());
        redirect('admin/login', 'refresh');
    }
}
