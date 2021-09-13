

	<?php $this->load->view('layout/sidebar') ?>



		<!-- Main Content -->
		<div id="content">


			<?php $this->load->view('layout/navbar') ?>



			<!-- Begin Page Content -->
			<div class="container-fluid">



				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?=base_url('usuarios') ?>">Usuários</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $titulo?></li>
					</ol>
				</nav>


				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<a href="<?=base_url('usuarios') ?>" class="btn btn-sm btn-success float-right"><i class="fas fa-undo-alt"></i> &nbsp;&nbsp;Voltar&nbsp;&nbsp;</a>

					</div>
					<div class="card-body">

						<form method="post" name="form_edit">
							<div class="form-group row">

								<div class="col-md-8">

									<label>Nome</label>
									<input type="text" class="form-control"  name="first_name"  placeholder="Seu nome" value="<?= $usuario->first_name; ?>">
									<?= form_error('first_name', '<small class="form-text text-danger">', '</small>'); ?>

								</div>



								<div class="col-md-4">

									<label>E-mail (Login)</label>
									<input type="email" class="form-control"  name="email"  placeholder="Seu email de login" value="<?= $usuario->email; ?>">
									<?= form_error('email', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-4">

									<label>Usuário</label>
									<input type="text" class="form-control"  name="username"  placeholder="Usuário" value="<?= $usuario->username; ?>">
									<?= form_error('username', '<small class="form-text text-danger">', '</small>'); ?>

								</div>

								<div class="col-md-4">

									<label>Status</label>
									<select class="form-control" name="active">
										<option value="0" <?php echo ($usuario->active == 0) ? 'selected' : '' ?>> Inativo</option>
										<option value="1" <?php echo ($usuario->active == 1) ? 'selected' : '' ?>> Ativo</option>
									</select>


								</div>

								<div class="col-md-4">

									<label>Perfil de acesso</label>

									<select class="form-control" name="perfil_usuario" >

										<option value="2" <?php echo ($perfil_usuario->id == 2) ? 'selected' : '' ?>>Técnico</option>
										<option value="1" <?php echo ($perfil_usuario->id == 1) ? 'selected' : '' ?>>Admin</option>

									</select>

								</div>

							</div>

							<div class="form-group row">

								<div class="col-md-6">
							<div class="form-group">
								<label>Senha</label>
								<input type="password" class="form-control" name="password" placeholder="Sua Senha">
								<?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>
							</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Confirme </label>
										<input type="password" class="form-control" name="confirm_password" placeholder="Confirme sua Senha">
										<?= form_error('confirm_password', '<small class="form-text text-danger">', '</small>'); ?>

									</div>
								</div>

								<input type="hidden"  name="usuario_id" value="<?= $usuario->id ?>">

							</div>



							<button type="submit" class="btn btn-primary">Salvar</button>
						</form>

					</div>
				</div>



			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

