<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>

<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<br><h2 style="text-align: center">Consultar ramo de atividades</h2><br>
		<table id="tabela_atividades">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th>Descrição da atvidade</th>
			</tr>
		</thead>
			<?php foreach ($ramo_atividades as $ra) { ?>
				<tr>
					<td><a href="<?= base_url() ?>ramo_atividade/alterar/<?= $ra->ramati_codigo ?>" class="btn btn-info btn-md"><span class="glyphicon glyphicon-edit"></span>Alterar</a></td>
					<td><a href="<?= base_url() ?>ramo_atividade/excluir/<?= $ra->ramati_codigo ?>" class="btn btn-danger btn-sm btn_excluir"><span class="glyphicon glyphicon-trash"></span>Excluir</a></td>
					<td><?= $ra->ramati_descricao ?></td>
				</tr>
			<?php } ?>
		<tbody>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function(){
    	$('#tabela_atividades').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>