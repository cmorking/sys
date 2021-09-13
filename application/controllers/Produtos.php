<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Produtos extends CI_Controller {

    public function __construct() {

        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
        $this->load->model('produtos_model');
    }

    public function index() {

        $data = array(
            'titulo' => 'Produtos Cadastrados',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'produtos' => $this->produtos_model->get_all(),
        );

//        		echo'<pre>';
//		print_r($data['produtos']);
//		exit();


        $this->load->view('layout/header', $data);
        $this->load->view('produtos/index');
        $this->load->view('layout/footer');
    }

    public function add() {

            $this->form_validation->set_rules('produto_descricao', 'Produto', 'trim|required');
            $this->form_validation->set_rules('produto_unidade', 'Unidade', 'trim|required');
            $this->form_validation->set_rules('produto_preco_custo', 'Preço Custo', 'trim|required');
            $this->form_validation->set_rules('produto_preco_venda', 'Preço de Venda', 'trim|required|callback_check_produto_preco_venda');
            $this->form_validation->set_rules('produto_estoque_minimo', 'Minimo em Estoque', 'trim|greater_than_equal_to[0]');
            $this->form_validation->set_rules('produto_qtde_estoque', 'Quantidade em Estoque', 'trim|greater_than_equal_to[0]');
            $this->form_validation->set_rules('produto_obs', 'Observação', 'trim');

            if ($this->form_validation->run()) {



                $data = elements(
                        array(
                    'produto_codigo',
                    'produto_categoria_id',
                    'produto_marca_id',
                    'produto_fornecedor_id',
                    'produto_descricao',
                    'produto_unidade',
                    'produto_preco_custo',
                    'produto_preco_venda',
                    'produto_estoque_minimo',
                    'produto_qtde_estoque',
                    'produto_ativo',
                    'produto_obs',
                    ), $this->input->post()
                );



                $data = html_escape($data);

                $this->core_model->insert('produtos', $data);

                redirect('produtos');
            } else {

                // erro de validacao

                $data = array(
                    'titulo' => 'Cadastrar  Produto',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'produto_codigo' => $this->core_model->generate_unique_code('produtos', 'numeric', 8, 'produto_codigo'),
                    'marcas' => $this->core_model->get_all('marcas'),
                    'categorias' => $this->core_model->get_all('categorias'),
                    'fornecedores' => $this->core_model->get_all('fornecedores'),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('produtos/add');
                $this->load->view('layout/footer');
            }
        
        
    }
    
     public function edit($produto_id = null) {

        if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {

            $this->session->set_flashdata('error', 'Produto não Encontrado');

            redirect('produtos');
        } else {

            /*

              [produto_codigo] => 72495380
              [produto_data_cadastro] =>
              [produto_categoria_id] => 1
              [produto_marca_id] => 1
              [produto_fornecedor_id] => 1
              [produto_descricao] => Notebook gamer
              [produto_unidade] => UN

              [produto_preco_custo] => 1.800,00
              [produto_preco_venda] => 15.031,00
              [produto_estoque_minimo] => 2
              [produto_qtde_estoque] => 3
              [produto_ativo] => 1
              [produto_obs] =>
             */

            $this->form_validation->set_rules('produto_descricao', 'Produto', 'trim|required');
            $this->form_validation->set_rules('produto_unidade', 'Unidade', 'trim|required');
            $this->form_validation->set_rules('produto_preco_custo', 'Preço Custo', 'trim|required');
            $this->form_validation->set_rules('produto_preco_venda', 'Preço de Venda', 'trim|required|callback_check_produto_preco_venda');
            $this->form_validation->set_rules('produto_estoque_minimo', 'Minimo em Estoque', 'trim|greater_than_equal_to[0]');
            $this->form_validation->set_rules('produto_qtde_estoque', 'Quantidade em Estoque', 'trim|greater_than_equal_to[0]');
            $this->form_validation->set_rules('produto_obs', 'Observação', 'trim');





            if ($this->form_validation->run()) {



                $data = elements(
                        array(
                    'produto_codigo',
                    'produto_categoria_id',
                    'produto_marca_id',
                    'produto_fornecedor_id',
                    'produto_descricao',
                    'produto_unidade',
                    'produto_preco_custo',
                    'produto_preco_venda',
                    'produto_estoque_minimo',
                    'produto_qtde_estoque',
                    'produto_ativo',
                    'produto_obs',
                    ), $this->input->post()
                );



                $data = html_escape($data);

                $this->core_model->update('produtos', $data, array('produto_id' => $produto_id));

                redirect('produtos');
            } else {

                // erro de validacao

                $data = array(
                    'titulo' => 'Editar  Produto',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'produto' => $this->core_model->get_by_id('produtos', array('produto_id' => $produto_id)),
                    'marcas' => $this->core_model->get_all('marcas'),
                    'categorias' => $this->core_model->get_all('categorias'),
                    'fornecedores' => $this->core_model->get_all('fornecedores'),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('produtos/edit');
                $this->load->view('layout/footer');
            }
        }
    }
    
     public function del($produto_id = null) {

        if (!$produto_id || !$this->core_model->get_by_id('produtos', array('produto_id' => $produto_id))) {

            $this->session->set_flashdata('error', 'Produto não Encontrado');
            redirect('produtos');
        } else {

            $this->core_model->delete('produtos', array('produto_id' => $produto_id));
            $this->session->set_flashdata('sucesso', 'Produto deletado com sucesso');
            redirect('produtos');
        }
    }

    public function check_produto_preco_venda($produto_preco_venda) {

        $produto_preco_custo = $this->input->post('produto_preco_custo');

        if ($produto_preco_custo > $produto_preco_venda) {

            $this->form_validation->set_message('check_produto_preco_venda', 'O Preço de Venda não pode ser menor que Preço de Custo');



            return false;
        }

        return true;
    }

}
