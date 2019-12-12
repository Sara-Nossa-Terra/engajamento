<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url(); /* ADICIONAR FAVICON AQUI */ ?>" type="image/ico" />
    <title>Engajamento</title>
    <link rel="stylesheet" href="<?= base_url(); ?>public/personal_style/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/personal_style/css/floating-labels.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>public/personal_style/css/style.css" />
  </head>
  <body>
    <form id="login_form" method="post" class="form-signin">
      <div class="text-center mb-4">
        <img class="mb-4" src="<?= base_url(); /* ADICIONAR LOGO AQUI */ ?>" alt="LOGO AQUI" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Engajamento</h1>
      </div>
      <div>
        <div class="form-label-group">
          <input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus>
          <label for="email">E-mail</label>
        </div>
        <span class="help-block mt-n15 red"></span>
      </div>
      <div>
        <div class="form-label-group">
          <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha">
          <label for="senha">Senha</label>
        </div>
        <span class="help-block mt-n15 red"></span>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Lembrar-me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
    </form>
    <!-- jQuery -->
    <script src="<?= base_url(); ?>public/personal_style/js/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>public/personal_style/js/bootstrap.bundle.min.js"></script>
    <!-- PERSONAL JS -->
    <script src="<?= base_url(); ?>public/js/util.js"></script>
    <script src="<?= base_url(); ?>public/js/login.js"></script>
  </body>
</html>