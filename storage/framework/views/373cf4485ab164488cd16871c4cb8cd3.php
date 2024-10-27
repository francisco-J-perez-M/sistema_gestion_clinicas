<?php $__env->startSection('content'); ?>
<body>
    <div class="container mt-5">
        <h3>Nueva Cita Médica</h3>
        <h5>CRUD: Citas -> Registro</h5>
        <hr><br>
        
        <form action="<?php echo e(route('citas.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


            <!-- Selección del Médico -->
            <div class="input-group mb-3">
                <select class="form-select" id="id_medico" name="id_medico" required>
                    <option selected disabled>Selecciona un médico...</option>
                    <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($medico->id); ?>"><?php echo e($medico->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <label class="input-group-text" for="id_medico">Médicos</label>
            </div>

            <!-- Selección del Paciente -->
<div class="input-group mb-3">
    <select class="form-select" id="id_paciente" name="id_paciente" required>
        <option selected disabled>Selecciona un paciente...</option>
        <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($paciente->id); ?>"><?php echo e($paciente->nombres); ?> <?php echo e($paciente->apellido_paterno); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <label class="input-group-text" for="id_paciente">Pacientes</label>
</div>


            <!-- Campo para la fecha y hora -->
            <div class="input-group mb-3">
                <input type="datetime-local" class="form-control" name="fecha_hora" value="<?php echo e(old('fecha_hora')); ?>" id="floatingFechaHora" required>
                <label class="input-group-text" for="floatingFechaHora">Fecha y Hora</label>
            </div>

            <hr><br>

            <!-- Botones de acción -->
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="<?php echo e(route('citas.index')); ?>" class="btn btn-danger">Cancelar</a>
        </form>

        <br><br><br>
    </div>
</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\polaris\resources\views/citas/create.blade.php ENDPATH**/ ?>