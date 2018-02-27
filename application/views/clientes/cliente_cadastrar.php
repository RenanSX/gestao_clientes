<form method="post">
	
	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<h2 style="text-align: center">Cadastrar clientes</h2><br>
	<?php echo validation_errors(); ?>
	<?php echo form_open(base_url()."clientes/cliente_cadastrar",["id"=>"form_inclusao"]); ?>
	<div class="form-group cpf_cnpj">
		<label for="usr">CNPJ ou CPF: </label>
		<input type="text" class="form-control" id="cli_cpfcnpj" onChange="validacpfcnpj()" maxlength="18" name="cli_cpfcnpj">
		<div id="error-message-cpfcnpj"></div>
	</div>

	<div class="form-group">
		<label for="usr">Nome ou Razão Social: </label>
		<input type="text" class="form-control"  name="cli_nomerazaosocial">
	</div>

	<div class="form-group">
		<label for="usr">Endereço: </label>
		<input type="text" class="form-control" name="cli_endereco">
	</div>

	<div class="form-group" id="staticParent">
		<label for="usr">Número: </label>
		<input type="text" id="child" class="form-control" name="cli_endereco_numero">
	</div>

	<div class="form-group">
		<label for="usr">Complemento: </label>
		<input type="text" class="form-control" name="cli_endereco_complemento">
	</div>

	<div class="form-group">
		<label for="usr">Telefone comercial: </label>
		<input type="text" class="form-control phone" name="cli_telefonecomercial" maxlength="15" autocomplete="off" placeholder="(XX) XXXX-XXXX">
	</div>

	<div class="form-group">
		<label for="usr">Telefone celular: </label>
		<input type="text" class="form-control phone_with_ddd" name="cli_telefonecelular" maxlength="15" autocomplete="off" placeholder="(XX) XXXX-XXXX">
	</div>

	<div class="form-group">
		<label for="usr">Nome contato: </label>
		<input type="text" class="form-control" name="cli_nomedocontato">
	</div>

	<div class="form-group">
		<label for="usr">Email: </label>
		<input type="text" class="form-control" name="cli_email">
	</div>

	<div class="form-group">
		<label for="usr">Site: </label>
		<input type="text" class="form-control" name="cli_site">
	</div>

	<div class="form-group">
		<label for="usr">Ramo de atividade: </label>
		<select class="form-control selectpicker" data-live-search="true" name="ramati_descricao">
            <?php
            foreach($ramo_atividade as $ra)
            {
              echo '<option value="'.$ra->ramati_descricao.'">'.$ra->ramati_descricao.'</option>';
            }?>
            </select>
	</div>

	<div class="form-group">
		<button class="btn btn-info btn-lg" type="submit">Cadastrar</button>
	</div>
</div>
</form>


