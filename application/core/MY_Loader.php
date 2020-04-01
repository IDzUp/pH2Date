<?php

class MY_Loader extends CI_Loader
{
    private $template = '';

    public function __construct()
    {
        parent::__construct();
        $this->_ci_view_paths = array(FCPATH . 'templates/' => true);
    }

    public function site_theme($template = '')
    {
        if ($template == '') {
            return false;
        } else {
            $this->template = 'website/' . $template;
            return true;
        }
    }

    public function admin_theme($template = '')
    {
        if ($template == '') {
            return false;
        } else {
            $this->template = 'adminpanel/' . $template;
            return true;
        }
    }

    public function view($view, $vars = array(), $return = false)
    {
        if ($this->template !== '') {
            return $this->_ci_load(array('_ci_view' => $this->template . '/' . $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        }

        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }

    protected function _ci_object_to_array($object)
    {
        return is_object($object) ? get_object_vars($object) : $object;
    }
}
