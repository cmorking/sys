<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Pagamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Formas de Pagamentos Cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
        );


//        		echo'<pre>';
//		print_r($data['formas_pagamentos']);
//		exit();

        $this->load->view('layout/header', $data);
        $this->load->view('pagamentos/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('forma_pagamento_nome', 'Forma de Pagamento', 'trim|required|is_unique[formas_pagamentos.forma_pagamento_nome]');


        if ($this->form_validation->run()) {

            $data = elements(
                    array(
                'forma_pagamento_nome',
                'forma_pagamento_ativa',
                'forma_pagamento_aceita_parc',
                    ), $this->input->post()
            );

            $data = html_escape($data);

            $this->core_model->insert('formas_pagamentos', $data);

            redirect('pagamentos');
        } else {

            $data = array(
                'titulo' => 'Adicionar - Formas de Pagamentos ',
            );


            $this->load->view('layout/header', $data);
            $this->load->view('pagamentos/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($forma_pagamento_id = null) {

        if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {

            $this->session->set_flashdata('error', 'Forma de Pagamento não Encontrado');

            redirect('pagamentos');
        } else {


            $this->form_validation->set_rules('forma_pagamento_nome', 'Forma de Pagamento', 'trim|required|callback_check_pagamento_nome');


            if ($this->form_validation->run()) {

                $forma_pagamento_ativa = $this->input->post('forma_pagamento_ativa');

                //para vendas

                if ($this->db->table_exists('vendas')) {

                    if ($forma_pagamento_ativa == 0 && $this->core_model('vendas', array('venda_forma_pagamento_id' => $forma_pagamento_id, 'venda_status' => 0))) {

                        $this->session->set_flashdata('error', 'Forma de Pagamento está em ultização em Vendas');
                        redirect('pagamentos');
                    }
                }

                //para OS

                if ($this->db->table_exists('ordem_servicos')) {

                    if ($forma_pagamento_ativa == 0 && $this->core_model('ordem_servicos', array('ordem_servico_forma_pagamento_id' => $forma_pagamento_id, 'ordem_servico_status' => 0))) {


                        $this->session->set_flashdata('error', 'Forma de Pagamento está em ultização em Ordem de Serviços');
                        redirect('pagamentos');
                    }
                }


                $data = elements(
                        array(
                    'forma_pagamento_nome',
                    'forma_pagamento_ativa',
                    'forma_pagamento_aceita_parc',
                        ), $this->input->post()
                );

                $data = html_escape($data);

                $this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));

                redirect('pagamentos');
            } else {

                $data = array(
                    'titulo' => 'Editar - Formas de Pagamentos ',
                    'forma_pagamento' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
                );


                $this->load->view('layout/header', $data);
                $this->load->view('pagamentos/edit');
                $this->load->view('layout/footer');
            }





// nao deixa desativar
        }
    }

    public function del($forma_pagamento_id = null) {

        if (!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {

            $this->session->set_flashdata('error', 'Forma de Pagamento não Encontrado');
            redirect('pagamentos');
        }

        if ($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id, 'forma_pagamento_ativa' => 1))) {

            $this->session->set_flashdata('error', 'Forma de pagamento está em uso pelo sistema, não pode ser excluida!');
            redirect('pagamentos');
        } else {


            $this->core_model->delete('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));
            $this->session->set_flashdata('sucesso', 'Forma de Pagamento deletada com sucesso');
            redirect('pagamentos');
        }
    }

    public function check_pagamento_nome($forma_pagamento_nome) {

        $forma_pagamento_id = $this->input->post('forma_pagamento_id');

        if ($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))) {

            $this->form_validation->set_message('check_pagamento_nome', 'Forma de Pagamento já está cadastrada no Sistema.');

            return FALSE;
        } else {

            return TRUE;
        }
    }

}
