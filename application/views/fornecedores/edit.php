

	<?php $this->load->view('layout/sidebar') ?>



		<!-- Main Content -->
		<div id="content">


			<?php $this->load->view('layout/navbar') ?>



			<!-- Begin Page Content -->
			<div class="container-fluid">



				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('fornecedors') ?>">Fornecedores</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $titulo?></li>
					</ol>
				</nav>


				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<a href="<?=base_url('fornecedores') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

					</div>
					<div class="card-body">

						<form method="post" name="form_edit">

							<p><i class="fas fa-clock"></i> <strong>&nbsp; Registro atualizado em: &nbsp; <?= formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao) ; ?>  </strong></p>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Razão</label>
									<input type="text" class="form-control"  name="fornecedor_razao"  placeholder="Razão" value="<?= $fornecedor->fornecedor_razao; ?>">
									<?= form_error('fornecedor_razao', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-4">

									<label>Nome</label>
									<input type="text" class="form-control"  name="fornecedor_nome"  placeholder="Seu nome" value="<?= $fornecedor->fornecedor_nome; ?>">
									<?= form_error('fornecedor_nome', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-4">

									<label>Contato</label>
									<input type="text" class="form-control"  name="fornecedor_contato"  placeholder="Contato" value="<?= $fornecedor->fornecedor_contato; ?>">
									<?= form_error('fornecedor_contato', '<small class="form-text text-danger">', '</small>'); ?>

								</div>



							</div>
								<div class="form-group row">

									<div class="col-md-4">

										<?php if($fornecedor->fornecedor_tipo == 1): ?>
											<label>CPF</label>
											<input type="text" class="form-control cpf"  name="fornecedor_cpf"  placeholder="<?= ($fornecedor->fornecedor_tipo ==1 ? 'Cpf do fornecedor' : 'Cnpj da Empresa'); ?>" value="<?= $fornecedor->fornecedor_cpf_cnpj; ?>">
											<?= form_error('fornecedor_cpf', '<small class="form-text text-danger">', '</small>'); ?>
										<?php else: ?>
											<label>CNPJ</label>
											<input type="text" class="form-control cnpj"  name="fornecedor_cnpj"  placeholder="<?= ($fornecedor->fornecedor_tipo ==1 ? 'Cpf do fornecedor' : 'Cnpj da Empresa'); ?>" value="<?= $fornecedor->fornecedor_cpf_cnpj; ?>">
											<?= form_error('fornecedor_cnpj', '<small class="form-text text-danger">', '</small>'); ?>
										<?php endif; ?>




									</div>

									<div class="col-md-3">

										<?php if($fornecedor->fornecedor_tipo == 1): ?>
											<label>Rg</label>

										<?php else: ?>
											<label>Inscrição Estadual</label>

										<?php endif; ?>
										<input type="text" class="form-control"  name="fornecedor_rg_ie"  placeholder="<?= ($fornecedor->fornecedor_tipo ==1 ? 'Rg do fornecedor' : 'I.E. da Empresa'); ?>" value="<?= $fornecedor->fornecedor_rg_ie; ?>">
										<?= form_error('fornecedor_rg_ie', '<small class="form-text text-danger">', '</small>'); ?>

									</div>

								<div class="col-md-5">

									<label>E-mail</label>
									<input type="email" class="form-control"  name="fornecedor_email"  placeholder="Seu email " value="<?= $fornecedor->fornecedor_email; ?>">
									<?= form_error('fornecedor_email', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Telefone</label>
									<input type="text" class="form-control"  name="fornecedor_telefone"  placeholder="Telefone de Contato" value="<?= $fornecedor->fornecedor_telefone; ?>">
									<?= form_error('fornecedor_telefone', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Celular</label>
									<input type="text" class="form-control"  name="fornecedor_celular"  placeholder="Celular" value="<?= $fornecedor->fornecedor_celular; ?>">
									<?= form_error('fornecedor_celular', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-5">

									<label>Status</label>
									<select class="form-control" name="fornecedor_ativo">
										<option value="0" <?php echo ($fornecedor->fornecedor_ativo == 0) ? 'selected' : '' ?>> Inativo</option>
										<option value="1" <?php echo ($fornecedor->fornecedor_ativo == 1) ? 'selected' : '' ?>> Ativo</option>
									</select>


								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Endereço</label>
									<input type="text" class="form-control"  name="fornecedor_endereco"  placeholder="Endereço " value="<?= $fornecedor->fornecedor_endereco; ?>">
									<?= form_error('fornecedor_endereco', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-2">

									<label>Numero</label>
									<input type="text" class="form-control"  name="fornecedor_numero_endereco"  placeholder="Endereço com Numero" value="<?= $fornecedor->fornecedor_numero_endereco; ?>">
									<?= form_error('fornecedor_numero_endereco', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Bairro</label>
									<input type="text" class="form-control"  name="fornecedor_bairro"  placeholder="Bairro" value="<?= $fornecedor->fornecedor_bairro; ?>">
									<?= form_error('fornecedor_bairro', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Cep</label>
									<input type="tex" class="form-control"  name="fornecedor_cep"  placeholder="Cep " value="<?= $fornecedor->fornecedor_cep; ?>">
									<?= form_error('fornecedor_cep', '<small class="form-text text-danger">', '</small>'); ?>

								</div>



							</div>

							<div class="form-group row">

								<div class="col-md-7">

									<label>Complemento</label>
									<input type="text" class="form-control"  name="fornecedor_complemento"  placeholder="Complemento" value="<?= $fornecedor->fornecedor_complemento; ?>">
									<?= form_error('fornecedor_complemento', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Cidade</label>
									<input type="text" class="form-control"  name="fornecedor_cidade"  placeholder="Cidade" value="<?= $fornecedor->fornecedor_cidade; ?>">
									<?= form_error('fornecedor_cidade', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-2">

									<label>UF</label>
									<input type="text" class="form-control"  name="fornecedor_estado"  placeholder="UF" value="<?= $fornecedor->fornecedor_estado; ?>">
									<?= form_error('fornecedor_estado', '<small class="form-text text-danger">', '</small>'); ?>

								</div>





							</div>



							<div class="form-group row">

								<div class="col-md-12">

									<label>  Observações</label>
									<textarea class="form-control form-control-user" name="fornecedor_obs" placeholder="Observações" ><?= $fornecedor->fornecedor_obs; ?></textarea>
									<?= form_error('fornecedor_obs', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<input type="hidden"  name="fornecedor_tipo" value="<?= $fornecedor->fornecedor_tipo ?>">
							<input type="hidden"  name="fornecedor_id" value="<?= $fornecedor->fornecedor_id ?>">




							<button type="submit" class="btn btn-primary">Salvar</button>
						</form>

					</div>
				</div>



			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

