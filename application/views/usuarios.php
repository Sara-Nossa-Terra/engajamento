
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
  	<a class="btn btn-info float-right text-uppercase" href="<?= base_url(); ?>novoUsuario/">Criar Usuário</a>
    <h1 class="mt-5">Usuários</h1>
    <br />
    <table id="listarUsuarios" class="table table-striped table-bordered" cellspacing="0" width="100%">
		  <thead>
		    <tr>
		      <th class="th-sm text-center text-uppercase">Nome</th>
		      <th class="th-sm text-center text-uppercase">Email</th>
		      <th class="th-sm text-center text-uppercase">Telefone</th>
		      <th class="th-sm text-center text-uppercase">Status</th>
		      <th class="th-sm text-center text-uppercase">Ação</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
        if(!empty($users)){
          foreach($users as $user){ ?>
            <tr>
              <td class="text-center"><?= $user["nome"]; ?></td>
              <td class="text-center"><?= $user["email"]; ?></td>
              <td class="text-center"><?= (!$user["telefone"] ? '-' : $user["telefone"]); ?></td>
              <td class="text-center"><?= ($user["status_2"] == 1 ? "<span style='font-size: 15px;' class='badge badge-success'>ATIVO</span>" : "<span style='font-size: 15px;' class='badge badge-danger'>INATIVO</span>"); ?></td>
              <td class="text-center text-uppercase" style="width: 80px;">
                <div class="btn-group">
                  <button class="btn btn-primary text-uppercase"><a href="<?= base_url().'editarUsuario?id='.$user["id_usuario"]; ?>">Editar</a></button>
                </div>
              </td>
            </tr>
        	<?php
          } // FOREACH
        } // IF ?>
		  </tbody>
		</table>
  </div>
</main>