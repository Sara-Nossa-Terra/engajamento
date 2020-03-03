<?php $__env->startSection('content'); ?>
    <div class="container">

        <h4 class="text-center">Lista de Pessoas Ajudadas</h4>
        <a href="<?php echo e(route('pessoasajudadas.create')); ?>" class="btn-novo btn btn-success">
            <i class="fa fa-plus"></i>&nbsp;Novo
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered dataTable">
                <thead class="thead-light">
                <tr>
                    <th>Ações</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Líder</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $aItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pAjudadas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('pessoasajudadas.edit', base64_encode($pAjudadas->id))); ?>"
                               class="btn btn-primary" title="Editar">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?php echo e(route('pessoasajudadas.delete', base64_encode($pAjudadas->id))); ?>"
                               class="btn btn-danger link-excluir" title="Excluir">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                        <td><?php echo e($pAjudadas->tx_nome); ?></td>
                        <td><?php echo e($pAjudadas->dt_nascimento); ?></td>
                        
                        <td><?php echo e($pAjudadas->tx_telefone); ?></td>
                        <td><?php echo e($pAjudadas->lider->tx_nome); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($aItens->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pessoasajudadas/index.blade.php ENDPATH**/ ?>