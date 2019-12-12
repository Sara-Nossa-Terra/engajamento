
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
  	<h1 class="mt-5"><?= $user->nome; ?></h1>
  	<!-- ALERTAS DE USUÁRIO CRIADO -->
  	<div class="alert alert-success" role="alert" id="user_alert" style="display: none;"></div>
  	<br />
    <form id="editar_usuario" method="post">
    	<input type="hidden" id="id_usuario" name="id_usuario" value="<?= $user->id_usuario; ?>">
    	<div>
	    	<div class="form-group">
			    <label for="nome">Nome <span class="red">*</span></label>
			    <input type="text" class="form-control" id="nome" name="nome" value="<?= $user->nome; ?>">
			  </div>
			  <span class="help-block mt-n15 red"></span>
			</div>
			<div>
	    	<div class="form-group">
			    <label for="email">Email <span class="red">*</span></label>
			    <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>">
			  </div>
			  <span class="help-block mt-n15 red"></span>
			</div>
			<div>
			  <div class="form-group">
			    <label for="telefone">Telefone</label>
			    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?= $user->telefone; ?>">
			  </div>
			  <span class="help-block mt-n15 red"></span>
			</div>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" id="status" name="status" <?= ($user->status_2 == 1 ? 'checked' : ''); ?>>
			  <label class="custom-control-label" for="status">Status</label>
			</div>
			<button type="submit" class="btn btn-primary float-right text-uppercase">Editar</button>
		  <button type="submit" class="btn btn-secondary float-right text-uppercase" style="margin-right: 5px;"><a href="<?= base_url().'usuarios/' ?>">Cancelar</a></button>
		  <div id="loading" class="spinner-border float-right" role="status" style="margin-right: 5px;display: none;"></div>
    </form>
  </div>
</main>