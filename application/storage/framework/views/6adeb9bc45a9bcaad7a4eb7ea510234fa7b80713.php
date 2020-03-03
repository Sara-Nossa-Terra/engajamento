<?php $__env->startSection('content'); ?>
    <div class="container">

        <h4 class="text-center">Lista de Atividades</h4>
        <a href="<?php echo e(route('atividades.create')); ?>" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome da Atividade</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $aItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pAjudadas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('atividades.edit', base64_encode($pAjudadas->id))); ?>"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?php echo e(route('atividades.delete', base64_encode($pAjudadas->id))); ?>"
                               class="btn btn-danger link-excluir" title="Excluir">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                        <td><?php echo e($pAjudadas->tx_nome); ?></td>
                        <td><?php echo e($pAjudadas->tx_dia); ?></td>
                        
                        <td><?php echo e($pAjudadas->tx_hora); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($aItens->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/atividades/index.blade.php ENDPATH**/ ?>