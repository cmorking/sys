

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>

        <?php if ($message = $this->session->flashdata('error')): ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> <i class="fas fa-exclamation-triangle"></i> &nbsp;<?= $message ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>

        <?php if ($message = $this->session->flashdata('sucesso')): ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> <i class="fas fa-check-circle"></i> &nbsp;<?= $message ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php endif; ?>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('receber/add') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-user-tie"></i> &nbsp;&nbsp;Add&nbsp;&nbsp;</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>DescriçãoConta</th>
                                 <th>Valor da Conta</th>
                                 <th>Data Vencimento</th>
                                 <th>Data Pagamento</th>
                                <th class="text-center">Status Pagamento</th>
                                <th class="text-center no-sort">Ações</th>
                            </tr>
                        </thead>

     
                        
                        <tbody>
                            <?php foreach ($contas_receber as $conta): ?>

                                <tr>
                                    <td><?= $conta->conta_receber_id ?></td>
                                    <td><?= $conta->cliente_nome ?></td>
                                     <td><?= $conta->conta_receber_nome ?></td>
                                    <td><?= $conta->conta_receber_valor ?></td>
                                    <td><?= formata_data_banco_sem_hora($conta->conta_receber_data_vencimento); ?></td>
                                    <td><?= ($conta->conta_receber_status == 1 ? formata_data_banco_com_hora($conta->conta_receber_data_pagamento) : 'Aguardando Pagamento')  ?></td>
                                    <td class="text-center" style="font-size: 18px">
                                        
                                        <?php
                                        
                                        if ($conta->conta_receber_status == 1){
                                            
                                            echo '<span  class="badge badge-success"> Conta Paga </span>';                                            
                                        
                                            
                                        }else if(strtotime($conta->conta_receber_data_vencimento) > strtotime(date('Y-m-d'))){
                                            
                                               echo '<span class="badge badge-info"> A receber </span>';     
                                               
                                        }else if (strtotime ($conta->conta_receber_data_vencimento) == strtotime(date('Y-m-d'))){
                                            
                                             echo '<span class="badge badge-warning"> Vence Hoje </span>';     
                                            
                                        }else {
                                            
                                              echo '<span class="badge badge-danger"> Vencida </span>';  
                                        }
                                            
                                        
                                        ?>
                                    
                                    
                                    
                                    </td>





                                    <td class="text-center">
                                        <a title="Editar Registro" href="<?= base_url('receber/edit/' . $conta->conta_receber_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></i> </a>
                                        <a title="Deletar Registro" href="javascript(void)" data-toggle="modal" data-target="#conta-<?= $conta->conta_receber_id; ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> </a>

                                    </td>

                                </tr>

                            <div class="modal fade" id="conta-<?= $conta->conta_receber_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirma a exclusão do usuario?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Para excluir o registro clique em <strong>Sim</strong></div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('receber/del/' . $conta->conta_receber_id); ?>">Sim</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

