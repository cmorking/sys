<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Pagar extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }

        $this->load->model('financeiro_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Contas a Pagar Cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js',
            ),
            'contas_pagar' => $this->financeiro_model->get_all_pagar(),
        );

//        
//		echo'<pre>';
//		print_r($data['contas_pagar']);
//		exit();

        /**
         *                       [conta_pagar_id] => 1
          [conta_pagar_fornecedor_id] => 1
          [conta_pagar_data_vencimento] => 2020-11-25
          [conta_pagar_data_pagamento] =>
          [conta_pagar_nome] => Conta de Hospedagem

          [conta_pagar_valor] => 800.00
          [conta_pagar_status] => 0
          [conta_pagar_obs] =>
          [conta_pagar_data_alteracao] => 2020-11-20 12:06:25
          [fornecedor_id] => 1
          [fornecedor] => Sjp Info
         */
//	


        $this->load->view('layout/header', $data);
        $this->load->view('pagar/index');
        $this->load->view('layout/footer');
    }

    public function add() {

            $this->form_validation->set_rules('conta_pagar_fornecedor_id', 'Fornecedor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'Data de Vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_nome', 'Descrição da conta', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'Observação', 'trim');
            
            
            if($this->form_validation->run()){
                
                         $data = elements(
                        array(
                    'conta_pagar_fornecedor_id',
                    'conta_pagar_data_vencimento',
                    'conta_pagar_nome',
                    'conta_pagar_obs',
                    'conta_pagar_status',
                    'conta_pagar_valor',
                
            
                    ), $this->input->post()
                );
                         
                         $conta_pagar_status = $this->input->post('conta_pagar_status');
                         
            if($conta_pagar_status == 1){
                
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:s:i');
            }
                             



                $data = html_escape($data);

                $this->core_model->insert('contas_pagar', $data);

                redirect('pagar');
                
            }else {
                
                     $data = array(
                'titulo' => 'Cadastrar Conta a Pagar',
                'styles' => array(
                    'vendor/select2/select2.min.css',
                ),
                'scripts' => array(
                    'vendor/select2/select2.min.js',
                    'vendor/select2/app.js',
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
            
                'fornecedores' => $this->core_model->get_all('fornecedores'),
            );
            $this->load->view('layout/header', $data);
            $this->load->view('pagar/add');
            $this->load->view('layout/footer');
            
            }
            

    }
    
     public function edit($conta_pagar_id = null) {

        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {

            $this->session->set_flashdata('error', 'Conta não Encontrado');

            redirect('pagar');
        } else {

            $this->form_validation->set_rules('conta_pagar_fornecedor_id', 'Fornecedor', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_data_vencimento', 'Data de Vencimento', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_nome', 'Descrição da conta', 'trim|required');
            $this->form_validation->set_rules('conta_pagar_obs', 'Observação', 'trim');
            
            
            if($this->form_validation->run()){
                
                         $data = elements(
                        array(
                    'conta_pagar_fornecedor_id',
                    'conta_pagar_data_vencimento',
                    'conta_pagar_nome',
                    'conta_pagar_obs',
                    'conta_pagar_status',
                    'conta_pagar_valor',
                
            
                    ), $this->input->post()
                );
                         
                         $conta_pagar_status = $this->input->post('conta_pagar_status');
                         
            if($conta_pagar_status == 1){
                
                $data['conta_pagar_data_pagamento'] = date('Y-m-d H:s:i');
            }
                             



                $data = html_escape($data);

                $this->core_model->update('contas_pagar', $data, array('conta_pagar_id' => $conta_pagar_id));

                redirect('pagar');
                
            }else {
                
                     $data = array(
                'titulo' => 'Editar a Pagar Cadastradas',
                'styles' => array(
                    'vendor/select2/select2.min.css',
                ),
                'scripts' => array(
                    'vendor/select2/select2.min.js',
                    'vendor/select2/app.js',
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                ),
                'conta_pagar' => $this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id)),
                'fornecedores' => $this->core_model->get_all('fornecedores'),
            );
            $this->load->view('layout/header', $data);
            $this->load->view('pagar/edit');
            $this->load->view('layout/footer');
            
            }
            

       
        }
    }
    
     public function del($conta_pagar_id = null) {

        if (!$conta_pagar_id || !$this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id))) {

            $this->session->set_flashdata('error', 'Conta não Encontrado');
            redirect('pagar');
        } 
        
        if ($this->core_model->get_by_id('contas_pagar', array('conta_pagar_id' => $conta_pagar_id, 'conta_pagar_status' => 0 ))) {

            $this->session->set_flashdata('error', 'Conta não foi paga, não pode ser excluida!');
            redirect('pagar');
        } else{
            
            
     $this->core_model->delete('contas_pagar', array('conta_pagar_id' => $conta_pagar_id));
            $this->session->set_flashdata('sucesso', 'Conta deletado com sucesso');
            redirect('pagar');
        }
    }

}
