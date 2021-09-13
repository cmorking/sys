

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('pagamentos') ?>">Formas de Pagamentos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('pagamentos') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">

                  

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Forma de Pagamento</label>
                            <input type="text" class="form-control"  name="forma_pagamento_nome"  placeholder="Forma de Pagamento" value="<?= $forma_pagamento->forma_pagamento_nome; ?>">
                            <?= form_error('forma_pagamento_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                 

                        <div class="col-md-4">

                            <label>Status</label>
                            <select class="form-control" name="forma_pagamento_ativa">
                                <option value="0" <?php echo ($forma_pagamento->forma_pagamento_ativa == 0) ? 'selected' : '' ?>> Inativo</option>
                                <option value="1" <?php echo ($forma_pagamento->forma_pagamento_ativa == 1) ? 'selected' : '' ?>> Ativo</option>
                            </select>


                        </div>
                        
                               <div class="col-md-4">

                            <label>Parcelamento</label>
                            <select class="form-control" name="forma_pagamento_aceita_parc">
                                <option value="0" <?php echo ($forma_pagamento->forma_pagamento_ativa == 0) ? 'selected' : '' ?>> Não</option>
                                <option value="1" <?php echo ($forma_pagamento->forma_pagamento_ativa == 1) ? 'selected' : '' ?>> Sim</option>
                            </select>


                        </div>


            



                    </div>
        

                   
    


              
                    <input type="hidden"  name="forma_pagamento_id" value="<?= $forma_pagamento->forma_pagamento_id ?>">




                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

