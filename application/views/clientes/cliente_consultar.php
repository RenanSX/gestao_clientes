<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<br><h2 style="text-align: center">Consultar clientes</h2><br>
<table id="tabela_clientes" style="width: 100%">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<th>CPF ou CNPJ</th>
			<th>Nome ou Razão social</th>
			<th>Endereço</th>
			<th>Endereço número</th>
			<th>Endereço Complemento</th>
			<th>Telefone Comercial</th>
			<th>Telefone Celular</th>
			<th>Nome do Contato</th>
			<th>Ramo de atividade</th>
			<!--<th>Email</th>-->
			<!--<th>Site</th>-->
		</tr>
	</thead>
	<tbody>
		<?php foreach ($cliente as $c) { ?>
			<tr>
			<td><a href="<?= base_url() ?>cliente/alterar/<?= $c->cli_codigo ?>" class="btn btn-info btn-md"><span class="glyphicon glyphicon-edit"></span>Alterar</a></td>
			<td><a href="<?= base_url() ?>cliente/excluir/<?= $c->cli_codigo ?>" class="btn btn-danger btn-sm btn_excluir"><span class="glyphicon glyphicon-trash"></span>Excluir</a></td>
			<td><?= $c->cli_cpfcnpj ?></td>
			<td><?= $c->cli_nomerazaosocial ?></td>
			<td><?= $c->cli_endereco ?></td>
			<td><?= $c->cli_endereco_numero ?></td>
			<td><?= $c->cli_endereco_complemento ?></td>
			<td><?= $c->cli_telefonecomercial ?></td>
			<td><?= $c->cli_telefonecelular ?></td>
			<td><?= $c->cli_nomedocontato ?></td>
			<td><?= $c->TAuxiliar_RamoAtividade_ramati_codigo ?></td>
			<!--<td><?= $c->cli_site ?></td>-->
			</tr>
		<?php } ?>
	</tbody>
</table>

<script>
	$(document).ready(function(){
    	$('#tabela_clientes').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>