<title>Gestão de Clientes</title>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/data-table/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/clockpicker/dist/bootstrap-clockpicker.min.css">

<head>
  <meta charset="utf-8">
</head>
<body>

<style type="text/css">
		.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover{
			background-color: #04df14 !important;
		}

		.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover{
			color: black !important;
			background-color: #04df14 !important;
		}

		.dropdown-menu>li>a:hover{
			background-color: #7bff97 !important;
		}
</style>

<nav class="navbar navbar-inverse" style="background-color: #7bff97; border-color: #cccccc; color: black">
  <div class="container-fluid" >
    <div class="navbar-header">
      <a class="navbar-brand" style="color:green">Gestão de Clientes</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a style="color: black" href="<?= base_url()?>home">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black"data-toggle="dropdown" href="#">Clientes <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>cliente/cadastrar">Cadastrar clientes</a></li>
          <li><a href="<?= base_url()?>cliente/consultar">Consultar clientes</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black" data-toggle="dropdown" href="#">Ramo de atividades<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>ramo_atividade/cadastrar">Cadastrar ramo de atividade</a></li>
          <li><a href="<?= base_url()?>ramo_atividade/consultar">Consultar ramo de atividades</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black" data-toggle="dropdown" href="#">Meio de contatos<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>meio_contato/cadastrar">Cadastrar meio de contato</a></li>
          <li><a href="<?= base_url()?>meio_contato/consultar">Consultar meio de contatos</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black" data-toggle="dropdown" href="#">Registro <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>registro/cadastrar">Cadastrar registro</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black" data-toggle="dropdown" href="#">Relatórios <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>relatorio/cliente">Relatório de clientes</a></li>
          <li><a href="<?= base_url()?>relatorio/contato_cliente">Relatório de contato por cliente</a></li>
        </ul>
      </li>
      <li class="dropdown"><a class="dropdown-toggle" style="color:black" data-toggle="dropdown" href="#">Usuários <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url()?>usuario/consultar">Consultar usuários</a></li>
          <li><a href="<?= base_url()?>usuario/cadastrar">Cadastrar usuários</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= base_url('home/logout') ?>" style="color:black"><span class="glyphicon glyphicon-log-out" style="color:black"></span> Sair</a></li>
    </ul>
  </div>
</nav>
  
</body>

