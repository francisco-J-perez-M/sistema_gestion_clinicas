<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h3>Editar Cita Médica</h3>
    <h5>CRUD: Citas -> Edición</h5>
    <hr><br>

    <form action="<?php echo e(route('citas.update', $cita->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Selección del Médico -->
        <div class="input-group mb-3">
            <select class="form-select" id="id_medico" name="id_medico" required>
                <option disabled>Selecciona un médico...</option>
                <?php $__currentLoopData = $medicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($medico->id_medico); ?>" <?php echo e($cita->id_medico == $medico->id_medico ? 'selected' : ''); ?>>
                        <?php echo e($medico->nombre); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label class="input-group-text" for="id_medico">Médicos</label>
        </div>

        <!-- Selección del Paciente -->
        <div class="input-group mb-3">
            <select class="form-select" id="id_paciente" name="id_paciente" required>
                <option disabled>Selecciona un paciente...</option>
                <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($paciente->id_paciente); ?>" <?php echo e($cita->id_paciente == $paciente->id_paciente ? 'selected' : ''); ?>>
                        <?php echo e($paciente->nombres); ?> <?php echo e($paciente->apellido_paterno); ?> <!-- Mostrar nombres y apellidos -->
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <label class="input-group-text" for="id_paciente">Pacientes</label>
        </div>

        <!-- Campo para la fecha y hora -->
        <div class="input-group mb-3">
            <input type="datetime-local" class="form-control" name="fecha_hora" value="<?php echo e(\Carbon\Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i')); ?>" id="floatingFechaHora" required>
            <label class="input-group-text" for="floatingFechaHora">Fecha y Hora</label>
        </div>

        <hr><br>

        <!-- Botones de acción -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?php echo e(route('citas.index')); ?>" class="btn btn-danger">Cancelar</a>
    </form>

    <br><br><br>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\polaris\resources\views/citas/edit.blade.php ENDPATH**/ ?>