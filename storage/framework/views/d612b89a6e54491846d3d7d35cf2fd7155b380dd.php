<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('Add New Item')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="<?php echo e(url('/seller/itemPanel')); ?>" class="p-3 bg-indigo-300 text-white rounded"><?php echo e(__('Back')); ?></a>
            </div>

            <div class="flex flex-col">
                <div class="bg-white shadow-md rounded-3xl p-5 dark:bg-gray-900">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto dark:text-gray-200">Item Info</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <script>
                        var showImg = function(event) {
                            var image = document.getElementById('imgUploded');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };

                        var showImg2 = function(event) {
                            var image = document.getElementById('imgUploded2');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };

                        var showImg3 = function(event) {
                            var image = document.getElementById('imgUploded3');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };

                        var showImg4 = function(event) {
                            var image = document.getElementById('imgUploded4');
                            image.src = URL.createObjectURL(event.target.files[0]);
                        };
                        </script>
                    <div class="mt-5">
                        <?php echo Form::open(['action' => 'App\Http\Controllers\ItemController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

                        <div class="md:space-y-2 mb-3">
                            <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('Main image')); ?><abbr class="hidden" title="required">*</abbr></label>
                            <div class="flex items-center py-6">
                                <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                    <img class="w-12 h-12 mr-4 object-cover" id="imgUploded">
                                </div>
                                <label class="cursor-pointer ">
                                <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg"><?php echo e(__('Browse')); ?></span>
                                <input type="file" class="hidden" :accept="image/x-png,image/jpg,image/jpeg" name="img" required onchange="showImg(event)">
                                </label>
                            </div>
                        </div>
                        <div class="md:space-y-2 mb-3">
                            <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('Second image')); ?></label>
                            <div class="flex items-center py-6">
                                <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                    <img class="w-12 h-12 mr-4 object-cover" id="imgUploded2">
                                </div>
                                <label class="cursor-pointer ">
                                <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg"><?php echo e(__('Browse')); ?></span>
                                <input type="file" class="hidden" :accept="image/x-png,image/jpg,image/jpeg" name="img2" onchange="showImg2(event)">
                                </label>
                            </div>
                        </div>
                        <div class="md:space-y-2 mb-3">
                            <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('3rd image')); ?></label>
                            <div class="flex items-center py-6">
                                <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                    <img class="w-12 h-12 mr-4 object-cover" id="imgUploded3">
                                </div>
                                <label class="cursor-pointer ">
                                <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg"><?php echo e(__('Browse')); ?></span>
                                <input type="file" class="hidden" :accept="image/x-png,image/jpg,image/jpeg" name="img3" onchange="showImg3(event)">
                                </label>
                            </div>
                        </div>
                        <div class="md:space-y-2 mb-3">
                            <label class="text-xs font-semibold text-gray-600 py-2 dark:text-gray-100"><?php echo e(__('4th image')); ?></label>
                            <div class="flex items-center py-6">
                                <div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
                                    <img class="w-12 h-12 mr-4 object-cover" id="imgUploded4">
                                </div>
                                <label class="cursor-pointer ">
                                <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-indigo-400 hover:bg-indigo-500 hover:shadow-lg"><?php echo e(__('Browse')); ?></span>
                                <input type="file" class="hidden" :accept="image/x-png,image/jpg,image/jpeg" name="img4" onchange="showImg4(event)">
                                </label>
                            </div>
                        </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Item title')); ?><abbr title="required">*</abbr></label>
                                    <input placeholder="Item Name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="text" name="title">
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Price')); ?> <abbr title="required">*</abbr></label>
                                    <input placeholder="Price" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="number" name="price">
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Discount')); ?></label>
                                    <input placeholder="Discount in %" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" value="0" type="number" name="discount">
                                </div>
                            </div>
                            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Contact number')); ?><abbr title="required">*</abbr></label>
                                    <input placeholder="Contact Number" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 dark:bg-gray-400" required="required" type="text" name="contact_number">
                                </div>
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Status')); ?><abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="available" id="integration_city_id">
                                        <option value="active"><?php echo e(__('Active')); ?></option>
                                        <option value="not"><?php echo e(__('Not active')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2"><?php echo e(__('Category')); ?><abbr title="required">*</abbr></label>
                                    <select class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full dark:bg-gray-400" required="required" name="category_id" id="integration_city_id">
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Description</label>
                                <textarea required="" name="description" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 dark:bg-gray-400" placeholder="Enter your item info" spellcheck="false"></textarea>
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <a href="<?php echo e(url('/seller/itemPanel')); ?>" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 dark:text-gray-100 dark:bg-gray-500  dark:hover:bg-gray-600"> <?php echo e(__('Cancel')); ?> </a>
                                <button type="submit" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500"><?php echo e(__('Save')); ?></button>
                            </div>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/seller/items/create.blade.php ENDPATH**/ ?>