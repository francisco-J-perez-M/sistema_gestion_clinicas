<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h3>Lista de Citas Médicas</h3>
    <h5>CRUD: Citas</h5>
    <hr><br>

    <a href="<?php echo e(route('citas.create')); ?>" class="btn btn-primary mb-3">Nueva Cita</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Médico</th>
                <th>Fecha y Hora</th>
                <th>Paciente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $citas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cita->id); ?></td>
                    <td><?php echo e($cita->medico->nombre); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('d/m/Y H:i')); ?></td> <!-- Formato de fecha y hora -->
                    <td><?php echo e($cita->paciente->nombres); ?> <?php echo e($cita->paciente->apellido_paterno); ?></td> <!-- Mostrando nombres y apellidos -->
                    <td>
                        <a href="<?php echo e(route('citas.edit', $cita->id)); ?>" class="btn btn-warning">Editar</a>
                        <form action="<?php echo e(route('citas.destroy', $cita->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\polaris\resources\views/citas/index.blade.php ENDPATH**/ ?>