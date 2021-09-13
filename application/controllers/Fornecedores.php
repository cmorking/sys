<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Fornecedores extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Fornecedores Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'fornecedores' => $this->core_model->get_all('fornecedores'),
        );

//		echo '<pre>';
//		print_r($data['fornecedores']);
//		exit();


        $this->load->view('layout/header', $data);
        $this->load->view('fornecedores/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('fornecedor_razao', 'Razao Social', 'trim|required');
        $this->form_validation->set_rules('fornecedor_nome', 'Nome', 'trim|required');
        $this->form_validation->set_rules('fornecedor_contato', 'Contato', 'trim|required');


        $fornecedor_tipo = $this->input->post('fornecedor_tipo');

        if ($fornecedor_tipo == 1) {
            $this->form_validation->set_rules('fornecedor_cpf', 'CPF', 'trim|required|is_unique[Fornecedores.fornecedor_cpf_cnpj]|callback_valida_cpf');
        } else {
            $this->form_validation->set_rules('fornecedor_cnpj', 'CNPJ', 'trim|required|is_unique[Fornecedores.fornecedor_cpf_cnpj]|callback_valida_cnpj');
        }


        $this->form_validation->set_rules('fornecedor_rg_ie', 'RG/I.E.', 'trim|is_unique[Fornecedores.fornecedor_rg_ie]|required');

        $this->form_validation->set_rules('fornecedor_email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('fornecedor_telefone', 'Fone', 'trim|required');
        $this->form_validation->set_rules('fornecedor_celular', 'Celular', 'trim|required');
        $this->form_validation->set_rules('fornecedor_cep', 'Cep', 'trim|required');
        $this->form_validation->set_rules('fornecedor_numero_endereco', 'Endereço, num', 'trim|required');
        $this->form_validation->set_rules('fornecedor_bairro', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('fornecedor_complemento', 'Complemento', 'trim|required');
        $this->form_validation->set_rules('fornecedor_cidade', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('fornecedor_estado', 'UF', 'trim|required');
        $this->form_validation->set_rules('fornecedor_obs', 'Observação', 'trim|required');


        if ($this->form_validation->run()) {



            $data = elements(
                    array(
                'fornecedor_nome',
                'fornecedor_razao',
                'fornecedor_rg_ie',
                'fornecedor_email',
                'fornecedor_telefone',
                'fornecedor_celular',
                'fornecedor_ativo',
                'fornecedor_endereco',
                'fornecedor_numero_endereco',
                'fornecedor_complemento',
                'fornecedor_bairro',
                'fornecedor_cep',
                'fornecedor_cidade',
                'fornecedor_estado',
                'fornecedor_obs',
                'fornecedor_tipo',
                    ), $this->input->post()
            );

            if ($fornecedor_tipo == 1) {

                $data['fornecedor_cpf_cnpj'] = $this->input->post('fornecedor_cpf');
            } else {

                $data['fornecedor_cpf_cnpj'] = $this->input->post('fornecedor_cnpj');
            }

            $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));


            $data = html_escape($data);

            $this->core_model->insert('Fornecedores', $data);

            redirect('Fornecedores');
        } else {

            // erro de validação

            $data = array(
                'titulo' => 'Cadastrar Fornecedor',
                'scripts' => array(
                    'vendor/mask/jquery.mask.min.js',
                    'vendor/mask/app.js',
                    'js/clientes.js',
                ),
            );




            $this->load->view('layout/header', $data);
            $this->load->view('Fornecedores/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($fornecedor_id = null) {

        if (!$fornecedor_id || !$this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id))) {

            $this->session->set_flashdata('error', 'Fornecedor não Encontrado');

            redirect('fornecedores');
        } else {



            $this->form_validation->set_rules('fornecedor_razao', 'Razao Social', 'trim|required');
            $this->form_validation->set_rules('fornecedor_nome', 'Nome', 'trim');
            $this->form_validation->set_rules('fornecedor_contato', 'Contato', 'trim|required');


            $fornecedor_tipo = $this->input->post('fornecedor_tipo');

            if ($fornecedor_tipo == 1) {
                $this->form_validation->set_rules('fornecedor_cpf', 'CPF', 'trim|required|callback_valida_cpf');
            } else {
                $this->form_validation->set_rules('fornecedor_cnpj', 'CNPJ', 'trim|required|callback_valida_cnpj');
            }


            $this->form_validation->set_rules('fornecedor_rg_ie', 'RG/I.E.', 'trim|required|callback_check_rg_ie');

            $this->form_validation->set_rules('fornecedor_email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('fornecedor_telefone', 'Fone', 'trim|required');
            $this->form_validation->set_rules('fornecedor_celular', 'Celular', 'trim|required');
            $this->form_validation->set_rules('fornecedor_cep', 'Cep', 'trim|required');
            $this->form_validation->set_rules('fornecedor_numero_endereco', 'Endereço, num', 'trim|required');
            $this->form_validation->set_rules('fornecedor_bairro', 'Bairro', 'trim|required');
            $this->form_validation->set_rules('fornecedor_complemento', 'Complemento', 'trim|required');
            $this->form_validation->set_rules('fornecedor_cidade', 'Cidade', 'trim|required');
            $this->form_validation->set_rules('fornecedor_estado', 'UF', 'trim|required');
            $this->form_validation->set_rules('fornecedor_obs', 'Observação', 'trim|required');


            if ($this->form_validation->run()) {
                
                $fornecedor_ativo = $this->input->post('fornecedor_ativo');

                        if($this->db->table_exists('produtos')){
                            
                            if ($fornecedor_ativo == 0 && $this->core_model->get_by_id('produtos', array('produto_fornecedor_id' => $fornecedor_id))) {
                                
                                $this->session->set_flashdata('error', 'Fornecedor está atribuida a um PRODUTO ativo!');
                                redirect('fornecedores');
                            }
                        }

                /*

                  [fornecedor_nome] => Rafael Silva
                  [fornecedor_data_nascimento] => 2020-11-10
                  [fornecedor_cpf] => 024.760.759-22 //explicar
                  [fornecedor_rg_ie] => 9.968.985-87
                  [fornecedor_email] => rafael@gmail.com
                  [fornecedor_telefone] => 41 3333-3333
                  [fornecedor_celular] => 41 99999-9999
                  [fornecedor_ativo] => 1
                  [fornecedor_endereco] => rua da casa dele
                  [fornecedor_numero_endereco] => 171
                  [fornecedor_bairro] => Centro
                  [fornecedor_cep] => 80.060-110
                  [fornecedor_complemento] => Casa 01
                  [fornecedor_cidade] => Curitiba
                  [fornecedor_estado] => PR
                  [fornecedor_obs] => apenas fornecedor teste
                  [ç] => 1
                  [fornecedor_id] => 1

                 */

                $data = elements(
                        array(
                    'fornecedor_razao',
                    'fornecedor_nome',
                    'fornecedor_contato',
                    'fornecedor_rg_ie',
                    'fornecedor_email',
                    'fornecedor_telefone',
                    'fornecedor_celular',
                    'fornecedor_ativo',
                    'fornecedor_endereco',
                    'fornecedor_numero_endereco',
                    'fornecedor_complemento',
                    'fornecedor_bairro',
                    'fornecedor_cep',
                    'fornecedor_cidade',
                    'fornecedor_estado',
                    'fornecedor_obs',
                    'fornecedor_tipo',
                        ), $this->input->post()
                );

                if ($fornecedor_tipo == 1) {

                    $data['fornecedor_cpf_cnpj'] = $this->input->post('fornecedor_cpf');
                } else {

                    $data['fornecedor_cpf_cnpj'] = $this->input->post('fornecedor_cnpj');
                }

                $data['fornecedor_estado'] = strtoupper($this->input->post('fornecedor_estado'));


                $data = html_escape($data);

                $this->core_model->update('Fornecedores', $data, array('fornecedor_id' => $fornecedor_id));

                redirect('fornecedores');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Fornecedor',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'fornecedor' => $this->core_model->get_by_id('fornecedores', array('fornecedor_id' => $fornecedor_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('Fornecedores/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function check_rg_ie($fornecedor_rg_ie) {

        $fornecedor_id = $this->input->post('fornecedor_id');

        if ($this->core_model->get_by_id('Fornecedores', array('fornecedor_rg_ie' => $fornecedor_rg_ie, 'fornecedor_id !=' => $fornecedor_id))) {

            $this->form_validation->set_message('check_rg_ie', 'Este numero de documento já está cadastrado em nosso sistema');
            return false;
        } else {

            return true;
        }
    }

//	public function check_email($fornecedor_email)	{
//
//		$fornecedor_id = $this->input->post('fornecedor_id');
//
//		if ($this->core_model->get_by_id('Fornecedores', array('fornecedor_email' => $fornecedor_email, 'fornecedor_id !=' => $fornecedor_id))) {
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

        if ($this->input->post('fornecedor_id')) {

            $fornecedor_id = $this->input->post('fornecedor_id');

            if ($this->core_model->get_by_id('Fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cpf_cnpj' => $cnpj))) {
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

        if ($this->input->post('fornecedor_id')) {

            $fornecedor_id = $this->input->post('fornecedor_id');

            if ($this->core_model->get_by_id('Fornecedores', array('fornecedor_id !=' => $fornecedor_id, 'fornecedor_cpf_cnpj' => $cpf))) {
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

    public function del($fornecedor_id = null) {

        if (!$fornecedor_id || !$this->core_model->get_by_id('Fornecedores', array('fornecedor_id' => $fornecedor_id))) {

            $this->session->set_flashdata('error', 'fornecedor não Encontrado');
            redirect('Fornecedores');
        } else {

            $this->core_model->delete('Fornecedores', array('fornecedor_id' => $fornecedor_id));
            $this->session->set_flashdata('sucesso', 'fornecedor deletado com sucesso');
            redirect('Fornecedores');
        }
    }

}
