

<?php $this->load->view('layout/sidebar') ?>



<!-- Main Content -->
<div id="content">


    <?php $this->load->view('layout/navbar') ?>



    <!-- Begin Page Content -->
    <div class="container-fluid">



        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('produtos') ?>">Produtos</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $titulo ?></li>
            </ol>
        </nav>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?= base_url('produtos') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

            </div>
            <div class="card-body">

                <form method="post" name="form_add">



                    <div class="form-group row">

                        <div class="col-md-2">

                            <label>Codigo</label>
                            <input type="text" class="form-control"  name="produto_codigo" readonly="" value="<?= $produto_codigo?>">


                        </div>

                        <div class="col-md-10">

                            <label>Produto</label>
                            <input type="text" class="form-control"  name="produto_descricao"  placeholder="Nome" value="<?= set_value('produto_descricao')?>" >
                            <?= form_error('produto_descricao', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>









                    </div>

                    <div class="form-group row">



                        <div class="col-md-3">

                            <label>Marca</label>
                            <select class="form-control" name="produto_marca_id">
                                <?php foreach ($marcas as $marca): ?>

                                    <option value="<?= $marca->marca_id ?>"  <?= ($marca->ativa == 0 ? 'disabled' : '' ) ?> > <?= $marca->nome ?> </option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>Categorias</label>
                            <select class="form-control" name="produto_categoria_id">
                                <?php foreach ($categorias as $categoria): ?>

                                    <option value="<?= $categoria->categoria_id ?>"  <?= ($categoria->ativa == 0 ? 'disabled' : '' ) ?>> <?= $categoria->nome ?> </option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>Fornecedores</label>
                            <select class="form-control" name="produto_fornecedor_id">
                                <?php foreach ($fornecedores as $fornecedor): ?>

                                    <option value="<?= $fornecedor->fornecedor_id ?>" <?= ($fornecedor->fornecedor_ativo == 0 ? 'disabled' : '' ) ?> > <?= $fornecedor->fornecedor_nome ?> </option>

                                <?php endforeach; ?>
                            </select>

                        </div>

                        <div class="col-md-3">

                            <label>Unidade</label>
                            <input type="text" class="form-control"  name="produto_unidade" value="<?= set_value('produto_unidade')?>">


                        </div>

                    </div>

                    <div class="form-group row">



                        <div class="col-md-3">

                            <label>Preço Custo</label>
                            <input type="text" class="form-control money"  name="produto_preco_custo"  placeholder="Preço de Custo" value="<?= set_value('produto_preco_custo')?>">
                            <?= form_error('produto_preco_custo', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-3">

                            <label>Preço Venda</label>
                            <input type="text" class="form-control money"  name="produto_preco_venda"  placeholder="Preço de Venda" value="<?= set_value('produto_preco_venda')?>">
                            <?= form_error('produto_preco_venda', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>
                        <div class="col-md-2">

                            <label>Estoque Minimo</label>
                            <input type="number" class="form-control"  name="produto_estoque_minimo"  placeholder="Estoque Minimo" value="<?= set_value('produto_estoque_minimo')?>">
                            <?= form_error('produto_estoque_minimo', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Quantidade em Estoque</label>
                            <input type="number" class="form-control "  name="produto_qtde_estoque"  placeholder="Estoque" value="<?= set_value('produto_qtde_estoque')?>">
                            <?= form_error('produto_qtde_estoque', '<small class="form-text text-danger">', '</small>'); ?>

                        </div>

                        <div class="col-md-2">

                            <label>Status</label>
                            <select class="form-control" name="produto_ativo">
                                <option value="0" > Inativo</option>
                                <option value="1" > Ativo</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12">

                            <label>  Observações</label>
                            <textarea class="form-control form-control-user" name="produto_obs" placeholder="Observações" ><?= set_value('produto_obs')?></textarea>
                            <?= form_error('produto_obs', '<small class="form-text text-danger">', '</small>'); ?>

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

