<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<br><h2 style="text-align: center">Consultar meio de contatos</h2><br>
		<table id="tabela_meio_contatos">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th>Descrição do meio de contato</th>
			</tr>
		</thead>
			<?php foreach ($meio_contato as $mc) { ?>
				<tr>
					<td><a href="<?= base_url() ?>meio_contato/alterar/<?= $mc->meicon_codigo ?>" class="btn btn-info btn-md"><span class="glyphicon glyphicon-edit"></span>Alterar</a></td>
					<td><a href="<?= base_url() ?>meio_contato/excluir/<?= $mc->meicon_codigo ?>" class="btn btn-danger btn-sm btn_excluir"><span class="glyphicon glyphicon-trash"></span>Excluir</a></td>
					<td><?= $mc->meicon_descricao ?></td>
				</tr>
			<?php } ?>
		<tbody>
		</tbody>
	</table>
</div>

<script>
	$(document).ready(function(){
    	$('#tabela_meio_contatos').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>