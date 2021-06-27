<?php if(count($errors) > 0): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-red-300 text-red-700 pt-2 pb-2 pr-4 pl-4 rounded">
            <?php echo e($error); ?>

        </div>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="bg-green-300 text-green-700 pt-2 pb-2 pr-4 pl-4 rounded">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="bg-red-300 text-red-700 pt-2 pb-2 pr-4 pl-4 rounded">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php /**PATH C:\xampp\htdocs\graduation\resources\views/inc/messages.blade.php ENDPATH**/ ?>