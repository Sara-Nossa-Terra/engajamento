<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?= base_url(); /* ADICIONAR FAVICON AQUI */ ?>" type="image/ico" />
  <title>Index - Engajamento</title>
  <link rel="stylesheet" href="<?= base_url(); ?>public/personal_style/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>public/personal_style/css/sticky-footer-navbar.css" />

  <!-- LÓGICA PARA CHAMAR UM STYLE ESPECIFICO DA VIEW -->
  <?php if (isset($styles)) {
    foreach ($styles as $style_name) {
      $href = base_url() . $style_name; ?>
          <link href="<?=$href?>" rel="stylesheet">
    <?php }
  } ?>

</head>
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <span class="navbar-brand">Engajamento</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>restrict/">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>lideres/">Líderes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url(); ?>usuarios/">Usuários</a>
        </li>
      </ul>
      <div class="form-inline mt-2 mt-md-0">
        <span class="white">Olá, <?= $this->session->userdata("nome"); ?></span>&nbsp;&nbsp;
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><a class="text-uppercase" href="<?= base_url(); ?>login/logoff">Sair</a></button>
      </div>
    </div>
  </nav>
</header>
<body class="d-flex flex-column h-100">