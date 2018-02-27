<form action="<?= base_url() ?>meio_contato/alterar/<?= $meio_contato->meicon_codigo ?>" method="post">

	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">

		<h2 style="text-align: center">Alterar meio de contato</h2><br>
		
		<label for="usr">Meio de contato: </label>
		<?php echo validation_errors(); ?>
		<?php echo form_open(base_url()."meio_contatos/meio_contato_alterar",["id"=>"form_inclusao"]); ?>
		<div>
			<input type="text" class="form-control"  value="<?= $meio_contato->meicon_descricao ?>" name="meicon_descricao">
		</div>

		<div class="form-group">
			<br><button class="btn btn-info btn-lg" type="submit">alterar</button>
		</div>

	<div>
</form>