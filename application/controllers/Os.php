<?php

// Report all errors except E_NOTICE
// This is the default value set in php.ini
error_reporting(E_ALL & ~E_NOTICE);
// For PHP < 5.3 use: E_ALL ^ E_NOTICE
?>

<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Os extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }

        $this->load->model('ordem_servicos_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'OS - Cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'ordens_servicos' => $this->ordem_servicos_model->get_all(),
        );


//        		echo'<pre>';
//		print_r($data['ordens_servicos']);
//		exit();



        $this->load->view('layout/header', $data);
        $this->load->view('os/index');
        $this->load->view('layout/footer');
    }

    public function add() {

        $this->form_validation->set_rules('ordem_servico_cliente_id', '', 'required');
        $this->form_validation->set_rules('ordem_servico_equipamento', 'Equipamento', 'trim|required');
        $this->form_validation->set_rules('ordem_servico_marca_equipamento', 'Marca', 'trim|required');
        $this->form_validation->set_rules('ordem_servico_modelo_equipamento', 'Modelo ', 'trim');
        $this->form_validation->set_rules('ordem_servico_acessorios', 'Acessorios Adicionais', 'trim|required');
        $this->form_validation->set_rules('ordem_servico_defeito', 'Defeito Relatado', 'trim|required');




        if ($this->form_validation->run()) {

            $ordem_servico_valor_total = str_replace('R$', "", trim($this->input->post('ordem_servico_valor_total')));

            $data = elements(
                    array(
                'ordem_servico_cliente_id',
                'ordem_servico_status',
                'ordem_servico_equipamento',
                'ordem_servico_marca_equipamento',
                'ordem_servico_modelo_equipamento',
                'ordem_servico_acessorios',
                'ordem_servico_defeito',
                'ordem_servico_obs',
                'ordem_servico_valor_desconto',
                'ordem_servico_valor_total',
                    ), $this->input->post());

            $data['ordem_servico_valor_total'] = trim(preg_replace('/\$/', '', $ordem_servico_valor_total));

            $data = html_escape($data);


            $this->core_model->insert('ordens_servicos', $data, TRUE);

            $id_ordem_servico = $this->session->userdata('last_id');

            $servico_id = $this->input->post('servico_id');
            $servico_quantidade = $this->input->post('servico_quantidade');
            $servico_desconto = str_replace('%', '', $this->input->post('servico_desconto'));

            $servico_preco = str_replace('R$', '', $this->input->post('servico_preco'));
            $servico_item_total = str_replace('R$', '', $this->input->post('servico_item_total'));

            $servico_preco = str_replace(',', '', $servico_preco);
            $servico_item_total = str_replace(',', '', $servico_item_total);

            $qty_servico = count($servico_id);

            $ordem_servico_id = $this->input->post('ordem_servico_id');

            for ($i = 0; $i < $qty_servico; $i++) {

                $data = array(
                    'ordem_ts_id_ordem_servico' => $id_ordem_servico,
                    'ordem_ts_id_servico' => $servico_id[$i],
                    'ordem_ts_quantidade' => $servico_quantidade[$i],
                    'ordem_ts_valor_unitario' => $servico_preco[$i],
                    'ordem_ts_valor_desconto' => $servico_desconto[$i],
                    'ordem_ts_valor_total' => $servico_item_total [$i],
                );

                $data = html_escape($data);

                $this->core_model->insert('ordem_tem_servicos', $data);
            }

            //redirect('os/imprimir/' . $id_ordem_servico);
            redirect('os');

          
        } else {

            // erro de validacao

            $data = array(
                'titulo' => 'Cadastrar Ordem de Serviço',
                'styles' => array(
                    'vendor/select2/select2.min.css',
                    'vendor/autocomplete/jquery-ui.css',
                    'vendor/autocomplete/estilo.css',
                ),
                'scripts' => array(
                    'vendor/autocomplete/jquery-migrate.js',
                    'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                    'vendor/calcx/os.js',
                    'vendor/select2/select2.min.js',
                    'vendor/select2/app.js',
                    'vendor/sweetalert2/sweetalert2.js',
                    'vendor/autocomplete/jquery-ui.js',
                ),
                'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
            );



            $this->load->view('layout/header', $data);
            $this->load->view('os/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($ordem_servico_id = null) {

        if (!$ordem_servico_id || !$this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id))) {

            $this->session->set_flashdata('error', 'Ordem de Serviço não Encontrada');

            redirect('os');
        } else {




            $this->form_validation->set_rules('ordem_servico_cliente_id', '', 'required');

            $ordem_servico_status = $this->input->post('ordem_servico_status');

            if ($ordem_servico_status == 1) {
                $this->form_validation->set_rules('ordem_servico_forma_pagamento_id', '', 'required');
            }


            $this->form_validation->set_rules('ordem_servico_equipamento', 'Equipamento', 'trim|required');
            $this->form_validation->set_rules('ordem_servico_marca_equipamento', 'Marca', 'trim|required');
            $this->form_validation->set_rules('ordem_servico_modelo_equipamento', 'Modelo ', 'trim');
            $this->form_validation->set_rules('ordem_servico_acessorios', 'Acessorios Adicionais', 'trim|required');
            $this->form_validation->set_rules('ordem_servico_defeito', 'Defeito Relatado', 'trim|required');




            if ($this->form_validation->run()) {

                $ordem_servico_valor_total = str_replace('R$', "", trim($this->input->post('ordem_servico_valor_total')));

                $data = elements(
                        array(
                    'ordem_servico_cliente_id',
                    'ordem_servico_forma_pagamento_id',
                    'ordem_servico_status',
                    'ordem_servico_equipamento',
                    'ordem_servico_marca_equipamento',
                    'ordem_servico_modelo_equipamento',
                    'ordem_servico_acessorios',
                    'ordem_servico_defeito',
                    'ordem_servico_obs',
                    'ordem_servico_valor_desconto',
                    'ordem_servico_valor_total',
                        ), $this->input->post());

                if ($ordem_servico_status == 0) {
                    unset($data['ordem_servico_forma_pagamento_id']);
                }

                $data['ordem_servico_valor_total'] = trim(preg_replace('/\$/', '', $ordem_servico_valor_total));

                $data = html_escape($data);


                $this->core_model->update('ordens_servicos', $data, array('ordem_servico_id' => $ordem_servico_id));

                $this->ordem_servicos_model->delete_old_services($ordem_servico_id);

                $servico_id = $this->input->post('servico_id');
                $servico_quantidade = $this->input->post('servico_quantidade');
                $servico_desconto = str_replace('%', '', $this->input->post('servico_desconto'));

                $servico_preco = str_replace('R$', '', $this->input->post('servico_preco'));
                $servico_item_total = str_replace('R$', '', $this->input->post('servico_item_total'));

                $servico_preco = str_replace(',', '', $servico_preco);
                $servico_item_total = str_replace(',', '', $servico_item_total);

                $qty_servico = count($servico_id);

                $ordem_servico_id = $this->input->post('ordem_servico_id');

                for ($i = 0; $i < $qty_servico; $i++) {

                    $data = array(
                        'ordem_ts_id_ordem_servico' => $ordem_servico_id,
                        'ordem_ts_id_servico' => $servico_id[$i],
                        'ordem_ts_quantidade' => $servico_quantidade[$i],
                        'ordem_ts_valor_unitario' => $servico_preco[$i],
                        'ordem_ts_valor_desconto' => $servico_desconto[$i],
                        'ordem_ts_valor_total' => $servico_item_total [$i],
                    );

                    $data = html_escape($data);

                    $this->core_model->insert('ordem_tem_servicos', $data);
                }

               // redirect('os/imprimir/' . $ordem_servico_id);
            redirect('os');
      
            } else {

                // erro de validacao

                $data = array(
                    'titulo' => 'Editar Ordem de Serviço',
                    'styles' => array(
                        'vendor/select2/select2.min.css',
                        'vendor/autocomplete/jquery-ui.css',
                        'vendor/autocomplete/estilo.css',
                    ),
                    'scripts' => array(
                        'vendor/autocomplete/jquery-migrate.js',
                        'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                        'vendor/calcx/os.js',
                        'vendor/select2/select2.min.js',
                        'vendor/select2/app.js',
                        'vendor/sweetalert2/sweetalert2.js',
                        'vendor/autocomplete/jquery-ui.js',
                    ),
                    'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
                    'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)),
                    'os_tem_servicos' => $this->ordem_servicos_model->get_all_servicos_by_ordem($ordem_servico_id),
                );

                $ordem_servico = $data['ordem_servico'] = $this->ordem_servicos_model->get_by_id($ordem_servico_id);

                $this->load->view('layout/header', $data);
                $this->load->view('os/edit');
                $this->load->view('layout/footer');
            }
        }
    }

    public function del($ordem_servico_id = null) {

        if (!$ordem_servico_id || !$this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id))) {
            $this->session->set_flashdata('error', 'Ordem de Serviço não Encontrada');
            redirect('os');
        }

        if ($this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id, 'ordem_servico_status' => 0))) {
            $this->session->set_flashdata('error', 'Não é possivel excluir uma Ordem de Serviço em Aberto');
            redirect('os');
        }
        
        $this->core_model->delete('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id));
        redirect('os');
    }

    public function imprimir($ordem_servico_id = null) {

        if (!$ordem_servico_id || !$this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id))) {

            $this->session->set_flashdata('error', 'Ordem de Serviço não Encontrada');

            redirect('os/imprimir');
        } else {

            $data = array(
                'titulo' => 'Escolha uma opção',
                'ordem_servico' => $this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id)),
            );

            $this->load->view('layout/header', $data);
            $this->load->view('os/imprimir');
            $this->load->view('layout/footer');
        }
    }

    public function pdf($ordem_servico_id = null) {

        if (!$ordem_servico_id || !$this->core_model->get_by_id('ordens_servicos', array('ordem_servico_id' => $ordem_servico_id))) {
            $this->session->set_flashdata('error', 'Ordem de Serviço não Encontrada');
            redirect('os');
        } else {
    

            $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

            $ordem_servico = $this->ordem_servicos_model->get_by_id($ordem_servico_id);

            $file_name = 'OS' . $ordem_servico->$ordem_servico_id;

            $html = '<html>';
            $html .= '<head>';

            $html .= '<title>' . $empresa->sistema_razao_social . ' | Impressão de OS </title>';


            $html .= '</head>';

            $html .= '<body style="font-size: 14px">';

            $html .= '<h4 align="left">
         ' . $empresa->sistema_razao_social . '   |   ' . $empresa->sistema_cnpj . '<br/>' . $empresa->sistema_endereco . ', ' . $empresa->sistema_numero . ' ' . $empresa->sistema_cidade . ' ' . $empresa->sistema_estado . ' - ' . $empresa->sistema_cep . '<br/>' . $empresa->sistema_telefone_fixo . ' - ' . $empresa->sistema_telefone_movel . ' | ' . $empresa->sistema_email . '    
                      </h4>';
            $html .= '<hr>';
            $html .= '<p align="right">OS nº ' . $ordem_servico->ordem_servico_id . '</p>';
            $html .= '<p> <strong>Cliente:</strong> ' . $ordem_servico->cliente_nome . ' <br/>
                    <strong>Cpf:</strong>   ' . $ordem_servico->cliente_cpf_cnpj . ' |  <strong>Celular:</strong>   ' . $ordem_servico->cliente_celular . '
                 |  <strong>Email:</strong>   ' . $ordem_servico->cliente_email . '<br/>
                    <strong>Data da OS:</strong>   ' . $ordem_servico->ordem_servico_data_emissao . '<br/>
                    <strong>Forma de Pagamento:</strong>   ' . ($ordem_servico->ordem_servico_status == 1 ? $ordem_servico->forma_pagamento : 'Em Aberto' ) . '
                        

                      </p>';




            // dados do cliente

            $html .= '<hr>';

            // dados da ordem

            $html .= '<table width="100%" border: solid #ddd 1px>';

            $html .= '<tr>';

            $html .= '<th>Serviço</th>';
            $html .= '<th>Quantidade</th>';
            $html .= '<th>Valor Uni</th>';
            $html .= '<th>Desconto</th>';
            $html .= '<th>Valor Total</th>';
            $html .= '</tr>';


            $ordem_servico_id = $ordem_servico->ordem_servico_id;

            $servicos_ordem = $this->ordem_servicos_model->get_all_servicos($ordem_servico_id);

            $valor_final_os = $this->ordem_servicos_model->get_valor_final_os($ordem_servico_id);

            foreach ($servicos_ordem as $servico) :

                $html .= '<tr>';

                $html .= '<td>' . $servico->servico_nome . '</td>';
                $html .= '<td>' . $servico->ordem_ts_quantidade . '</td>';
                $html .= '<td>' . 'R$ ' . $servico->ordem_ts_valor_unitario . '</td>';
                $html .= '<td>' . '% ' . $servico->ordem_ts_valor_desconto . '</td>';
                $html .= '<td>' . 'R$ ' . $servico->ordem_ts_valor_total . '</td>';


                $html .= '</tr>';

            endforeach;

            $html .= '<th colspan="3">';

            $html .= '<td style="border-top: solid #ddd 1px"> <strong>Valor Final </strong></td>';
            $html .= '<td style="border-top: solid #ddd 1px">' . 'R$ ' . $valor_final_os->os_valor_total . ' </td>';

            $html .= '</th>';


            $html .= '</table>';

            $html .= '</body>';

            $html .= '</html>';

            $this->pdf->createPDF($html, $file_name, false);

          
        }
    }

}
