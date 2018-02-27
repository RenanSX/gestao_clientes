<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css"/>

<div class="login-page">
  <h1 style="margin-top: -70px; margin-bottom: 12px">Sistema de gestão de clientes</h1>
  <div class="form">
    <h1>Login</h1>

    <?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>

     <form action="<?= base_url('Login_Controller') ?>" method="post">
      <input type="text" class="cpf" name="usu_cpf" placeholder="cpf" minlength="11"/>
      <input type="password" name="usu_senha" placeholder="senha"/>
      <button style="background-color: #7bff97">Entrar</button>
      <p class="message">Sem cadastro? <a href="<?= base_url()?>usuario/cadastrar">Cadastrar uma conta</a></p>
    </form>
  </div>
</div>
