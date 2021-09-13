<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Sistema extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Editar informações do Sistema',
            'scripts' => array(
                'vendor/mask/jquery.mask.min.js',
                'vendor/mask/app.js',
            ),
            'sistema' => $this->core_model->get_by_id('sistema', array('sistema_id' => 1)),
        );

        /*
         *    [sistema] => stdClass Object
          [sistema_id] => 1
          [sistema_razao_social] => C-KING SISTEMNAS
          [sistema_nome_fantasia] => OSW - CKING
          [sistema_cnpj] => 47.319.849/0001-96
          [sistema_ie] =>
          [sistema_telefone_fixo] => 41 3333-3333
          [sistema_telefone_movel] => 41 99999-9999
          [sistema_email] => contato@cmorking.com.br
          [sistema_site_url] => https://cmorking.com.br/
          [sistema_cep] => 80.060-110
          [sistema_endereco] => Rua Tibagi,
          [sistema_numero] => 20.125
          [sistema_cidade] => Curitiba
          [sistema_estado] => PR
          [sistema_txt_ordem_servico] =>
          [sistema_data_alteracao] => 2020-11-02 17:54:26
         */

        $this->form_validation->set_rules('sistema_razao_social', 'Razão Social', 'required');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome Fantasia', 'required');
        $this->form_validation->set_rules('sistema_cnpj', 'Cnpj', 'required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', 'Inscrição Estadual', 'required');
        $this->form_validation->set_rules('sistema_telefone_fixo', 'Telefone', 'required');
        $this->form_validation->set_rules('sistema_telefone_movel', 'Celular', 'required');
        $this->form_validation->set_rules('sistema_email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('sistema_site_url', 'Site', 'valid_url');
        $this->form_validation->set_rules('sistema_cep', 'Site', 'valid_url');
        $this->form_validation->set_rules('sistema_endereco', 'Endereç', 'required');
        $this->form_validation->set_rules('sistema_numero', 'Número', 'required');
        $this->form_validation->set_rules('sistema_cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('sistema_estado', 'Uf', 'required');
        $this->form_validation->set_rules('sistema_txt_ordem_servico', 'OS', '');






        if ($this->form_validation->run()) {

            /*
             *  [sistema_razao_social] => C-KING SISTEMNAS
              [sistema_nome_fantasia] => OSW - CKING
              [sistema_cnpj] => 47.319.849/0001-96
              [sistema_ie] => isento
              [sistema_telefone_fixo] => 41 3333-3333
              [sistema_telefone_movel] => 41 99999-9999
              [sistema_site_url] => https://cmorking.com.br/
              [sistema_email] => contato@cmorking.com.br
              [sistema_endereco] => Rua Tibagi,
              [sistema_numero] => 20.125
              [sistema_cep] => 80.060-110
              [sistema_cidade] => Curitiba
              [sistema_estado] => PR
              [sistema_txt_ordem_servico] =>
              )
             */

//					echo'<pre>';
//					print_r($this->input->post());
//					exit();

            $data = elements(
                    array(
                'sistema_razao_social',
                'sistema_nome_fantasia',
                'sistema_cnpj',
                'sistema_ie',
                'sistema_telefone_fixo',
                'sistema_telefone_movel',
                'sistema_site_url',
                'sistema_email',
                'sistema_endereco',
                'sistema_numero',
                'sistema_cep',
                'sistema_cidade',
                'sistema_estado',
                'sistema_txt_ordem_servico',
                    ), $this->input->post()
            );

            $data = html_escape($data);

            $this->core_model->update('sistema', $data, array('sistema_id' => 1));

            redirect('sistema');
        } else {

            // erro de validacao

            $this->load->view('layout/header', $data);
            $this->load->view('sistema/index');
            $this->load->view('layout/footer');
        }
    }

}
