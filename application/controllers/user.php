<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Website_Controller
{
    /** @var array */
    private $viewdata;

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $this->_logged_in();
        $this->profile();
    }

    public function profile($user_id = null)
    {
        $this->_logged_in();
        if (!empty($user_id)) {
            $user = $this->db->get_where('users', array('username' => $user_id))->row();
            if (empty($user))
                redirect('user/profile');

            $this->data['user'] = $this->ion_auth->user($user->id)->row();
            $this->data['profile_owner'] = FALSE;
        } else {
            $this->data['user'] = $this->ion_auth->user()->row();
            $this->data['profile_owner'] = true;
        }

        $this->data['liked'] = false;
        $this->data['videos'] = $this->db->get_where('video', array('user_id' => $this->data['user']->user_id))->result();
        $image_crud = new image_CRUD();

        $image_crud->set_primary_key_field('id');
        $image_crud->set_url_field('url');

        $image_crud->set_userid($this->data['user']->id);

        $image_crud->set_table('photo');
        $image_crud->unset_upload();
        $image_crud->unset_delete();
        //$image_crud->where('user_id',1);
        $image_crud->set_image_path('assets/uploads');

        $this->data['output'] = $image_crud->render();
        $image = $this->db->get_where('photo', array('user_id' => $this->data['user']->user_id))->result();

        if (empty($image)) {
            $this->data['output'] = null;
        }

        $this->load->view('my_account', $this->data);
    }

    public function change_passwords()
    {
        //$this->_logged_in();
        $data['password'] = 'password';
        $id = 1;
        //while($id<150){
        $this->ion_auth->update($id, $data);
        //$id++;
        //}
    }

    public function message_box($username = null)
    {
        $this->_logged_in();
        $this->form_validation->set_rules('message', 'message', 'required');
        $other_user = $this->data['other_user'] = $this->db->get_where('users', array('username' => $username))->row();
        if (!empty($other_user)) {
            $username = $other_user->username;
            $my_user = $this->data['my_user'] = $user = $this->ion_auth->user()->row();

            if ($this->form_validation->run() === TRUE) {
                $insert_chat['from'] = $my_user->username;
                $insert_chat['to'] = $username;
                $insert_chat['message'] = str_replace("\n", "<br />", $this->input->post('message', true));
                $insert_chat['sent'] = date('Y-m-d H:m:s');
                $this->db->insert('chat', $insert_chat);
            }


            $this->db->where(array('from' => $username, 'to' => $my_user->username));
            $message = $this->db->get('chat')->result();
            $this->db->where(array('to' => $username, 'from' => $my_user->username));

            $messages = array_merge($message, $this->db->get('chat')->result());
            $new = array();
            $emotions = $this->db->get('emotions')->result();
            foreach ($messages AS $message) {
                foreach ($emotions AS $emotion) {
                    $word = $emotion->word;
                    $img = $emotion->img;
                    $img = "<img src='" . base_url("assets/smilies/$img") . "' />";
                    $message->message = str_replace($word, $img, $message->message);

                }
                $new[$message->id] = $message;
            }

            $this->data['messages'] = $new;
            $this->load->view('message_box', $this->data);
        } else {
            redirect('user/messages');
        }
    }

    public function insert_fake_users()
    {
        $this->_logged_in();
        $data = json_decode(file_get_contents('http://api.randomuser.me/?results=15'), true);

        foreach ($data['results'] as $user) {
            $user = $user['user'];

            $username = $user['username'];
            $email = $user['email'];
            $password = $user['password'];
            $city_data = $this->_city();
            $additional_data = array(
                'first_name' => $user['name']['first'],
                'last_name' => $user['name']['last'],
                'country' => 'United States',
                'state' => $user['location']['state'],
                'city' => $user['location']['city'],
                'sex' => $user['gender'],
                'phone' => $data['phone'],
                'profile_photo' => basename($user['picture']['medium']),
            );


            $filenameOut = './assets/uploads/member/' . basename($user['picture']['medium']);
            $url_image = file_get_contents($user['picture']['medium']);
            $local_image = file_put_contents($filenameOut, $url_image);

            $this->ion_auth->register($username, $password, $email, $additional_data);

        }
    }

    public function recommend()
    {
        $this->_logged_in();

        $recomend = $this->_get_recommendition(false, false, true);
        if (empty($recomend))
            $recomend = $this->_get_recommendition(false, true, false);
        if (empty($recomend))
            $recomend = $this->_get_recommendition(true, false, false);
        if (empty($recomend))
            $recomend = $this->_get_recommendition(false, false, false);

        if (!empty($recomend))
            $this->profile($recomend->username);
        else
            $this->load->view('no_recommend', $this->data);
    }

    public function search()
    {
        $this->_logged_in();

        if ($this->form_validation->run() == false) {
            //setup the input
            $this->data['search'] = array('name' => 'searchkw',
                'id' => 'search',
                'required' => "required",
                'class' => "form-control",
                'style' => "width:70%",
            );

            $this->load->view('search_form', $this->data);
        } else {
            $searchkw = $this->input->post('searchkw', true);
            if (!empty($searchkw)) {
                $this->db->like('username', $searchkw);
                $this->db->or_like('first_name', $searchkw);
                $this->db->or_like('last_name', $searchkw);
                $this->db->or_like('country', $searchkw);
                $this->db->or_like('email', $searchkw);
                $this->db->or_like('phone', $searchkw);
                $this->db->or_like('state', $searchkw);
                $this->db->or_like('city', $searchkw);

                $this->data['users'] = $this->db->get('users')->result();
                $this->load->view('result', $this->data);
            }
        }
    }

    public function delete($confirm = false)
    {
        $this->_logged_in();

        if ($confirm == 'do') {
            if (PH2DATE_DEMOMODE) // Stop that feature if it is on Demo mode
            {
                $this->session->set_flashdata('msg_error_right', "During the Demo More, You can't delete your Account!");
                redirect('user/delete', 'refresh');
            } else {
                $u = $this->ion_auth->user()->row();
                $id = $u->id;
                $this->ion_auth->delete_user($id);
                $this->db->delete('video', array('user_id' => $id));
                $this->db->delete('photo', array('user_id' => $id));
                $this->db->delete('user_likes', array('user_id' => $id));
                $this->ion_auth->logout();
                $this->session->set_flashdata('msg_success_left', lang('delete_successful'));
                redirect('user/login', 'refresh');
            }
        } else {
            $this->load->view('delete', $this->data);
        }
    }

    public function matched()
    {
        $this->_logged_in();
        $user = $this->ion_auth->user()->row();
        $this->db->where('user_id', $user->id);
        $this->db->or_where('matched_user_id', $user->id);
        $matched_users = $this->db->get('match')->result_array();


        $user_list = array();
        if (!empty($matched_users)) {
            foreach ($matched_users AS $users) {
                $user_list[] = $users['user_id'];
                $user_list[] = $users['matched_user_id'];
            }
            $user_list = array_unique($user_list);
        }
        $this->data['users'] = array();
        if (!empty($user_list)) {
            $this->db->where_in('id', $user_list);
            $this->db->where_not_in('id', $user->id);
            $this->data['users'] = $this->db->get('users')->result();
        }

        $this->load->view('matched', $this->data);
    }

    public function messages()
    {
        $this->_logged_in();

        $user = $this->ion_auth->user()->row();
        $this->db->where('from', $user->username);
        $this->db->or_where('to', $user->username);
        $chat_users = $this->db->get('chat')->result_array();
        $user_list = array();
        if (!empty($chat_users)) {
            foreach ($chat_users AS $users) {
                $user_list[] = $users['from'];
                $user_list[] = $users['to'];
            }
            $user_list = array_unique($user_list);
        }
        if (!empty($user_list)) {
            $this->db->where_in('username', $user_list);
            $this->db->where_not_in('id', $user->id);
            $this->data['users'] = $this->db->get('users')->result();
        } else {
            $this->data['users'] = array();
        }


        $this->load->view('messages', $this->data);
    }

    public function like($id = null)
    {
        $this->_logged_in();
        if (!$id) {
            redirect('user/recommend');
        }
        $id = (int)$id;
        $this->_operation($id, 'like');
    }

    function _operation($id, $operation)
    {
        $user = $this->ion_auth->user()->row();
        $otheruser = $this->ion_auth->user($id)->row();
        if ($operation == 'like') {
            $data = array();
            $data['user_id'] = $user->id;
            $data['liked_user_id'] = $id;
            $data['operation'] = 'like';
            $this->db->insert('user_likes', $data);
            $this->session->set_flashdata('msg_success_right', "you liked $otheruser->first_name");
            $where['user_id'] = $id;
            $where['liked_user_id'] = $user->id;
            $liked_user_match = $this->db->get_where('user_likes', $where)->row();
            if (!empty($liked_user_match)) {
                $data = array();
                $data['user_id'] = $user->id;
                $data['matched_user_id'] = $id;
                $this->db->insert('match', $data);

            }
        }
        if ($operation == 'pass') {
            $data = array();
            $data['user_id'] = $user->id;
            $data['liked_user_id'] = $id;
            $data['operation'] = 'pass';
            $this->db->insert('user_likes', $data);
            $this->session->set_flashdata('msg_success_right', "you passed $otheruser->first_name");
        }
        redirect('user/recommend');
    }

    public function pass($id = null)
    {
        $this->_logged_in();
        if (!$id) {
            redirect('user/recommend');
        }
        $id = (int)$id;
        $this->_operation($id, 'pass');
    }

    public function edit_account()
    {
        $this->_logged_in();
        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        $config['upload_path'] = './assets/uploads/member/';
        $config['encrypt_name'] = TRUE; // Encrypt filenames uploaded
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        $user = $this->data['user'] = $this->ion_auth->user()->row();

        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'email' => $this->input->post('email', true),
                'country' => $this->input->post('country', true),
                'state' => $this->input->post('state', true),
                'city' => $this->input->post('city', true),
                'sex' => $this->input->post('sex', true),
                'prefer_opposite_sex' => $this->input->post('prefer_opposite_sex'),
                'phone' => $this->input->post('phone', true),

            );

            if ($this->upload->do_upload('profile_photo')) {
                $data_img = array('upload_data' => $this->upload->data());
                $data['profile_photo'] = $data_img['upload_data']['file_name'];
            }

            $this->ion_auth->update($user->id, $data);
            $this->session->set_flashdata('msg_success_right', "your data updated");
            redirect('user/profile');
        }
        $this->data['user'] = $this->ion_auth->user()->row();

        $this->load->view('edit_account', $this->data);


    }

    function mypic()
    {
        $this->_logged_in();
        $image_crud = new image_CRUD();

        $image_crud->set_primary_key_field('id');
        $image_crud->set_url_field('url');
        $image_crud->set_title_field('title');
        $image_crud->set_userid($this->ion_auth->user()->row()->id);
        $image_crud->set_table('photo');
        //$image_crud->where('user_id',1);
        $image_crud->set_ordering_field('priority')
            ->set_image_path('assets/uploads');

        $this->data['output'] = $image_crud->render();

        $this->load->view('mypic', $this->data);
    }

    public function myvideo()
    {
        $this->_logged_in();

        $user = $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['videos'] = $this->db->get_where('video', array('user_id' => $user->id))->result();
        $this->load->view('myvideo', $this->data);


    }

    function upload_video()
    {
        $this->_logged_in();
        $user = $this->data['user'] = $this->ion_auth->user()->row();
        //$this->form_validation->set_rules('video_file', 'video file', 'required');
        $this->form_validation->set_rules('video_name', 'video name', 'required');

        $config['upload_path'] = './assets/uploads/video/';
        $config['encrypt_name'] = TRUE; // Encrypt filenames uploaded
        $config['allowed_types'] = 'flv|mp4|mpeg|3gp|wmv|gif|jpg|png';
        $config['max_size'] = '999999';

        $this->load->library('upload', $config);

        $user = $this->data['user'] = $this->ion_auth->user()->row();
        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'video_name' => $this->input->post('video_name', true),
                'video_desc' => $this->input->post('video_desc', true),
                'user_id' => $user->id,
            );
            if ($this->upload->do_upload('video_img')) {
                $data_img = array('upload_data' => $this->upload->data());
                $data['video_img'] = $data_img['upload_data']['file_name'];
                $info = new splfileinfo($data['video_img']);
                if (!in_array($info->getextension(), array('gif', 'jpg', 'png'))) {
                    $this->session->set_flashdata('msg_error_right', "image extension not allowed");
                    redirect('user/upload_video');
                }
            } else {
                $this->session->set_flashdata('msg_error_right', "Video image required");
                redirect('user/upload_video');
            }
            if ($this->upload->do_upload('video_file')) {
                $data_img = array('upload_data' => $this->upload->data());
                $data['video_file'] = $data_img['upload_data']['file_name'];
                $info = new splfileinfo($data['video_file']);
                if (!in_array($info->getextension(), array('flv', 'mp4', 'mpeg', '3gp', 'wmv'))) {
                    $this->session->set_flashdata('msg_error_right', "Video extension not allowed");
                    redirect('user/upload_video');
                }
            } else {
                $this->session->set_flashdata('msg_error_right', "Video file required");
                redirect('user/upload_video');
            }


            $this->db->insert('video', $data);
            $this->session->set_flashdata('msg_success_right', "your video uploaded");
            redirect('user/myvideo');
        }
        $upload_err = $this->upload->display_errors();
        if (!empty($upload_err)) {
            $this->session->set_flashdata('msg_error_right', $this->upload->display_errors());
            redirect('user/upload_video');
        }
        $this->load->view('upload_video', $this->data);
    }

    public function video_edit($id = false)
    {
        $this->_logged_in();
        $this->form_validation->set_rules('video_name', 'video name', 'required');
        $user = $this->data['user'] = $this->ion_auth->user()->row();
        if ($this->form_validation->run() === TRUE) {
            $data = array(
                'video_name' => $this->input->post('video_name', true),
                'video_desc' => $this->input->post('video_desc', true),
            );
            $this->db->update('video', $data, array('user_id' => $user->id, 'id' => $id));
            $this->session->set_flashdata('msg_success_right', "your video updated");
            redirect('user/myvideo');
        }
        $this->data['video'] = $this->db->get_where('video', array('id' => $id, 'user_id' => $user->id))->row();
        if (empty($this->data['video'])) {
            redirect('user/myvideo');
        }
        $this->load->view('video_edit', $this->data);
    }

    public function video_delete($id = false)
    {
        $this->_logged_in();
        $user = $this->data['user'] = $this->ion_auth->user()->row();
        $this->db->delete('video', array('id' => $id, 'user_id' => $user->id));
        $this->session->set_flashdata('msg_success_right', "your video Deleted");
        redirect('user/myvideo');
    }

    public function video_watch($id = false)
    {
        $this->_logged_in();
        $user = $this->data['user'] = $this->ion_auth->user()->row();
        $video = $this->data['video'] = $this->db->get_where('video', array('id' => $id, 'user_id' => $user->id))->row();
        if (empty($video)) {
            redirect('user/myvideo');
        }
        $this->data['videos'] = $this->db->get_where('video', array('user_id' => $video->user_id))->result();

        $this->load->view('video_watch', $this->data);
    }

    public function login()
    {
        //$this->data['success'] = message_success
        $this->data['title'] = "Login";
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->ion_auth->logged_in()) {
            redirect('user', 'refresh');
        }
        if ($this->form_validation->run() == true) {
            $remember = (bool)$this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                $this->session->set_flashdata('msg_success_left', $this->ion_auth->messages());

                redirect('/', 'refresh');
            } else {
                $this->session->set_flashdata('msg_error_left', $this->ion_auth->errors());
                redirect('user/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        } else {
            $this->msg_error_left = (validation_errors()) ? validation_errors() : $this->session->flashdata('msg_error_left');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'email',
                'class' => "form-control",
                'required' => "required",
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'required' => "required",
                'class' => "form-control",
            );
            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'type' => 'text',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'type' => 'text',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'email',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('email'),
            );

            $this->data['phone'] = array(
                'name' => 'phone',
                'id' => 'phone',
                'required' => "required",
                'type' => 'tel',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'id' => 'password_confirm',
                'type' => 'password',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/login', $this->data);
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
        if ($this->form_validation->run() == false) {
            //setup the input
            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'required' => "required",
                'class' => "form-control",
                'style' => "width:70%",
            );

            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $this->data['identity_label'] = $this->lang->line('forgot_password_username_identity_label');
            } else {
                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
            }

            //set any errors and display the form
            $this->msg_error_right = (validation_errors()) ? validation_errors() : $this->session->flashdata('msg_error_right');
            $this->_render_page('auth/forgot_password', $this->data);
        } else {
            // get identity from username or email
            if ($this->config->item('identity', 'ion_auth') == 'username') {
                $identity = $this->ion_auth->where('username', strtolower($this->input->post('email')))->users()->row();
            } else {
                $identity = $this->ion_auth->where('email', strtolower($this->input->post('email')))->users()->row();
            }
            if (empty($identity)) {
                $this->ion_auth->set_message('forgot_password_email_not_found');
                $this->session->set_flashdata('msg_error_right', $this->ion_auth->messages());
                redirect("user/forgot_password", 'refresh');
            }

            //run the forgotten password method to email an activation code to the user
            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

            if ($forgotten) {
                //if there were no errors
                $this->session->set_flashdata('msg_success_right', $this->ion_auth->messages());
                redirect("user/login", 'refresh'); //we should display a confirmation page here instead of the login page
            } else {
                $this->session->set_flashdata('msg_error_right', $this->ion_auth->errors());
                redirect("user/forgot_password", 'refresh');
            }
        }
    }

    public function reset_password($code = NULL)
    {
        if (!$code) {
            show_404();
        }

        $user = $this->ion_auth->forgotten_password_check($code);

        if ($user) {
            //if the code is valid then display the password reset form

            $this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
            $this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

            if ($this->form_validation->run() == false) {
                //display the form

                //set the flash data error message if there is one
                $this->msg_error_right = (validation_errors()) ? validation_errors() : $this->session->flashdata('msg_error_right');

                $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
                $this->data['new_password'] = array(
                    'name' => 'new',
                    'id' => 'new',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['new_password_confirm'] = array(
                    'name' => 'new_confirm',
                    'id' => 'new_confirm',
                    'type' => 'password',
                    'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
                );
                $this->data['user_id'] = array(
                    'name' => 'user_id',
                    'id' => 'user_id',
                    'type' => 'hidden',
                    'value' => $user->id,
                );
                $this->data['csrf'] = $this->_get_csrf_nonce();
                $this->data['code'] = $code;

                //render
                $this->_render_page('auth/reset_password', $this->data);
            } else {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) {

                    //something fishy might be up
                    $this->ion_auth->clear_forgotten_password_code($code);

                    show_error($this->lang->line('error_csrf'));
                } else {
                    // finally change the password
                    $identity = $user->{$this->config->item('identity', 'ion_auth')};

                    $change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

                    if ($change) {
                        //if the password was successfully changed
                        $this->session->set_flashdata('msg_success_right', $this->ion_auth->messages());
                        $this->logout();
                    } else {
                        $this->session->set_flashdata('msg_error_right', $this->ion_auth->errors());
                        redirect('user/reset_password/' . $code, 'refresh');
                    }
                }
            }
        } else {
            //if the code is invalid then send them back to the forgot password page
            $this->session->set_flashdata('msg_error_right', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    public function logout()
    {
        $this->_logged_in();
        $this->ion_auth->logout();
        $this->session->set_flashdata('msg_success_left', $this->ion_auth->messages());
        redirect('user/login', 'refresh');
    }

    public function activate($id, $code = false)
    {
        if ($code !== false) {
            $activation = $this->ion_auth->activate($id, $code);
        } else if ($this->ion_auth->is_admin()) {
            $activation = $this->ion_auth->activate($id);
        }

        if ($activation) {
            //redirect them to the auth page
            $this->session->set_flashdata('msg_success_right', $this->ion_auth->messages());
            redirect("auth", 'refresh');
        } else {
            //redirect them to the forgot password page
            $this->session->set_flashdata('msg_error_right', $this->ion_auth->errors());
            redirect("auth/forgot_password", 'refresh');
        }
    }

    public function deactivate($id = NULL)
    {
        $id = (int)$id;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
        $this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

        if ($this->form_validation->run() == FALSE) {
            // insert csrf check
            $this->data['csrf'] = $this->_get_csrf_nonce();
            $this->data['user'] = $this->ion_auth->user($id)->row();

            $this->_render_page('auth/deactivate_user', $this->data);
        } else {
            // do we really want to deactivate?
            if ($this->input->post('confirm') == 'yes') {
                // do we have a valid request?
                if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                    show_error($this->lang->line('error_csrf'));
                }

                // do we have the right userlevel?
                if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {
                    $this->ion_auth->deactivate($id);
                }
            }

            //redirect them back to the auth page
            redirect('user', 'refresh');
        }
    }

    public function register()
    {
        $this->data['title'] = "Create User";

        if ($this->ion_auth->logged_in()) {
            redirect('user/profile', 'refresh');
        }

        $tables = $this->config->item('tables', 'ion_auth');

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
        $this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean');
        $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

        if ($this->form_validation->run() == true) {
            $username = strtolower($this->input->post('first_name', true)) . ' ' . strtolower($this->input->post('last_name', true));
            $email = strtolower($this->input->post('email', true));
            $password = $this->input->post('password');
            $city_data = $this->_city();
            $additional_data = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'country' => $city_data['country'],
                'state' => $city_data['state'],
                'city' => $city_data['city'],
                'sex' => $this->input->post('sex', true),
                'phone' => $this->input->post('phone', true),
            );


        }
        if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data)) {
            //check to see if we are creating the user
            //redirect them back to the admin page
            $this->session->set_flashdata('msg_success_right', $this->ion_auth->messages());
            redirect("user/login", 'refresh');
        } else {
            //display the create user form
            //set the flash data error message if there is one
            $this->msg_error_right = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'email',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['first_name'] = array(
                'name' => 'first_name',
                'id' => 'first_name',
                'required' => "required",
                'type' => 'text',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name' => 'last_name',
                'id' => 'last_name',
                'required' => "required",
                'type' => 'text',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array(
                'name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'required' => "required",
                'class' => "form-control",
                'value' => $this->form_validation->set_value('email'),
            );

            $this->data['phone'] = array(
                'name' => 'phone',
                'required' => "required",
                'id' => 'phone',
                'type' => 'tel',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('phone'),
            );
            $this->data['password'] = array(
                'name' => 'password',
                'required' => "required",
                'id' => 'password',
                'type' => 'password',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array(
                'name' => 'password_confirm',
                'required' => "required",
                'id' => 'password_confirm',
                'type' => 'password',
                'class' => "form-control",
                'value' => $this->form_validation->set_value('password_confirm'),
            );

            $this->_render_page('auth/login', $this->data);
        }
    }

    public function myinfo()
    {
        $this->_logged_in();

        $id = $this->ion_auth->user()->row()->id;
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->groups()->result_array();
        $currentGroups = $this->ion_auth->get_users_groups($id)->result();

        //validate form input
        $this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
        $this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');

        $this->form_validation->set_rules('groups', $this->lang->line('edit_user_validation_groups_label'), 'xss_clean');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id')) {
                show_error($this->lang->line('error_csrf'));
            }

            $data = array(
                'first_name' => $this->input->post('first_name', true),
                'last_name' => $this->input->post('last_name', true),
                'phone' => $this->input->post('phone', true),
            );

            // Only allow updating groups if user is admin
            if ($this->ion_auth->is_admin()) {
                //Update the groups user belongs to
                $groupData = $this->input->post('groups', true);

                if (isset($groupData) && !empty($groupData)) {

                    $this->ion_auth->remove_from_group('', $id);

                    foreach ($groupData as $grp) {
                        $this->ion_auth->add_to_group($grp, $id);
                    }

                }
            }

            //update the password if it was posted
            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

                $data['password'] = $this->input->post('password');
            }

            if ($this->form_validation->run() === TRUE) {
                $this->ion_auth->update($user->id, $data);

                //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('msg_success_right', 'Info Saved');
                redirect('user', 'refresh');
            }
        }

        //display the edit user form
        $this->data['csrf'] = $this->_get_csrf_nonce();

        //set the flash data error message if there is one
        $this->msg_error_right = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('msg_error_right')));

        //pass the user to the view
        $this->data['user'] = $user;
        $this->data['groups'] = $groups;
        $this->data['currentGroups'] = $currentGroups;

        $this->data['first_name'] = array(
            'name' => 'first_name',
            'id' => 'first_name',
            'type' => 'text',
            'class' => "form-control",
            'value' => $this->form_validation->set_value('first_name', $user->first_name),
        );
        $this->data['last_name'] = array(
            'name' => 'last_name',
            'id' => 'last_name',
            'type' => 'text',
            'class' => "form-control",
            'value' => $this->form_validation->set_value('last_name', $user->last_name),
        );

        $this->data['phone'] = array(
            'name' => 'phone',
            'id' => 'phone',
            'type' => 'text',
            'class' => "form-control",
            'value' => $this->form_validation->set_value('phone', $user->phone),
        );


        $this->_render_page('auth/edit_user', $this->data);
    }

    public function change_password()
    {
        $this->_logged_in();
        $this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
        $this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');


        $user = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == false) {
            //display the form
            //set the flash data error message if there is one
            $this->msg_error_right = (validation_errors()) ? validation_errors() : $this->session->flashdata('msg_error_right');

            $this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
            $this->data['old_password'] = array(
                'name' => 'old',
                'id' => 'old',
                'class' => "form-control",
                'type' => 'password',
            );
            $this->data['new_password'] = array(
                'name' => 'new',
                'id' => 'new',
                'class' => "form-control",
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['new_password_confirm'] = array(
                'name' => 'new_confirm',
                'id' => 'new_confirm',
                'class' => "form-control",
                'type' => 'password',
                'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
            );
            $this->data['user_id'] = array(
                'name' => 'user_id',
                'id' => 'user_id',
                'type' => 'hidden',
                'value' => $user->id,
            );

            //render
            $this->_render_page('change_password', $this->data);
        } else {
            $identity = $this->session->userdata('identity');

            if (PH2DATE_DEMOMODE) // Stop that feature if it is on Demo mode
            {
                $this->session->set_flashdata('msg_error_right', "You can't change the password for the Demo!");
                redirect('user/change_password', 'refresh');
            } else {
                $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

                if ($change) {
                    //if the password was successfully changed
                    $this->session->set_flashdata('msg_success_right', $this->ion_auth->messages());
                    $this->logout();
                } else {
                    $this->session->set_flashdata('msg_error_right', $this->ion_auth->errors());
                    redirect('user/change_password', 'refresh');
                }
            }
        }
    }

    private function _city()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $data = json_decode(file_get_contents("http://freegeoip.net/json/$ip"), true);

        $data['country'] = $data['country_name'];
        $data['state'] = $data['region_name'];
        $data['city'] = $data['city'];
        if (!empty($data)) {
            $data = array();
            $data['country'] = 'other';
            $data['state'] = 'other';
            $data['city'] = 'other';
        }
        return $data;
    }

    private function _get_recommendition($same_country = false, $same_state = false, $same_city = false)
    {
        $user = $this->ion_auth->user()->row();
        $user_likes = $this->db->get_where('user_likes', array('user_id' => $user->id))->result_array();
        $pass = array($user->id);


        if (!empty($user_likes)) {
            foreach ($user_likes AS $likes) {
                $pass[] = $likes['liked_user_id'];
            }
        }

        $this->db->where('user_id', $user->id);
        $this->db->or_where('matched_user_id', $user->id);
        $matched_users = $this->db->get('match')->result_array();


        $user_list = array();
        if (!empty($matched_users)) {
            foreach ($matched_users AS $users) {
                $pass[] = $users['user_id'];
                $pass[] = $users['matched_user_id'];
            }
            $pass = array_unique($pass);
        }

        $this->db->where_not_in('id', $pass);
        if ($user->prefer_opposite_sex) {
            $this->db->where_not_in('sex', array($user->sex));
        }
        if ($same_city)
            $this->db->where('city', $user->city);
        if ($same_state)
            $this->db->where('state', $user->state);
        if ($same_country)
            $this->db->where('country', $user->country);

        $recomend = $this->db->get('users')->row();
        return $recomend;
    }

    private function _render_page($view, $data = null, $render = false)
    {

        $this->viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $this->viewdata, $render);

        if (!$render) {
            return $view_html;
        }
    }

    private function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return array($key => $value);
    }

    private function _valid_csrf_nonce()
    {
        if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
            $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue')
        ) {
            return true;
        }

        return false;
    }

    private function _logged_in()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('user/login', 'refresh');
            return false;
        } else {
            $user = $this->ion_auth->user()->row();

            $_SESSION['username'] = $user->username;
        }

        return true;
    }
}
