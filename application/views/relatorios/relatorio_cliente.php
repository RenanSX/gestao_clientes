<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<div class="col-md-12">
<br><h2 style="text-align: center">Relatório clientes</h2><br>
<table id="tabela_relatorio_clientes">
	<thead>
		<tr>
			<th>CPF/CNPJ</th>
			<th>Nome razão social</th>
			<th>Endereço</th>
			<th>Telefone Comercial</th>
			<th>Telefone Celular</th>
			<th>Email</th>
			<th>Site</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($cliente as $c) { ?>
			<tr>
			<td><?= $c->cli_cpfcnpj ?></td>
			<td><?= $c->cli_nomerazaosocial ?></td>
			<td><?= $c->cli_endereco ?></td>
			<td><?= $c->cli_telefonecomercial ?></td>
			<td><?= $c->cli_telefonecelular ?></td>
			<td><?= $c->cli_email ?></td>
			<td><?= $c->cli_site ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>


<script>
	$(document).ready(function(){
    	$('#tabela_relatorio_clientes').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>