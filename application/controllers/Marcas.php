<?php

defined('BASEPATH') OR exit('Ação não autorizada.');

class Marcas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão de usuario foi encerrada, efetue um novo login');
            redirect('login');
        }
    }
    
     public function index() {

        $data = array(
            'titulo' => 'Marcas Cadastradas',
            'styles' => array(
            'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'marcas' => $this->core_model->get_all('marcas'),
        );

//	


        $this->load->view('layout/header', $data);
        $this->load->view('marcas/index');
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

                $this->core_model->insert('marcas', $data, array('marca_id' => $marca_id));

                redirect('marcas');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Adicionar Marcas',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    
                );




                $this->load->view('layout/header', $data);
                $this->load->view('marcas/add');
                $this->load->view('layout/footer');
            }
        }
   
    
     public function edit($marca_id = null) {

        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {

            $this->session->set_flashdata('error', 'MArca não Encontrado');

            redirect('marcas');
        } else {

            $this->form_validation->set_rules('nome', 'Nome', 'trim');

            
                 if ($this->form_validation->run()) {
                     
                          $ativa = $this->input->post('ativa');

                        if($this->db->table_exists('produtos')){
                            
                            if ($ativa == 0 && $this->core_model->get_by_id('produtos', array('produto_marca_id' => $marca_id))) {
                                
                                $this->session->set_flashdata('error', 'Marca está atribuida a um PRODUTO ativo!');
                                redirect('marcas');
                            }
                        }



                $data = elements(
                        array(
                    'nome',
                    'ativa',
                        ), $this->input->post()
                );


            
                $data = html_escape($data);

                $this->core_model->update('marcas', $data, array('marca_id' => $marca_id));

                redirect('marcas');
            } else {

                // erro de validação

                $data = array(
                    'titulo' => 'Editar Marcas',
                    'scripts' => array(
                        'vendor/mask/jquery.mask.min.js',
                        'vendor/mask/app.js',
                    ),
                    'marca' => $this->core_model->get_by_id('marcas', array('marca_id' => $marca_id)),
                );




                $this->load->view('layout/header', $data);
                $this->load->view('marcas/edit');
                $this->load->view('layout/footer');
            }
        }
    }
    
    public function del($marca_id = null) {

        if (!$marca_id || !$this->core_model->get_by_id('marcas', array('marca_id' => $marca_id))) {

            $this->session->set_flashdata('error', 'Marca não Encontrado');
            redirect('marcas');
        } else {

            $this->core_model->delete('marcas', array('marca_id' => $marca_id));
            $this->session->set_flashdata('sucesso', 'Marca deletada com sucesso');
            redirect('marcas');
        }
    }
}