<?php

error_reporting(E_ALL & ~E_NOTICE);

defined('BASEPATH') OR exit('Ação não autorizada.');

class Vendas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }

        $this->load->model('vendas_model');
        $this->load->model('produtos_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Vendas - Cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'vendas' => $this->vendas_model->get_all(),
        );


//        		echo'<pre>';
//		print_r($data['ordens_servicos']);
//		exit();



        $this->load->view('layout/header', $data);
        $this->load->view('vendas/index');
        $this->load->view('layout/footer');
    }
    
    public function edit($venda_id = null) {

        if (!$venda_id || !$this->core_model->get_by_id('vendas', array('venda_id' => $venda_id))) {

            $this->session->set_flashdata('error', 'Venda não Encontrada');

            redirect('vendas');
        } else {
            
              //Atualização de estoque
                 $venda_produtos = $data['venda_produtos'] = $this->vendas_model->get_all_produtos_by_venda($venda_id);  
           

            $this->form_validation->set_rules('venda_cliente_id', '', 'required');
            $this->form_validation->set_rules('venda_tipo', '', 'required');
            $this->form_validation->set_rules('venda_forma_pagamento_id', '', 'required');
            $this->form_validation->set_rules('venda_vendedor_id', '', 'required');
         

            if ($this->form_validation->run()) {

                $venda_valor_total = str_replace('R$', "", trim($this->input->post('venda_valor_total')));

                $data = elements(
                        array(
                    'venda_cliente_id',
                    'venda_forma_pagamento_id',
                    'venda_tipo',
                    'venda_vendedor_id',
                    'venda_valor_desconto',
                    'venda_valor_total',
                        ), $this->input->post());

                $data['venda_valor_total'] = trim(preg_replace('/\$/', '', $venda_valor_total));

                $data = html_escape($data);

                $this->core_model->update('vendas', $data, array('venda_id' => $venda_id));

                $this->vendas_model->delete_old_products($venda_id);

                $produto_id = $this->input->post('produto_id');
                
                $produto_quantidade = $this->input->post('produto_quantidade');
                $produto_desconto = str_replace('%', '', $this->input->post('produto_desconto'));

                $produto_preco_venda = str_replace('R$', '', $this->input->post('produto_preco_venda'));
                $produto_item_total = str_replace('R$', '', $this->input->post('produto_item_total'));

                $produto_preco_venda = str_replace(',', '', $produto_preco_venda);
                $produto_item_total = str_replace(',', '', $produto_item_total);

                $qty_produto = count($produto_id);
              
                for ($i = 0; $i < $qty_produto; $i++) {
                     $data = array(
                        'venda_produto_id_venda' => $venda_id,
                        'venda_produto_id_produto' => $produto_id[$i],
                        'venda_produto_quantidade' => $produto_quantidade[$i],
                        'venda_produto_valor_unitario' => $produto_preco_venda[$i],
                        'venda_produto_desconto' => $produto_desconto[$i],
                        'venda_produto_valor_total' => $produto_item_total [$i],
                    );
                    

 

                    $data = html_escape($data);

                    $this->core_model->insert('venda_produtos', $data);
                   
                    /* inicio atualização estoque*/ 
                    
                    foreach ($venda_produtos as $venda_p) {
                        
                        if ($venda_p->venda_produto_quantidade < $produto_quantidade[$i]){
                        
                            $produto_qtde_estoque = 0;
                            
                            $produto_qtde_estoque += intval($produto_quantidade[$i]);
                            
                            $diferenca = ($produto_qtde_estoque - $venda_p->venda_produto_quantidade);
                            
                            $this->produtos_model->update($produto_id[$i], $diferenca);
                            
                        }
                                                
                    }
                    
                    
                    
                
                    /* fim atualização estoque*/     
                    } // fim for

                    
                    
                    
                    //  redirect('vendas/imprimir/' . $ordem_servico_id);

                redirect('vendas');
            } else {

                // erro de validacao

                $data = array(
                    'titulo' => 'Atualizar Venda',
                    'styles' => array(
                        'vendor/select2/select2.min.css',
                        'vendor/autocomplete/jquery-ui.css',
                        'vendor/autocomplete/estilo.css',
                    ),
                    'scripts' => array(
                        'vendor/autocomplete/jquery-migrate.js',
                        'vendor/calcx/jquery-calx-sample-2.2.8.min.js',
                        'vendor/calcx/venda.js',
                        'vendor/select2/select2.min.js',
                        'vendor/select2/app.js',
                        'vendor/sweetalert2/sweetalert2.js',
                        'vendor/autocomplete/jquery-ui.js',
                    ),
                    'clientes' => $this->core_model->get_all('clientes', array('cliente_ativo' => 1)),
                    'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)),
                    'vendedores' => $this->core_model->get_all('vendedores', array('ativo' => 1)),
                    'venda_produtos' => $this->vendas_model->get_all_produtos_by_venda($venda_id),
                    'venda'=> $this->vendas_model->get_by_id($venda_id),
             
                );
                
//                        		echo'<pre>';
//		print_r($data['venda_produtos']);
//		exit();

                $this->load->view('layout/header', $data);
                $this->load->view('vendas/edit');
                $this->load->view('layout/footer');
            }
        }
    }
}