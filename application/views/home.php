<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>

<div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-2 col-xs-offset-2">
	<h1>Bem vindo <a><?= $this->session->userdata('usu_nome') ?></a> ao sistema de gestão de clientes. </h1><br><br>
	<?php if(isset($_SESSION)) {
	     echo $this->session->flashdata('flash_data');
	} ?>
	<form action="<?= base_url('Relatorio_Controller') ?>"></form>
</div>


