<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('User Panel')); ?> - <?php echo e($user->name); ?> 
        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-1/6 p-2">
                                ID
                            </div>
                            <div class="table-cell bg-gray-200 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Name
                            </div>
                            <div class="table-cell bg-gray-300 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Email
                            </div>
                            <div class="table-cell bg-gray-400 w-1/6 p-2 border-2 border-gray-50 border-dashed">
                                User Type
                            </div>
                        </div>

                        <div class="table-row text-center">
                            <div class="table-cell p-2"><?php echo e($user->id); ?></div>
                            <div class="table-cell p-2"><?php echo e($user->name); ?></div>
                            <div class="table-cell p-2"><a href="mailto:<?php echo e($user->email); ?>" class="hover:text-blue-600"><?php echo e($user->email); ?></a></div>
                        </div>
                        <?php
                            $i=1;
                        ?>
                        <?php if($user->user_type == 'admin'): ?>
                            <p>Admin</p>
                        <?php elseif($user->user_type == 'employee'): ?>{
                            
                        }<?php elseif($user->user_type == 'seller'): ?>{
                            
                        }<?php elseif($user->user_type == 'user'): ?>{
                            
                        }<?php else: ?>{
                            <div class="bg-red-200 text-red-600 rounded p-2">
                                <p>Blocked</p>
                            </div>
                            
                        }                                                
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/admin/users/userInfo.blade.php ENDPATH**/ ?>