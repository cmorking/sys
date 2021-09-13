<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Vendedores extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Tecnicos Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'vendedores' => $this->core_model->get_all('vendedores'),
        );

//	


        $this->load->view('layout/header', $data);
        $this->load->view('vendedores/index');
        $this->load->view('layout/footer');
    }

    public function add() {

  

            $this->form_validation->set_rules('vendedor_nome', 'Nome', 'trim');
            $this->form_validation->set_rules('cpf', 'Cpf', 'trim');
            $this->form_validation->set_rules('rg', 'Rg', 'trim');
            $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
            $this->form_validation->set_rules('celular', 'Celular', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('endereco', 'Endereco', 'trim');
            $this->form_validation->set_rules('numero', 'Numero', 'trim');
            $this->form_validation->set_rules('complemento', 'Complemento', 'trim');
            $this->form_validation->set_rules('bairro', 'Bairro', 'trim');
            $this->form_validation->set_rules('cep', 'Cep', 'trim');
            $this->form_validation->set_rules('cidade', 'Cidade', 'trim');
            $this->form_validation->set_rules('estado', 'Estado', 'trim');



            if ($this->form_validation->run()) {



                $data = elements(
                        array(
                             'codigo',
                    'vendedor_nome',
                    'cpf',
                    'rg',
                    'telefone',
                    'celular',
                    'email',
                    'endereco',
                    'numero',
                    'complemento',
                    'bairro',
                    'cep',
                    'cidade',
                    'estado',
                    'obs',
                    'ativo',
                        ), $this->input->post()
                );


                $data['estado'] = strtoupper($this->input->post('estado'));


                $data = html_escape($data);

                $this->core_model->insert('vendedores', $data);

                redirect('vendedores');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Cadastrar Vendedor',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                   
                    'codigo' => $this->core_model->generate_unique_code('vendedores' , 'numeric', 8, 'codigo'),
                    
                );




                $this->load->view('layout/header', $data);
                $this->load->view('vendedores/add');
                $this->load->view('layout/footer');
            }
    
        
    }

    public function edit($vendedor_id = null) {

        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))) {

            $this->session->set_flashdata('error', 'Fornecedor não Encontrado');

            redirect('vendedores');
        } else {

            $this->form_validation->set_rules('vendedor_nome', 'Nome', 'trim');
            $this->form_validation->set_rules('cpf', 'Cpf', 'trim');
            $this->form_validation->set_rules('rg', 'Rg', 'trim');
            $this->form_validation->set_rules('telefone', 'Telefone', 'trim');
            $this->form_validation->set_rules('celular', 'Celular', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim');
            $this->form_validation->set_rules('endereco', 'Endereco', 'trim');
            $this->form_validation->set_rules('numero', 'Numero', 'trim');
            $this->form_validation->set_rules('complemento', 'Complemento', 'trim');
            $this->form_validation->set_rules('bairro', 'Bairro', 'trim');
            $this->form_validation->set_rules('cep', 'Cep', 'trim');
            $this->form_validation->set_rules('cidade', 'Cidade', 'trim');
            $this->form_validation->set_rules('estado', 'Estado', 'trim');



            if ($this->form_validation->run()) {



                $data = elements(
                        array(
                    'vendedor_nome',
                    'cpf',
                    'rg',
                    'telefone',
                    'celular',
                    'email',
                    'endereco',
                    'numero',
                    'complemento',
                    'bairro',
                    'cep',
                    'cidade',
                    'estado',
                    'obs',
                    'ativo',
                        ), $this->input->post()
                );


                $data['estado'] = strtoupper($this->input->post('estado'));


                $data = html_escape($data);

                $this->core_model->update('vendedores', $data, array('vendedor_id' => $vendedor_id));

                redirect('vendedores');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Tecnico',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'vendedor' => $this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('vendedores/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function check_rg_ie($vendedor_rg_ie) {

        $vendedor_id = $this->input->post('vendedor_id');

        if ($this->core_model->get_by_id('Fornecedores', array('vendedor_rg_ie' => $vendedor_rg_ie, 'vendedor_id !=' => $vendedor_id))) {

            $this->form_validation->set_message('check_rg_ie', 'Este numero de documento já está cadastrado em nosso sistema');
            return false;
        } else {

            return true;
        }
    }

    public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        if ($this->input->post('vendedor_id')) {

            $vendedor_id = $this->input->post('vendedor_id');

            if ($this->core_model->get_by_id('Fornecedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cpf_cnpj' => $cnpj))) {
                $this->form_validation->set_message('valida_cnpj', 'Esse CNPJ já está cadastrado no sistema');
                return FALSE;
            }
        }

        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);


        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cnpj) != 14) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' ||
                $cnpj == '11111111111111' ||
                $cnpj == '22222222222222' ||
                $cnpj == '33333333333333' ||
                $cnpj == '44444444444444' ||
                $cnpj == '55555555555555' ||
                $cnpj == '66666666666666' ||
                $cnpj == '77777777777777' ||
                $cnpj == '88888888888888' ||
                $cnpj == '99999999999999') {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;

            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            $j = 5;
            $k = 6;
            $soma1 = "";
            $soma2 = "";

            for ($i = 0; $i < 13; $i++) {

                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;

                //$soma2 += ($cnpj{$i} * $k);
                //$soma2 = intval($soma2) + ($cnpj{$i} * $k); //Para PHP com versão < 7.4
                $soma2 = intval($soma2) + ($cnpj[$i] * $k); //Para PHP com versão > 7.4

                if ($i < 12) {
                    //$soma1 = intval($soma1) + ($cnpj{$i} * $j); //Para PHP com versão < 7.4
                    $soma1 = intval($soma1) + ($cnpj[$i] * $j); //Para PHP com versão > 7.4
                }

                $k--;
                $j--;
            }

            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;

            if (!($cnpj{12} == $digito1) and ( $cnpj{13} == $digito2)) {
                $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
                return false;
            } else {
                return true;
            }
        }
    }

    public function valida_cpf($cpf) {

        if ($this->input->post('vendedor_id')) {

            $vendedor_id = $this->input->post('vendedor_id');

            if ($this->core_model->get_by_id('Fornecedores', array('vendedor_id !=' => $vendedor_id, 'vendedor_cpf_cnpj' => $cpf))) {
                $this->form_validation->set_message('valida_cpf', 'Este CPF já existe');
                return FALSE;
            }
        }

        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

            $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
            return FALSE;
        } else {
            // Calcula os números para verificar se o CPF é verdadeiro
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    $this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function del($vendedor_id = null) {

        if (!$vendedor_id || !$this->core_model->get_by_id('vendedores', array('vendedor_id' => $vendedor_id))) {

            $this->session->set_flashdata('error', 'Tecnicoß não Encontrado');
            redirect('Vendedores');
        } else {

            $this->core_model->delete('vendedores', array('vendedor_id' => $vendedor_id));
            $this->session->set_flashdata('sucesso', 'Tecnico deletado com sucesso');
            redirect('Vendedores');
        }
    }

}