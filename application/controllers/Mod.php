<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Modelo extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
        $this->load->model('produtos_model');
    }
    
}
