<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Cadastro de Líder')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('lideres.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="id" value="<?php echo e(base64_encode($model->id)); ?>">

                            <div class="form-group row">
                                <label for="lider_id" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Líder')); ?>

                                </label>

                                <div class="col-md-10">
                                    <select name="lider_id" class="form-control" data-show-subtext="true"
                                            id="lider_id" data-live-search="true">
                                        <option selected disabled>Selecione</option>
                                        <?php $__currentLoopData = $lideres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($lider->id); ?>" <?php echo e(( $model->lider_id == $lider->id ) ? 'selected' : ''); ?>>
                                                <?php echo e($lider->tx_nome); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_nome" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Nome')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_nome" type="text" class="form-control <?php $__errorArgs = ['tx_nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tx_nome" value="<?php echo e($model->tx_nome ?? old('tx_nome')); ?>" required
                                           autocomplete="tx_nome" autofocus maxlength="200">

                                    <?php $__errorArgs = ['tx_nome'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dt_nascimento" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Data de Nascimento')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="dt_nascimento" type="date" class="form-control <?php $__errorArgs = ['dt_nascimento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dt_nascimento"
                                           value="<?php echo e($model->dt_nascimento ?? old('dt_nascimento')); ?>" required
                                           autocomplete="dt_nascimento" autofocus>

                                    <?php $__errorArgs = ['dt_nascimento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tx_telefone" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Telefone')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_telefone" type="text" class="form-control <?php $__errorArgs = ['tx_telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tx_telefone"
                                           value="<?php echo e($model->tx_telefone ?? old('tx_telefone')); ?>" required
                                           autocomplete="tx_telefone" autofocus>

                                    <?php $__errorArgs = ['tx_telefone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('E-Mail')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="email" type="email" class="form-control
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                           value="<?php echo e($model->email ?? old('email')); ?>"
                                           required autocomplete="email">

                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Senha')); ?>

                                </label>

                                <div class="col-md-10">
                                    <input id="password" type="password" class="form-control
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                                           autocomplete="new-password">

                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Confirmação de Senha')); ?>

                                </label>

                                <div class="col-md-10">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fa fa-send"></span>
                                        <?php echo e(__('Salvar')); ?>

                                    </button>
                                    <a href="<?php echo e(route('lideres.index')); ?>" class="btn btn-danger">
                                        <span class="fa fa-reply"></span>
                                        <?php echo e(__('Voltar')); ?>

                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/lideres/formulario.blade.php ENDPATH**/ ?>