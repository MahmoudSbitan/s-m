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
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md dark:bg-gray-900">
                <div class="items-center text-center mb-5">
                    <a href="<?php echo e(url('/seller/newItem')); ?>" class="p-3 bg-indigo-600 text-white rounded hover:bg-indigo-800"><?php echo e(__('Add New item')); ?></a>
                </div>

                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-auto p-2 dark:text-white">
                                #
                            </div>
                            <div class="table-cell bg-gray-200 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Image')); ?> 
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Title')); ?> 
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Price')); ?> 
                            </div>
                            <div class="table-cell bg-gray-300 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Discount')); ?> 
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Status')); ?>

                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Comapny Status')); ?> 
                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Category')); ?>

                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Date')); ?>

                            </div>
                            <div class="table-cell bg-gray-400 w-auto p-2 border-2 border-gray-50 border-dashed dark:bg-gray-600 dark:border-gray-400">
                                <?php echo e(__('Change / Delete')); ?> 
                            </div>
                        </div>
                        <?php
                            $i=1;
                        ?>
                        <?php if(count($items) > 0): ?>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="table-row text-center">
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($i++); ?></div>
                                    <div class="table-cell p-2 dark:text-white"><img src="<?php echo e(asset("/storage/photos/$item->img")); ?>" alt="" class="h-20"></div>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($item->title); ?></div>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($item->price); ?></div>
                                    <?php if($item->discount > 0): ?>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($item->discount); ?>%</div>
                                    <?php else: ?>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e(__('There is no discount')); ?> </div>
                                    <?php endif; ?>
                                    <div class="table-cell p-2">
                                        <?php echo Form::open(['action' => ['App\Http\Controllers\ItemController@update', $item->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']); ?>

                                            <div>
                                                <select name="available" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                    <?php if($item->available == 'active'): ?>
                                                        <option><?php echo e(__('Active')); ?></option>
                                                        <option value="not"><?php echo e(__('Deactivate')); ?></option>
                                                    <?php else: ?>
                                                        <option><?php echo e(__('Deactivate')); ?></option>
                                                        <option value="active"><?php echo e(__('active')); ?></option>                    
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="bg-blue-500 text-white mt-2 px-9 py-2 rounded hover:bg-blue-600"><?php echo e(__('Change')); ?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="table-cell p-2 dark:text-white">
                                        <?php if($item->status == '1'): ?>
                                            <p class="text=gray-350"><?php echo e(__('Under review')); ?></p>
                                        <?php elseif($item->status == '2'): ?>
                                            <p class="text-green-400"><?php echo e(__('Accepted')); ?></p>
                                        <?php else: ?>    
                                        <p class="text-red-400"><?php echo e(__('Rejected')); ?></p>                    
                                        <?php endif; ?>
                                    </div>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($item->category_id); ?></div>
                                    <div class="table-cell p-2 dark:text-white"><?php echo e($item->created_at); ?></div>
                                    <div class="table-cell p-2 items-center dark:text-white">
                                        <a href="<?php echo e(url("/item/$item->id/edit")); ?>" class="bg-blue-400 hover:bg-blue-500">
                                            Change
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                              </svg>
                                        </a>
                                    </div>
                                    <hr>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p class="p-2 dark:text-white">No items yet 💔</p>
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
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/seller/items/itemsPanel.blade.php ENDPATH**/ ?>