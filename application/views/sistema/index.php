

	<?php $this->load->view('layout/sidebar') ?>



		<!-- Main Content -->
	<div id="content" xmlns="http://www.w3.org/1999/html">


			<?php $this->load->view('layout/navbar') ?>



			<!-- Begin Page Content -->
			<div class="container-fluid">



				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('/') ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $titulo?></li>
					</ol>
				</nav>


				<?php if ($message = $this->session->flashdata('error')): ?>

					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<strong> <i class="fas fa-exclamation-triangle"></i> &nbsp;<?= $message ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<?php endif;  ?>

				<?php if ($message = $this->session->flashdata('sucesso')): ?>

					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong> <i class="fas fa-check-circle"></i> &nbsp;<?= $message ?></strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<?php endif;  ?>

				<!-- DataTales Example -->
				<div class="card shadow mb-4">

					<div class="card-body">

						<form class="user" method="post" name="form_edit">
							<div class="form-group row">

								<div class="col-md-3">

									<label>Razão Social</label>
									<input type="text" class="form-control form-control-user"  name="sistema_razao_social"  placeholder="Razão Social" value="<?= $sistema->sistema_razao_social; ?>">
									<?= form_error('sistema_razao_social', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Nome Fantasia</label>
									<input type="text" class="form-control form-control-user"  name="sistema_nome_fantasia"  placeholder="Nome Fantasia" value="<?= $sistema->sistema_nome_fantasia; ?>">
									<?= form_error('sistema_nome_fantasia', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>CNPJ</label>
									<input type="text" class="form-control form-control-user cnpj"  name="sistema_cnpj"  placeholder="Cnpj" value="<?= $sistema->sistema_cnpj; ?>">
									<?= form_error('sistema_cnpj', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Inscrição Estadual</label>
									<input type="text" class="form-control form-control-user"  name="sistema_ie"  placeholder="Inscrição Estadual" value="<?= $sistema->sistema_ie; ?>">
									<?= form_error('sistema_ie', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-3">

									<label>Telefone</label>
									<input type="text" class="form-control form-control-user tel"  name="sistema_telefone_fixo"  placeholder="Telefone Fixo" value="<?= $sistema->sistema_telefone_fixo; ?>">
									<?= form_error('sistema_telefone_fixo', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Celular</label>
									<input type="text" class="form-control form-control-user celu"  name="sistema_telefone_movel"  placeholder="Celular" value="<?= $sistema->sistema_telefone_movel; ?>">
									<?= form_error('sistema_telefone_movel', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>WebSite</label>
									<input type="text" class="form-control form-control-user"  name=" sistema_site_url"  placeholder="WebSite" value="<?= $sistema-> sistema_site_url; ?>">
									<?= form_error('sistema_site_url', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>E-mail</label>
									<input type="email" class="form-control form-control-user"  name="sistema_email"  placeholder="Email" value="<?= $sistema->sistema_email; ?>">
									<?= form_error(' sistema_email', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<div class="form-group row">



								<div class="col-md-4">

									<label>Endereço</label>
									<input type="text" class="form-control form-control-user"  name="sistema_endereco"  placeholder="Endereço" value="<?= $sistema->sistema_endereco; ?>">
									<?= form_error('sistema_endereco', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

																<div class="col-md-2">

									<label>Número</label>
									<input type="text" class="form-control form-control-user"  name="sistema_numero"  placeholder="Número" value="<?= $sistema-> sistema_numero; ?>">
									<?= form_error('sistema_numero', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-2">

									<label>Cep</label>
									<input type="text" class="form-control form-control-user cep"  name="sistema_cep"  placeholder="Cep" value="<?= $sistema->sistema_cep; ?>">
									<?= form_error('sistema_cep', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-3">

									<label>Cidade</label>
									<input type="text" class="form-control form-control-user"  name="sistema_cidade"  placeholder="Cidade" value="<?= $sistema->sistema_cidade; ?>">
									<?= form_error('sistema_cidade', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-1">

									<label>Uf</label>
									<input type="text" class="form-control form-control-user uf"  name="sistema_estado"  placeholder="UF" value="<?= $sistema->sistema_estado; ?>">
									<?= form_error('sistema_estado', '<small class="form-text text-danger">', '</small>'); ?>

								</div>
							</div>

							<div class="form-group row">

								<div class="col-md-12">

									<label>  Texto da ordem de serviço e venda</label>
									<textarea class="form-control form-control-user" name="sistema_txt_ordem_servico" placeholder="Texto da ordem de serviço e venda" ><?= $sistema->sistema_txt_ordem_servico; ?></textarea>
									<?= form_error('sistema_txt_ordem_servico', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>


							<button type="submit" class="btn btn-primary ">Salvar</button>
						</form>

					</div>
				</div>



			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

