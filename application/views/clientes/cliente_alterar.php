<form action="<?= base_url() ?>cliente/alterar/<?= $cliente->cli_codigo ?>" method="post">
	
	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<h2 style="text-align: center">Alterar cliente</h2><br>
	<?php echo validation_errors(); ?>
	<?php echo form_open(base_url()."clientes/cliente_alterar",["id"=>"form_inclusao"]); ?>
	<div class="form-group">
		<label for="usr">CNPJ ou CPF: </label>
		<input type="text" class="form-control cnpj" value="<?= $cliente->cli_cpfcnpj ?>" maxlength="18" name="cli_cpfcnpj">
	</div>

	<div class="form-group">
		<label for="usr">Nome ou Razão Social: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_nomerazaosocial ?>" name="cli_nomerazaosocial">
	</div>

	<div class="form-group">
		<label for="usr">Endereço: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_endereco ?>" name="cli_endereco">
	</div>

	<div class="form-group" id="staticParent">
		<label for="usr">Número: </label>
		<input type="text" id="child" class="form-control" value="<?= $cliente->cli_endereco_numero ?>" name="cli_endereco_numero">
	</div>

	<div class="form-group">
		<label for="usr">Complemento: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_endereco_complemento ?>" name="cli_endereco_complemento">
	</div>

	<div class="form-group">
		<label for="usr">Telefone comercial: </label>
		<input type="text" class="form-control phone_with_ddd" name="cli_telefonecomercial" value="<?= $cliente->cli_telefonecomercial ?>" maxlength="15" autocomplete="off" placeholder="(XX) XXXX-XXXX">
	</div>

	<div class="form-group">
		<label for="usr">Telefone celular: </label>
		<input type="text" class="form-control phone_with_ddd" name="cli_telefonecelular" value="<?= $cliente->cli_telefonecelular ?>" maxlength="15" autocomplete="off" placeholder="(XX) XXXX-XXXX">
	</div>

	<div class="form-group">
		<label for="usr">Nome contato: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_nomedocontato ?>" name="cli_nomedocontato">
	</div>

	<div class="form-group">
		<label for="usr">Email: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_email ?>" name="cli_email">
	</div>

	<div class="form-group">
		<label for="usr">Site: </label>
		<input type="text" class="form-control" value="<?= $cliente->cli_site ?>" name="cli_site">
	</div>

	<div class="form-group">
		<button class="btn btn-info btn-lg" type="submit">Alterar</button>
	</div>
</div>
</form>