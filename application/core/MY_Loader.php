<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */

//require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends CI_Loader
{

    var $template = '';

    public function __construct()
    {
        parent::__construct();
        $this->_ci_view_paths = array(FCPATH . 'templates/' => TRUE);
    }

    function site_theme($template = '')
    {
        if ($template == '') {
            return FALSE;
        } else {
            $this->template = 'website/' . $template;
            return TRUE;
        }
    }

    function admin_theme($template = '')
    {
        if ($template == '') {
            return FALSE;
        } else {
            $this->template = 'adminpanel/' . $template;
            return TRUE;
        }
    }

    public function view($view, $vars = array(), $return = FALSE)
    {
        if ($this->template != '') {
            return $this->_ci_load(array('_ci_view' => $this->template . '/' . $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        } else {
            return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        }
    }
}