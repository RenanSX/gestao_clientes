<form method="post">

	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">

		<h2 style="text-align: center">Cadastrar ramo de atividade</h2><br>
			<?php echo validation_errors(); ?>
			<?php echo form_open(base_url()."ramo_atividades/atividade_cadastrar",["id"=>"form_inclusao"]); ?>
		<div class="form-group">
			<label for="usr">Ramo de atividade: </label>
			<input type="text" class="form-control" name="ramati_descricao">
		</div>

		<div class="form-group">
			<br><button class="btn btn-info btn-lg" type="submit">Cadastrar</button>
		</div>

	<div>
</form>
