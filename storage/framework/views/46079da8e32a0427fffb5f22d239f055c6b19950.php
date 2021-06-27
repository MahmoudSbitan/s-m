<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('Items Panel')); ?>

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
                            <div class="table-cell bg-gray-200 w-2/6 p-2 border-2 border-gray-50 border-dashed">
                                Icon
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Title
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Status
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Category Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                User Id
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed">
                                Employee Id
                            </div>
                        </div>
                        <?php
                            $i=1;
                        ?>
                        <?php if(count($items) > 0): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="table-row text-center">
                                    <div class="table-cell p-2"><?php echo e($i++); ?></div>
                                    <div class="table-cell p-2"><img src="<?php echo e(asset("/storage/photos/$item->img")); ?>" alt="" width="100px"></div>
                                    <div class="table-cell p-2"><?php echo e($item->title); ?></div>
                                    <div class="table-cell p-2">
                                        <?php echo Form::open(['action' => ['App\Http\Controllers\ItemController@update', $item->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']); ?>

                                            <div>
                                                <select name="status" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                    <?php if($item->status == 'active'): ?>
                                                        <option>Active</option>
                                                        <option value="deactivate">Deactivate</option>
                                                    <?php else: ?>{
                                                        <option>Deactivate</option>
                                                        <option value="active">active</option>
                                                    }                        
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="bg-blue-500 text-white mt-2 px-9 py-2 rounded hover:bg-blue-600"><?php echo e(__('Change')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-cell p-2"><?php echo e($item->category_id); ?></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="<?php echo e(url("admin/$item->user_id")); ?>"><?php echo e($item->user_id); ?></a></div>
                                    <div class="table-cell p-2"><a class="hover:text-blue-600" href="<?php echo e(url("admin/$item->employee_id")); ?>"><?php echo e($item->employee_id); ?></a></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p class="p-2">No items yet 💔</p>
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
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/admin/items/index.blade.php ENDPATH**/ ?>