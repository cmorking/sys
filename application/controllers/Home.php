<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('home/index');
        $this->load->view('layout/footer');
    }

}
