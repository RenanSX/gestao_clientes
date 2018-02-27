<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?= base_url() ?>assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.js"></script>

<form method="post">
	
	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
		<h2 style="text-align: center">Cadastrar registro</h2><br>
		<?php echo validation_errors(); ?>
		<?php echo form_open(base_url()."registros/registros_cadastrar",["id"=>"form_inclusao"]); ?>

		<div class="form-group">
			<label for="usr">Selecionar Cliente: </label>
			<select class="form-control selectpicker" data-live-search="true" name="cli_nomerazaosocial">
	            <?php
	            foreach($cliente as $c)
	            { 
	              echo '<option value="'.$c->cli_nomerazaosocial.'">'.$c->cli_nomerazaosocial.'</option>';
	            }?>
            </select>

			<br><br><label for="usr">Selecionar Meio de contato: </label>
			<select class="form-control selectpicker" data-live-search="true" name="meicon_descricao">
	            <?php
	            foreach($meio_contato as $mc)
	            {
	              echo '<option value="'.$mc->meicon_descricao.'">'.$mc->meicon_descricao.'</option>';
	            }?>
            </select>
        </div>

        <div class="form-group">
			<label for="usr">Informar data: </label>
			<input type="text" class="form-control datepicker"  autocomplete="off" maxlength="10" readonly placeholder="DD/MM/AAAA" name="regcon_datadocontato" /><br>

			<label for="usr">Informar Horário: </label>
			<input type="text" class="form-control clockpicker" value="HH:MM" readonly name="regcon_horadocontato"><br>

			<label for="usr">Assunto do contato: </label>
			<input type="text" class="form-control" name="regcon_assuntodocontato" /><br>
		
			<label for="usr">Descrição: </label>
			<input type="text" class="form-control" name="regcon_descricao" /><br>

			<button class="btn btn-info btn-lg" type="submit">Cadastrar</button>
		</div>
	</div>
</form>



<script>
	$('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});
	$('.clockpicker').clockpicker({donetext: 'Pronto', placement: 'top'});
</script>