<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }
    
     public function index() {

        $data = array(
            'titulo' => 'Categorias Cadastradas',
            'styles' => array(
            'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'categorias' => $this->core_model->get_all('categorias'),
        );

//	


        $this->load->view('layout/header', $data);
        $this->load->view('categorias/index');
        $this->load->view('layout/footer');
    }
    
     public function add() {

                $this->form_validation->set_rules('nome', 'Nome', 'trim');

            
                 if ($this->form_validation->run()) {



                $data = elements(
                        array(
                    'nome',
                    'ativa',
                        ), $this->input->post()
                );


            
                $data = html_escape($data);

                $this->core_model->insert('categorias', $data, array('categoria_id' => $categoria_id));

                redirect('categorias');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Adicionar Categorias',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    
                );




                $this->load->view('layout/header', $data);
                $this->load->view('categorias/add');
                $this->load->view('layout/footer');
            }
        }
   
    
     public function edit($categoria_id = null) {

        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {

            $this->session->set_flashdata('error', 'MArca não Encontrado');

            redirect('categorias');
        } else {

            $this->form_validation->set_rules('nome', 'Nome', 'trim');

            
                 if ($this->form_validation->run()) {
                     
                     $ativa = $this->input->post('ativa');

                        if($this->db->table_exists('produtos')){
                            
                            if ($ativa == 0 && $this->core_model->get_by_id('produtos', array('produto_categoria_id' => $categoria_id))) {
                                
                                $this->session->set_flashdata('error', 'Categoria está atribuida a um PRODUTO ativo!');
                                redirect('categorias');
                            }
                        }
                            
                            
                            

                $data = elements(
                        array(
                    'nome',
                    'ativa',
                        ), $this->input->post()
                );


            
                $data = html_escape($data);

                $this->core_model->update('categorias', $data, array('categoria_id' => $categoria_id));

                redirect('categorias');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Marcas',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'categoria' => $this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('categorias/edit');
                $this->load->view('layout/footer');
            }
        }
    }
    
    public function del($categoria_id = null) {

        if (!$categoria_id || !$this->core_model->get_by_id('categorias', array('categoria_id' => $categoria_id))) {

            $this->session->set_flashdata('error', 'Marca não Encontrado');
            redirect('categorias');
        } else {

            $this->core_model->delete('categorias', array('categoria_id' => $categoria_id));
            $this->session->set_flashdata('sucesso', 'Marca deletada com sucesso');
            redirect('categorias');
        }
    }
}