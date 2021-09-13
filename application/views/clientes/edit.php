

	<?php $this->load->view('layout/sidebar') ?>



		<!-- Main Content -->
		<div id="content">


			<?php $this->load->view('layout/navbar') ?>



			<!-- Begin Page Content -->
			<div class="container-fluid">



				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('clientes') ?>">Clientes</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $titulo?></li>
					</ol>
				</nav>


				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<a href="<?=base_url('clientes') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

					</div>
					<div class="card-body">

						<form method="post" name="form_edit">

							<p><i class="fas fa-clock"></i> <strong>&nbsp; Registro atualizado em: &nbsp; <?= formata_data_banco_com_hora($cliente->cliente_data_alteracao) ; ?>  </strong></p>

							<div class="form-group row">

								<div class="col-md-8">

									<label>Nome</label>
									<input type="text" class="form-control"  name="cliente_nome"  placeholder="Seu nome" value="<?= $cliente->cliente_nome; ?>">
									<?= form_error('cliente_nome', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-4">

									<label>Data de Nascimento</label>
									<input type="date" class="form-control form-control-date"  name="cliente_data_nascimento"  placeholder="Data de Nascimento" value="<?= $cliente->cliente_data_nascimento; ?>">
									<?= form_error('cliente_data_nascimento', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>
								<div class="form-group row">

									<div class="col-md-4">

										<?php if($cliente->cliente_tipo == 1): ?>
											<label>CPF</label>
											<input type="text" class="form-control cpf"  name="cliente_cpf"  placeholder="<?= ($cliente->cliente_tipo ==1 ? 'Cpf do Cliente' : 'Cnpj da Empresa'); ?>" value="<?= $cliente->cliente_cpf_cnpj; ?>">
											<?= form_error('cliente_cpf', '<small class="form-text text-danger">', '</small>'); ?>
										<?php else: ?>
											<label>CNPJ</label>
											<input type="text" class="form-control cnpj"  name="cliente_cnpj"  placeholder="<?= ($cliente->cliente_tipo ==1 ? 'Cpf do Cliente' : 'Cnpj da Empresa'); ?>" value="<?= $cliente->cliente_cpf_cnpj; ?>">
											<?= form_error('cliente_cnpj', '<small class="form-text text-danger">', '</small>'); ?>
										<?php endif; ?>




									</div>

									<div class="col-md-3">

										<?php if($cliente->cliente_tipo == 1): ?>
											<label>Rg</label>

										<?php else: ?>
											<label>Inscrição Estadual</label>

										<?php endif; ?>
										<input type="text" class="form-control"  name="cliente_rg_ie"  placeholder="<?= ($cliente->cliente_tipo ==1 ? 'Rg do Cliente' : 'I.E. da Empresa'); ?>" value="<?= $cliente->cliente_rg_ie; ?>">
										<?= form_error('cliente_rg_ie', '<small class="form-text text-danger">', '</small>'); ?>

									</div>

								<div class="col-md-5">

									<label>E-mail</label>
									<input type="email" class="form-control"  name="cliente_email"  placeholder="Seu email " value="<?= $cliente->cliente_email; ?>">
									<?= form_error('cliente_email', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Telefone</label>
									<input type="text" class="form-control tel"  name="cliente_telefone"  placeholder="Telefone de Contato" value="<?= $cliente->cliente_telefone; ?>">
									<?= form_error('cliente_telefone', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Celular</label>
									<input type="text" class="form-control cel"  name="cliente_celular"  placeholder="Celular" value="<?= $cliente->cliente_celular; ?>">
									<?= form_error('cliente_celular', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-5">

									<label>Status</label>
									<select class="form-control" name="cliente_ativo">
										<option value="0" <?php echo ($cliente->cliente_ativo == 0) ? 'selected' : '' ?>> Inativo</option>
										<option value="1" <?php echo ($cliente->cliente_ativo == 1) ? 'selected' : '' ?>> Ativo</option>
									</select>


								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Endereço</label>
									<input type="text" class="form-control"  name="cliente_endereco"  placeholder="Endereço " value="<?= $cliente->cliente_endereco; ?>">
									<?= form_error('cliente_endereco', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-2">

									<label>Numero</label>
									<input type="text" class="form-control"  name="cliente_numero_endereco"  placeholder="Endereço com Numero" value="<?= $cliente->cliente_numero_endereco; ?>">
									<?= form_error('cliente_numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Bairro</label>
									<input type="text" class="form-control"  name="cliente_bairro"  placeholder="Bairro" value="<?= $cliente->cliente_bairro; ?>">
									<?= form_error('cliente_bairro', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Cep</label>
									<input type="tex" class="form-control"  name="cliente_cep"  placeholder="Cep " value="<?= $cliente->cliente_cep; ?>">
									<?= form_error('cliente_cep', '<small class="form-text text-danger">', '</small>'); ?>

								</div>



							</div>

							<div class="form-group row">

								<div class="col-md-7">

									<label>Complemento</label>
									<input type="text" class="form-control"  name="cliente_complemento"  placeholder="Complemento" value="<?= $cliente->cliente_complemento; ?>">
									<?= form_error('cliente_complemento', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Cidade</label>
									<input type="text" class="form-control"  name="cliente_cidade"  placeholder="Cidade" value="<?= $cliente->cliente_cidade; ?>">
									<?= form_error('cliente_cidade', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-2">

									<label>UF</label>
									<input type="text" class="form-control"  name="cliente_estado"  placeholder="UF" value="<?= $cliente->cliente_estado; ?>">
									<?= form_error('cliente_estado', '<small class="form-text text-danger">', '</small>'); ?>

								</div>





							</div>



							<div class="form-group row">

								<div class="col-md-12">

									<label>  Observações</label>
									<textarea class="form-control form-control-user" name="cliente_obs" placeholder="Observações" ><?= $cliente->cliente_obs; ?></textarea>
									<?= form_error('cliente_obs', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<input type="hidden"  name="cliente_tipo" value="<?= $cliente->cliente_tipo ?>">
							<input type="hidden"  name="cliente_id" value="<?= $cliente->cliente_id ?>">




							<button type="submit" class="btn btn-primary">Salvar</button>
						</form>

					</div>
				</div>



			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

