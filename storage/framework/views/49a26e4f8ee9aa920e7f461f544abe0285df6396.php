<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__("$title")); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="<?php echo e(url('/panels/categoryPanel')); ?>" class="p-3 bg-indigo-400 hover:bg-indigo-500 text-white rounded"><?php echo e(__('Back')); ?></a>
            </div>
            <div class="flex flex-col ">
                <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <script>
                        var showImg = function(event) {
                            var image = document.getElementById('imgUploded');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                    </script>
                    <div class="mt-5">
                        <?php echo Form::open(['action' => ['App\Http\Controllers\CategoryController@update', $category->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']); ?>

                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('Category icon')); ?><abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex items-center py-6">
                                    <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-12 h-12 mr-4 object-cover" id="imgUploded" src="<?php echo e(asset("/storage/photos/$category->img")); ?>">
                                    </div>
                                    <label class="cursor-pointer ">
                                    <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg"><?php echo e(__('Browse')); ?></span>
                                    <input type="file" class="hidden" :accept="image/x-png,image/jpg,image/jpeg" name="img" onchange="showImg(event)">
                                    </label>
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('Category title')); ?><abbr title="required">*</abbr></label>
                                    <input placeholder="Category Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="text" name="title" id="integration_shop_name" value="<?php echo e($category->title); ?>">
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('Status')); ?><abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="status" id="integration_city_id">
                                        <?php if($category->status == 'active'): ?>
                                        <option value="active"><?php echo e(__('Active')); ?></option>
                                        <option value="not active"><?php echo e(__('Not Active')); ?></option>
                                        <?php else: ?>{
                                            <option value="not active"><?php echo e(__('Deactivate')); ?></option>
                                            <option value="active"><?php echo e(__('Active')); ?></option>
                                        }                        
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            </p>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600"><?php echo e(__('Cancel')); ?>  </a>
                                <button class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500" type="submit"><?php echo e(__('Change')); ?></button>
                            </div>
                        </form>
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
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/admin/categories/edit.blade.php ENDPATH**/ ?>