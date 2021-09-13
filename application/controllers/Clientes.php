<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Clientes extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Clientes Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'clientes' => $this->core_model->get_all('clientes'),
        );

//		echo '<pre>';
//		print_r($data['clientes']);
//		exit();


        $this->load->view('layout/header', $data);
        $this->load->view('clientes/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('cliente_nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cliente_data_nascimento', 'Data Nacimento', 'required');

        $cliente_tipo = $this->input->post('cliente_tipo');

        if ($cliente_tipo == 1) {
            $this->form_validation->set_rules('cliente_cpf', 'CPF', 'trim|required|is_unique[clientes.cliente_cpf_cnpj]|callback_valida_cpf');
        } else {
            $this->form_validation->set_rules('cliente_cnpj', 'CNPJ', 'trim|required|is_unique[clientes.cliente_cpf_cnpj]|callback_valida_cnpj');
        }


        $this->form_validation->set_rules('cliente_rg_ie', 'RG/I.E.', 'trim|is_unique[clientes.cliente_rg_ie]|required');

        $this->form_validation->set_rules('cliente_email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('cliente_telefone', 'Fone', 'trim|required');
        $this->form_validation->set_rules('cliente_celular', 'Celular', 'trim|required');
        $this->form_validation->set_rules('cliente_cep', 'Cep', 'trim|required');
        $this->form_validation->set_rules('cliente_numero_endereco', 'Endereço, num', 'trim|required');
        $this->form_validation->set_rules('cliente_bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('cliente_complemento', 'Complemento', 'trim|required');
        $this->form_validation->set_rules('cliente_cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('cliente_estado', 'UF', 'trim|required');
        $this->form_validation->set_rules('cliente_obs', 'Observação', 'trim|required');


        if ($this->form_validation->run()) {



            $data = elements(
                    array(
                'cliente_nome',
                'cliente_data_nascimento',
                'cliente_rg_ie',
                'cliente_email',
                'cliente_telefone',
                'cliente_celular',
                'cliente_ativo',
                'cliente_endereco',
                'cliente_numero_endereco',
                'cliente_complemento',
                'cliente_bairro',
                'cliente_cep',
                'cliente_cidade',
                'cliente_estado',
                'cliente_obs',
                'cliente_tipo',
                    ), $this->input->post()
            );

            if ($cliente_tipo == 1) {

                $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cpf');
            } else {

                $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cnpj');
            }

            $data['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));


            $data = html_escape($data);

            $this->core_model->insert('clientes', $data);

            redirect('clientes');
        } else {

            // erro de validação

            $data = array(
                'titulo' => 'Cadastrar Clientes',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js',
                ),
            );




            $this->load->view('layout/header', $data);
            $this->load->view('clientes/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($cliente_id = null) {

        if (!$cliente_id || !$this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id))) {

            $this->session->set_flashdata('error', 'Cliente não Encontrado');

            redirect('clientes');
        } else {



            $this->form_validation->set_rules('cliente_nome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('cliente_data_nascimento', 'Data Nacimento', 'required');

            $cliente_tipo = $this->input->post('cliente_tipo');

            if ($cliente_tipo == 1) {
                $this->form_validation->set_rules('cliente_cpf', 'CPF', 'trim|required|callback_valida_cpf');
            } else {
                $this->form_validation->set_rules('cliente_cnpj', 'CNPJ', 'trim|required|callback_valida_cnpj');
            }


            $this->form_validation->set_rules('cliente_rg_ie', 'RG/I.E.', 'trim|required|callback_check_rg_ie');

            $this->form_validation->set_rules('cliente_email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('cliente_telefone', 'Fone', 'trim|required');
            $this->form_validation->set_rules('cliente_celular', 'Celular', 'trim|required');
            $this->form_validation->set_rules('cliente_cep', 'Cep', 'trim|required');
            $this->form_validation->set_rules('cliente_numero_endereco', 'Endereço, num', 'trim|required');
            $this->form_validation->set_rules('cliente_bairro', 'Bairro', 'trim|required');
            $this->form_validation->set_rules('cliente_complemento', 'Complemento', 'trim|required');
            $this->form_validation->set_rules('cliente_cidade', 'Cidade', 'trim|required');
            $this->form_validation->set_rules('cliente_estado', 'UF', 'trim|required');
            $this->form_validation->set_rules('cliente_obs', 'Observação', 'trim|required');


            if ($this->form_validation->run()) {
                
                $cliente_ativo = $this->input->post('cliente_ativo');
                
                    if($this->db->table_exists('contas_receber')){
                            
                            if ($cliente_ativo == 0 && $this->core_model->get_by_id('contas_receber', array('conta_receber_cliente_id' => $cliente_id, 'conta_receber_status' => 0))) {
                                
                                $this->session->set_flashdata('error', 'Cliente está atribuida a uma Conta a Receber ativa!');
                                redirect('clientes');
                            }
                        }



                $data = elements(
                        array(
                    'cliente_nome',
                    'cliente_data_nascimento',
                    'cliente_rg_ie',
                    'cliente_email',
                    'cliente_telefone',
                    'cliente_celular',
                    'cliente_ativo',
                    'cliente_endereco',
                    'cliente_numero_endereco',
                    'cliente_complemento',
                    'cliente_bairro',
                    'cliente_cep',
                    'cliente_cidade',
                    'cliente_estado',
                    'cliente_obs',
                    'cliente_tipo',
                        ), $this->input->post()
                );

                if ($cliente_tipo == 1) {

                    $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cpf');
                } else {

                    $data['cliente_cpf_cnpj'] = $this->input->post('cliente_cnpj');
                }

                $data['cliente_estado'] = strtoupper($this->input->post('cliente_estado'));


                $data = html_escape($data);

                $this->core_model->update('clientes', $data, array('cliente_id' => $cliente_id));

                redirect('clientes');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Clientes',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'cliente' => $this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('clientes/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function check_rg_ie($cliente_rg_ie) {

        $cliente_id = $this->input->post('cliente_id');

        if ($this->core_model->get_by_id('clientes', array('cliente_rg_ie' => $cliente_rg_ie, 'cliente_id !=' => $cliente_id))) {

            $this->form_validation->set_message('check_rg_ie', 'Este numero de documento já está cadastrado em nosso sistema');
            return false;
        } else {

            return true;
        }
    }

//	public function check_email($cliente_email)	{
//
//		$cliente_id = $this->input->post('cliente_id');
//
//		if ($this->core_model->get_by_id('clientes', array('cliente_email' => $cliente_email, 'cliente_id !=' => $cliente_id))) {
//
//			$this->form_validation->set_message('check_email', 'Este endereço de e-mail, já está cadastrado em nosso sistema');
//			return false;
//
//		} else {
//
//			return true;
//		}
//	}

    public function valida_cnpj($cnpj) {

        // Verifica se um número foi informado
        if (empty($cnpj)) {
            $this->form_validation->set_message('valida_cnpj', 'Por favor digite um CNPJ válido');
            return false;
        }

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cnpj))) {
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

        if ($this->input->post('cliente_id')) {

            $cliente_id = $this->input->post('cliente_id');

            if ($this->core_model->get_by_id('clientes', array('cliente_id !=' => $cliente_id, 'cliente_cpf_cnpj' => $cpf))) {
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

    public function del($cliente_id = null) {

        if (!$cliente_id || !$this->core_model->get_by_id('clientes', array('cliente_id' => $cliente_id))) {

            $this->session->set_flashdata('error', 'Cliente não Encontrado');
            redirect('clientes');
        } else {

            $this->core_model->delete('clientes', array('cliente_id' => $cliente_id));
            $this->session->set_flashdata('sucesso', 'Cliente deletado com sucesso');
            redirect('clientes');
        }
    }

}
