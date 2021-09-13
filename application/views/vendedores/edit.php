

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('vendedores') ?>">Vendedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('vendedores') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_edit">

                    <p><i class="fas fa-clock"></i> <strong>&nbsp; Registro atualizado em: &nbsp; <?= formata_data_banco_com_hora($vendedor->data_alteracao); ?>  </strong></p>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Nome</label>
                            <input type="text" class="form-control"  name="vendedor_nome"  placeholder="Seu nome" value="<?= $vendedor->vendedor_nome; ?>">
                            <?= form_error('vendedor_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>Cpf</label>
                            <input type="text" class="form-control"  name="cpf"  placeholder="Cpf" value="<?= $vendedor->cpf; ?>">
                            <?= form_error('cpf', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>
                        
                            <div class="col-md-4">

                            <label>Rg</label>
                            <input type="text" class="form-control"  name="rg"  placeholder="Rg" value="<?= $vendedor->rg; ?>">
                            <?= form_error('rg', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>



                    </div>
                    <div class="form-group row">

                               

                        <div class="col-md-5">

                            <label>E-mail</label>
                            <input type="email" class="form-control"  name="email"  placeholder="Seu email " value="<?= $vendedor->email; ?>">
                            <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Telefone</label>
                            <input type="text" class="form-control"  name="telefone"  placeholder="Telefone de Contato" value="<?= $vendedor->telefone; ?>">
                            <?= form_error('telefone', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Celular</label>
                            <input type="text" class="form-control"  name="celular"  placeholder="Celular" value="<?= $vendedor->celular; ?>">
                            <?= form_error('celular', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-5">

                            <label>Status</label>
                            <select class="form-control" name="ativo">
                                <option value="0" <?php echo ($vendedor->ativo == 0) ? 'selected' : '' ?>> Inativo</option>
                                <option value="1" <?php echo ($vendedor->ativo == 1) ? 'selected' : '' ?>> Ativo</option>
                            </select>


                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Endereço</label>
                            <input type="text" class="form-control"  name="endereco"  placeholder="Endereço " value="<?= $vendedor->endereco; ?>">
                            <?= form_error('endereco', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Numero</label>
                            <input type="text" class="form-control"  name="numero"  placeholder="Endereço com Numero" value="<?= $vendedor->numero; ?>">
                            <?= form_error('numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Bairro</label>
                            <input type="text" class="form-control"  name="bairro"  placeholder="Bairro" value="<?= $vendedor->bairro; ?>">
                            <?= form_error('bairro', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Cep</label>
                            <input type="tex" class="form-control"  name="cep"  placeholder="Cep " value="<?= $vendedor->cep; ?>">
                            <?= form_error('cep', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>



                    </div>

                    <div class="form-group row">

                        <div class="col-md-7">

                            <label>Complemento</label>
                            <input type="text" class="form-control"  name="complemento"  placeholder="Complemento" value="<?= $vendedor->complemento; ?>">
                            <?= form_error('complemento', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Cidade</label>
                            <input type="text" class="form-control"  name="cidade"  placeholder="Cidade" value="<?= $vendedor->cidade; ?>">
                            <?= form_error('cidade', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>UF</label>
                            <input type="text" class="form-control"  name="estado"  placeholder="UF" value="<?= $vendedor->estado; ?>">
                            <?= form_error('estado', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>





                    </div>



                    <div class="form-group row">

                        <div class="col-md-12">

                            <label>  Observações</label>
                            <textarea class="form-control form-control-user" name="obs" placeholder="Observações" ><?= $vendedor->obs; ?></textarea>
                            <?= form_error('obs', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>

              
                    <input type="hidden"  name="vendedor_id" value="<?= $vendedor->vendedor_id ?>">




                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

