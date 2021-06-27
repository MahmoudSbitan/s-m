<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('Sales Panel')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-auto p-2">
                                #
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed">
                                status
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                date
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                User Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Item Id
                            </div>
                        </div>
                        <?php
                            $i=1;
                        ?>
                        <?php if(count($sales) > 0): ?>
                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="table-row text-center">
                                    <div class="table-cell p-2"><?php echo e($i++); ?></div>
                                    <div class="table-cell p-2"><?php echo e($sale->status); ?></div>
                                    <div class="table-cell p-2"><?php echo e($sale->time_stamp); ?></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="<?php echo e(url("admin/$sale->user_id")); ?>"><?php echo e($sale->user_id); ?></a></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="<?php echo e(url("item/$sale->item_id")); ?>"><?php echo e($sale->item_id); ?></a></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p class="p-2">No sales yet 💔</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/admin/sales/index.blade.php ENDPATH**/ ?>