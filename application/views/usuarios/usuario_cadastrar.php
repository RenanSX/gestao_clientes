<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>

<form method="post">
	
	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2" style="margin-top: 4%">
		<h2 style="text-align: center">Cadastrar usuário</h2><br>
		<?php echo validation_errors(); ?>
		<?php echo form_open(base_url()."usuarios/usuario_cadastrar",["id"=>"form_inclusao"]); ?>
		<div class="form-group">
			<label for="usr">CPF: </label>
			<input type="text" class="form-control cpf"  name="usu_cpf" minlength="11">
		</div>

		<div class="form-group">
			<label for="usr">Nome: </label>
			<input type="text" class="form-control" name="usu_nome">
		</div>

		<div class="form-group">
			<label for="usr">Email: </label>
			<input type="email" class="form-control" name="usu_email">
		</div>

		<div class="form-group">
			<label for="usr">Senha: </label>
			<input type="password" class="form-control" name="usu_senha">
		</div>

		<div class="checkbox">
		  <label><input type="checkbox" name="usu_acessarelatorio">Administrador</label>
		</div>

		<div class="form-group">
			<br><button class="btn btn-info btn-lg" type="submit">Cadastrar</button>
			<a class="btn btn-success btn-lg" href="<?=base_url() ?>login" role="button">Voltar</a>
		</div>
	</div>
</form>