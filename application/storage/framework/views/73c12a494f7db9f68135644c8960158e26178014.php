<?php $__env->startSection('content'); ?>
    <div class="container">

        <h4 class="text-center">Lista de Líderes</h4>
        <a href="<?php echo e(route('lideres.create')); ?>" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Líder</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $aItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('lideres.edit', base64_encode($usuario->id))); ?>"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <?php if( $usuario->id !== auth()->user()->id ): ?>
                                <a href="<?php echo e(route('lideres.delete', base64_encode($usuario->id))); ?>"
                                   class="btn btn-danger link-excluir" title="Excluir">
                                    <span class="fa fa-trash"></span>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($usuario->tx_nome); ?></td>
                        
                        <td><?php echo e($usuario->dt_nascimento); ?></td>
                        <td><?php echo e($usuario->email); ?></td>
                        <td><?php echo e($usuario->user->tx_nome ?? $usuario->tx_nome); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($aItens->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/lideres/index.blade.php ENDPATH**/ ?>