<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Servicos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Serviços Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'servicos' => $this->core_model->get_all('servicos'),
        );




        $this->load->view('layout/header', $data);
        $this->load->view('servicos/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('servico_nome', 'Nome', 'trim|is_unique[servicos.servico_nome]');
        $this->form_validation->set_rules('servico_preco', 'Preço', 'trim');
        $this->form_validation->set_rules('servico_descricao', 'Descricao', 'trim');






        if ($this->form_validation->run()) {



            $data = elements(
                    array(
                'servico_nome',
                'servico_preco',
                'servico_descricao',
                'servico_ativo',
                    ), $this->input->post()
            );



            $data = html_escape($data);

            $this->core_model->insert('servicos', $data);

            redirect('servicos');
        } else {

            // erro de validação

            $data = array(
                'titulo' => 'Adicionar Serviço',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
            );



            $this->load->view('layout/header', $data);
            $this->load->view('servicos/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($servico_id = null) {

        if (!$servico_id || !$this->core_model->get_by_id('servicos', array('servico_id' => $servico_id))) {

            $this->session->set_flashdata('error', 'Serviço não Encontrado');

            redirect('servicos');
        } else {

            $this->form_validation->set_rules('servico_nome', 'Nome', 'trim');
            $this->form_validation->set_rules('servico_preco', 'Preço', 'trim');
            $this->form_validation->set_rules('servico_descricao', 'Descricao', 'trim');





            if ($this->form_validation->run()) {



                $data = elements(
                        array(
                    'servico_nome',
                    'servico_preco',
                    'servico_descricao',
                    'servico_ativo',
                        ), $this->input->post()
                );

//        		echo'<pre>';
//		print_r($data['servicos']);
//		exit();


                $data = html_escape($data);

                $this->core_model->update('servicos', $data, array('servico_id' => $servico_id));

                redirect('servicos');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Serviço',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'servico' => $this->core_model->get_by_id('servicos', array('servico_id' => $servico_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('servicos/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($servico_id = null) {

        if (!$servico_id || !$this->core_model->get_by_id('Servicos', array('servico_id' => $servico_id))) {

            $this->session->set_flashdata('error', 'Serviço não Encontrado');
            redirect('Servicos');
        } else {

            $this->core_model->delete('Servicos', array('servico_id' => $servico_id));
            $this->session->set_flashdata('sucesso', 'servico deletado com sucesso');
            redirect('Servicos');
        }
    }

}
