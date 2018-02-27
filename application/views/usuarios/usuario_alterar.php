<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>

<form action="<?= base_url() ?>usuario/alterar/<?= $usuario->usu_codigo ?>" method="post">
	<!--<input type="hidden" name="usu_cpf" value="<?= $usuario->usu_cpf ?>">-->
	<div class="form-group">
	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<h2 style="text-align: center">Alterar usuário</h2><br>
	<?php echo validation_errors(); ?>
	<?php echo form_open(base_url()."usuarios/usuario_alterar",["id"=>"form_inclusao"]); ?>
	<div class="form-group">
		<label for="usr">CPF: </label>
		<input type="text" class="form-control cpf" value="<?= $usuario->usu_cpf ?>" name="usu_cpf" minlength="11">
	</div>

	<div class="form-group">
		<label for="usr">Nome: </label>
		<input type="text" class="form-control" value="<?= $usuario->usu_nome ?>"  name="usu_nome">
	</div>

	<div class="form-group">
		<label for="usr">Email: </label>
		<input type="email" class="form-control" value="<?= $usuario->usu_email ?>"  name="usu_email">
	</div>

	<div class="form-group">
		<label for="usr">Senha: </label>
		<input type="password" class="form-control" value="<?= $usuario->usu_senha ?>"  name="usu_senha">
	</div>

	<div class="checkbox">
	  <label><input type="checkbox" name="usu_ativo" <?= ($usuario->usu_ativo) ? "checked" : "" ?> >Ativo</label>
	</div>

	<div class="checkbox">
		<label><input type="checkbox" name="usu_acessarelatorio" <?= ($usuario->usu_acessarelatorio) ? "checked" : "" ?> >Administrador</label>
	</div>

	<div class="form-group">
		<br><button class="btn btn-info btn-lg" type="submit">Alterar</button>
	</div>
</div>
</form>