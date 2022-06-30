<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ErrorContent extends CI_Controller
{
    public function notfound()
    {
        $data['title'] = "Not Found";
        $this->load->view('errors/error-404', $data);
    }

    public function forbidden()
    {
        $data['title'] = "forbidden";
        $this->load->view('errors/error-403', $data);
    }
}
