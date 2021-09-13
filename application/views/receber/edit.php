

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('receber') ?>">Contas a Receber</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('receber') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">





                    <div class="form-group row">



                        <div class="col-md-8">

                            <label>Cliente</label>
                            <select class="custom-select contas_receber" name="conta_receber_cliente_id">
                                <?php foreach ($clientes as $cliente): ?>

                                    <option value="<?= $cliente->cliente_id ?>" <?= ($cliente->cliente_id == $conta_receber->conta_receber_cliente_id ? 'Selected' : '') ?><?= ($cliente->cliente_ativo == 0 ? 'disabled' : '' ) ?> > <?= $cliente->cliente_nome ?> </option>

                                <?php endforeach; ?>
                            </select>
                            <?= form_error('conta_receber_cliente_id', '<small class="form-text text-danger">', '</small>'); ?>
                        </div>

                   



                        <div class="col-md-2">

                            <label>Data de Vencimento</label>
                            <input type="date" class="form-control"  name="conta_receber_data_vencimento"  value="<?= $conta_receber->conta_receber_data_vencimento; ?>">
                            <?= form_error('conta_receber_data_vencimento', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Valor</label>
                            <input type="text" class="form-control money2"  name="conta_receber_valor"  value="<?= $conta_receber->conta_receber_valor; ?>">
                            <?= form_error('conta_receber_valor', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>

                    <div class="form-group row">
                        
                             <div class="col-md-8">

                            <label>Descrição da Conta</label>
                            <input type="text" class="form-control"  name="conta_receber_nome"  value="<?= $conta_receber->conta_receber_nome; ?>">
                            <?= form_error('conta_receber_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>Status Pgamento</label>
                            <select style="height: 38px" class="form-control" name="conta_receber_status">


                                <option value="1" <?= ($conta_receber->conta_receber_status == 1 ? 'Selected' : '') ?>> Conta Paga  </option>
                                <option value="0" <?= ($conta_receber->conta_receber_status == 0 ? 'Selected' : '') ?>> Aguardando Pagamento  </option>

                            </select>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label>  Observações</label>
                            <textarea class="form-control form-control-user" name="conta_receber_obs" placeholder="Observações" ><?= $conta_receber->conta_receber_obs; ?></textarea>
                            <?= form_error('conta_receber_obs', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>





                    <input type="hidden"  name="conta_receber_id" value="<?= $conta_receber->conta_receber_id ?>">




                    <button type="submit" class="btn btn-primary" <?php echo ($conta_receber->conta_receber_status == 1 ? 'disabled' : '') ?> ><?php echo ($conta_receber->conta_receber_status == 1 ? 'Conta Paga' : 'Salvar') ?></button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

