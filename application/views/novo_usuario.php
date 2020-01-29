<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
	<div class="container">
		<h1 class="mt-5">Novo Usuário</h1>
		<!-- ALERTAS DE USUÁRIO CRIADO -->
		<div class="alert alert-success" role="alert" id="user_alert" style="display: none;"></div>
		<br/>
		<form id="novo_usuario" method="post">
			<input type="hidden" id="status" name="status" value="1">
			<div>
				<div class="form-group">
					<label for="nome">Nome <span class="red">*</span></label>
					<input type="text" class="form-control" id="nome" name="tx_nome">
				</div>
				<span class="help-block mt-n15 red"></span>
			</div>
			<div>
				<div class="form-group">
					<label for="email">Email <span class="red">*</span></label>
					<input type="email" class="form-control" id="email" name="tx_email">
				</div>
				<span class="help-block mt-n15 red"></span>
			</div>
			<div>
				<div class="form-group">
					<label for="senha">Senha <span class="red">*</span></label>
					<input type="password" class="form-control" id="senha" name="tx_senha">
				</div>
				<span class="help-block mt-n15 red"></span>
			</div>
			<div>
				<div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="tel" class="form-control" id="telefone" name="nu_telefone">
				</div>
				<span class="help-block mt-n15 red"></span>
			</div>
			<button type="submit" class="btn btn-primary float-right text-uppercase">Criar</button>
			<button type="submit" class="btn btn-secondary float-right text-uppercase" style="margin-right: 5px;">
				<a href="<?= base_url() . 'usuarios/' ?>">Cancelar</a>
			</button>
			<div id="loading" class="spinner-border float-right" role="status"
				 style="margin-right: 5px;display: none;">
			</div>
		</form>
	</div>
</main>
