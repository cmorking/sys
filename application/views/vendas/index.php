

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
                <a href="<?= base_url('os/add') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-plus"></i> &nbsp;&nbsp;Add&nbsp;&nbsp;</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                              <th>Data Emissão</th>
                               <th>Cliente</th>
                               <th class="text-center">Forma Pagamento</th>
                              <th>Valor total</th>
                         
                                <th class="text-center no-sort">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($vendas as $venda): ?>

                                <tr>
                                 <td><?= $venda->venda_id ?></td>
                                 <td><?= formata_data_banco_com_hora($venda->venda_data_emissao); ?></td>
                                 <td><?= $venda->cliente_nome ?></td>
                                 <td class="text-center"><span style="font-size: 14px" class="badge badge-success"><?= $venda->forma_pagamento ?></span></td>
                                 
                               
                                <td><?= 'R$ &nbsp' . $venda->venda_valor_total ?></td>
                                
                          





                                    <td class="text-center">
                                        <a title="Imprimir Venda" href="<?= base_url('vendas/pdf/' . $venda->venda_id); ?>" class="btn btn-sm btn-dark"><i class="fas fa-print"></i> </a>
                                        <a title="Editar Registro" href="<?= base_url('vendas/edit/' . $venda->venda_id); ?>" class="btn btn-sm btn-primary"><i class="fas fa-user-edit"></i> </a>
                                        <a title="Deletar Registro" href="javascript(void)" data-toggle="modal" data-target="#venda-<?= $venda->venda_id7; ?>" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i> </a>

                                    </td>

                                </tr>

                                                     
                                <div class="modal fade" id="venda-<?= $venda->venda_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('vendas/del/' . $venda->venda_id); ?>">Sim</a>
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

