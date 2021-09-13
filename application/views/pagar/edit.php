

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('pagar') ?>">Contas a Pagar</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('pagar') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">





                    <div class="form-group row">



                        <div class="col-md-8">

                            <label>Fornecedores</label>
                            <select class="custom-select contas_pagar" name="conta_pagar_fornecedor_id">
                                <?php foreach ($fornecedores as $fornecedor): ?>

                                    <option value="<?= $fornecedor->fornecedor_id ?>" <?= ($fornecedor->fornecedor_id == $conta_pagar->conta_pagar_fornecedor_id ? 'Selected' : '') ?><?= ($fornecedor->fornecedor_ativo == 0 ? 'disabled' : '' ) ?> > <?= $fornecedor->fornecedor_nome ?> </option>

                                <?php endforeach; ?>
                            </select>
                            <?= form_error('conta_pagar_fornecedor_id', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                   



                        <div class="col-md-2">

                            <label>Data de Vencimento</label>
                            <input type="date" class="form-control"  name="conta_pagar_data_vencimento"  value="<?= $conta_pagar->conta_pagar_data_vencimento; ?>">
                            <?= form_error('conta_pagar_data_vencimento', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Valor</label>
                            <input type="text" class="form-control money2"  name="conta_pagar_valor"  value="<?= $conta_pagar->conta_pagar_valor; ?>">
                            <?= form_error('conta_pagar_valor', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>

                    <div class="form-group row">
                        
                             <div class="col-md-8">

                            <label>Descrição da Conta</label>
                            <input type="text" class="form-control"  name="conta_pagar_nome"  value="<?= $conta_pagar->conta_pagar_nome; ?>">
                            <?= form_error('conta_pagar_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>Status Pgamento</label>
                            <select style="height: 38px" class="form-control" name="conta_pagar_status">


                                <option value="1" <?= ($conta_pagar->conta_pagar_status == 1 ? 'Selected' : '') ?>> Conta Paga  </option>
                                <option value="0" <?= ($conta_pagar->conta_pagar_status == 0 ? 'Selected' : '') ?>> Aguardando Pagamento  </option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label>  Observações</label>
                            <textarea class="form-control form-control-user" name="conta_pagar_obs" placeholder="Observações" ><?= $conta_pagar->conta_pagar_obs; ?></textarea>
                            <?= form_error('conta_pagar_obs', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>





                    <input type="hidden"  name="conta_pagar_id" value="<?= $conta_pagar->conta_pagar_id ?>">




                    <button type="submit" class="btn btn-primary" <?php echo ($conta_pagar->conta_pagar_status == 1 ? 'disabled' : '') ?> ><?php echo ($conta_pagar->conta_pagar_status == 1 ? 'Conta Paga' : 'Salvar') ?></button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

