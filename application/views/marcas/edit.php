

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('marcas') ?>">Vendedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('marcas') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">

                  

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Nome</label>
                            <input type="text" class="form-control"  name="nome"  placeholder="Seu nome" value="<?= $marca->nome; ?>">
                            <?= form_error('nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                 
                        
                        	<div class="col-md-4">

									<label>Status</label>
									<select class="form-control" name="ativa">
										<option value="0" <?php echo ($marca->ativa == 0) ? 'selected' : '' ?>> Inativo</option>
										<option value="1" <?php echo ($marca->ativa == 1) ? 'selected' : '' ?>> Ativo</option>
									</select>


								</div>
                        
           
            



                    </div>
        

                   
    


              
                    <input type="hidden"  name="marca_id" value="<?= $marca->marca_id ?>">




                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

