

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('servicos') ?>">Serviços</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('servicoes') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">

                  

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Nome</label>
                            <input type="text" class="form-control"  name="servico_nome"  placeholder="Serviço" value="<?= $servico->servico_nome; ?>">
                            <?= form_error('servico_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>Preço</label>
                            <input type="text" class="form-control money"  name="servico_preco"  placeholder="Cpf" value="<?= $servico->servico_preco; ?>">
                            <?= form_error('servico_preco', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>
                        
                        	<div class="col-md-4">

									<label>Status</label>
									<select class="form-control" name="servico_ativo">
										<option value="0" <?php echo ($servico->servico_ativo == 0) ? 'selected' : '' ?>> Inativo</option>
										<option value="1" <?php echo ($servico->servico_ativo == 1) ? 'selected' : '' ?>> Ativo</option>
									</select>


								</div>
                        </div>
                        <div class="form-group row">
                                 <div class="col-md-12">

                            <label>  Descrição</label>
                            <textarea class="form-control form-control-user" name="servico_descricao" placeholder="descricao" ><?= $servico->servico_descricao; ?></textarea>
                            <?= form_error('servico_descricao', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>
                        
             </div>



                    </div>
        

                   
    


              
                    <input type="hidden"  name="servico_id" value="<?= $servico->servico_id ?>">




                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

