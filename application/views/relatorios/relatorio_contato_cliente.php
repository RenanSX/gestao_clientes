<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<form method="post">

	<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
		<h2 style="text-align: center">Relatório de contato por clientes</h2><br>
		<div class="form-group">
			<label for="usr">Selecionar Cliente: </label>
			<select class="form-control selectpicker" data-live-search="true" name="cli_nomerazaosocial">
            <?php
            foreach($cliente as $c)
            { 
              echo '<option value="'.$c->cli_nomerazaosocial.'">'.$c->cli_nomerazaosocial.'</option>';
            }?>
            </select>
            <div class="form-group">
            	<br><h4>Selecionar o intervalo de data: </h4>
	            <label for="usr">Informar data inicial: </label>
	            <input type="text" class="form-control datepicker" data-date-formt="dd-mm-yyyy" autocomplete="off" maxlength="10" readonly placeholder="DD/MM/AAAA" name="regcon_datadocontato_inicial" /><br>
				<label for="usr">Informar data final: </label>
				<input type="text" class="form-control datepicker" data-date-formt="dd-mm-yyyy" autocomplete="off" maxlength="10" readonly placeholder="DD/MM/AAAA" name="regcon_datadocontato_final" /><br>
			</div>

			<div class="form-group">
			<button class="btn btn-info btn-lg" type="submit">Gerar relatório</button>
		</div>
		</div>
	</div>

</form>

<script>
	$('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});
</script>