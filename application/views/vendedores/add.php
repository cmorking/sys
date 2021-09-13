

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('fornecedores') ?>">Vendedores</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('vendedores') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_add">


                    <div class="form-group row">



                        <div class="col-md-4">

                            <label>Nome</label>
                            <input type="text" class="form-control"  name="vendedor_nome"  placeholder="Seu nome" value="<?= set_value('vendedor_nome') ?>">
                            <?= form_error('vendedor_nome', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>CPF</label>
                            <input type="text" class="form-control cpf"  name="cpf"  placeholder="Cpf">
                            <?= form_error('cpf', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-4">

                            <label>Rg</label>
                            <input type="text" class="form-control"  name="rg" placeholder="Rg" value="<?= set_value('rg') ?>">
                            <?= form_error('rg', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>





                    </div>
                    <div class="form-group row">

                   
                          <div class="col-md-2">

                            <label>Código</label>
                            <input type="text" class="form-control"  name="codigo" readonly=""  placeholder="Codigo Gerado " value="<?= $codigo ?>">
                         

                        </div>

                        <div class="col-md-10">

                            <label>E-mail</label>
                            <input type="email" class="form-control"  name="email"  placeholder="Seu email " value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Telefone</label>
                            <input type="text" class="form-control tel"  name="telefone"  placeholder="Telefone de Contato" value="<?= set_value('telefone') ?>">
                            <?= form_error('telefone', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Celular</label>
                            <input type="text" class="form-control celu"  name="celular"  placeholder="Celular" value="<?= set_value('celular') ?>">
                            <?= form_error('celular', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-5">

                            <label>Status</label>
                            <select class="form-control" name="ativo">
                                <option value="0"> Inativo</option>
                                <option value="1"> Ativo</option>
                            </select>


                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-4">

                            <label>Endereço</label>
                            <input type="text" class="form-control"  name="endereco"  placeholder="Endereço " value="<?= set_value('endereco') ?>">
                            <?= form_error('endereco', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Numero</label>
                            <input type="text" class="form-control"  name="numero_endereco"  placeholder="Numero" value="<?= set_value('numero_endereco') ?>">
                            <?= form_error('numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Bairro</label>
                            <input type="text" class="form-control"  name="bairro"  placeholder="Bairro" value="<?= set_value('bairro') ?>">
                            <?= form_error('bairro', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Cep</label>
                            <input type="tex" class="form-control"  name="cep"  placeholder="Cep " value="<?= set_value('cep') ?>">
                            <?= form_error('cep', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>



                    </div>

                    <div class="form-group row">

                        <div class="col-md-7">

                            <label>Complemento</label>
                            <input type="text" class="form-control"  name="complemento"  placeholder="Complemento" value="<?= set_value('complemento') ?>">
                            <?= form_error('complemento', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Cidade</label>
                            <input type="text" class="form-control"  name="cidade"  placeholder="Cidade" value="<?= set_value('cidade') ?>">
                            <?= form_error('cidade', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>UF</label>
                            <input type="text" class="form-control"  name="estado"  placeholder="UF" value="<?= set_value('estado') ?>">
                            <?= form_error('estado', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>





                    </div>



                    <div class="form-group row">

                        <div class="col-md-12">

                            <label>  Observações</label>
                            <textarea class="form-control form-control-user" name="obs" placeholder="Observações"> </textarea>
                            <?= form_error('obs', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                    </div>






                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>

            </div>
        </div>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

