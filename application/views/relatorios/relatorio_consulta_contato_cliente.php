<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<div class="col-md-12">
<br><h2 style="text-align: center">Relatório de contato por clientes</h2><br>
<table id="tabela_contato_por_clientes">
	<thead>
		<tr>
			<th>Nume Usuário</th>
			<th>CPF ou CNPJ</th>
			<th>Nome razão social</th>
			<th>Meio contato</th>
			<th>Data do contato</th>
			<th>Hora do contato</th>
			<th>Descrição do contato</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registro_contato as $rc) { ?>
			<tr>
			<td><?= $rc->nume_usuario ?></td>
			<td><?= $rc->cpf_cnpj ?></td>
			<td><?= $rc->nome_razao_social ?></td>
			<td><?= $rc->meio_contato ?></td>
			<td><?= $rc->data_contato ?></td>
			<td><?= $rc->hora_contato ?></td>
			<td><?= $rc->descricao ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>

<script>
	$(document).ready(function(){
    	$('#tabela_contato_por_clientes').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>