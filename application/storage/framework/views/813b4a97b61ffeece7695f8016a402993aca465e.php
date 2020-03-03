<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Cadastro de Revisão')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('revisao.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" id="id" value="<?php echo e(base64_encode($model->id)); ?>">

                            <div class="form-group row">
                                <label for="tx_data" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Data da Revisão')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="tx_data" type="date" class="form-control <?php $__errorArgs = ['tx_data'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inteiro" name="tx_data"
                                           value="<?php echo e($model->tx_data ?? old('tx_data')); ?>" required
                                           autocomplete="tx_data" autofocus maxlength="1">

                                    <?php $__errorArgs = ['tx_data'];
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
                                <label for="dt_revisao" class="col-md-2 col-form-label text-md-right">
                                    <?php echo e(__('Data Cadastro')); ?> <span class="required">*</span>
                                </label>

                                <div class="col-md-10">
                                    <input id="dt_revisao" type="date" class="form-control <?php $__errorArgs = ['dt_revisao'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> inteiro" name="dt_revisao"
                                           value="<?php echo e($model->dt_revisao ?? old('dt_revisao')); ?>" required
                                           autocomplete="dt_revisao" autofocus maxlength="1">

                                    <?php $__errorArgs = ['dt_revisao'];
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

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fa fa-send"></span>
                                        <?php echo e(__('Salvar')); ?>

                                    </button>
                                    <a href="<?php echo e(route('revisao.index')); ?>" class="btn btn-danger">
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/revisao/formulario.blade.php ENDPATH**/ ?>