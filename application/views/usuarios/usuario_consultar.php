<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<div class="container">
  <br><h2 style="text-align: center">Consultar usuários</h2><br>
	<table id="tabela_usuarios" >
    <thead>
		<tr>
			<th></th>
			<th></th>
			<th>CPF</th>
			<th>Nome</th>
			<th>Email</th>
			<th>Ativo</th>
			<th>Administrador</th>
		</tr>
	</thead>
   <tbody>
		<?php foreach ($usuarios as $u) { ?>
			<tr>
			<td><a href="<?= base_url() ?>usuario/alterar/<?= $u->usu_codigo ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span>Alterar</a></td>
			<td><a href="<?= base_url() ?>usuario/excluir/<?= $u->usu_codigo ?>" class="btn btn-danger btn-sm btn_excluir"><span class="glyphicon glyphicon-trash"></span>Excluir</a></td>
			<td><?= $u->usu_cpf ?></td>
			<td><?= $u->usu_nome ?></td>
			<td><?= $u->usu_email ?></td>
			<td><?= ($u->usu_ativo) ?  "Sim" : "Não" ?></td>
			<td><?= ($u->usu_acessarelatorio) ?  "Sim" : "Não" ?></td>
			</tr>
		<?php } ?>
	</tbody>
  </table>
</div>

<script>
	$(document).ready(function(){
    	$('#tabela_usuarios').DataTable({
    		"language": {
    			url: "//cdn.datatables.net/plug-ins/1.10.13/i18n/Portuguese-Brasil.json"
    		}
    	});
	});
</script>