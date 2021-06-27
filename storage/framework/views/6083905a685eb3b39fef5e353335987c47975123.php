<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('isAdmin')): ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('User Panel')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-8 sm:mt-0 px-4 py-5 bg-white sm:p-6 shadow rounded-md">
                
                <div class="table w-full">
                    <div class="table-row-group">
                        <div class="table-row text-center text-white">
                            <div class="table-cell text-black w-1/6 p-2">
                                #
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
                        <?php
                            $i=1;
                        ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="table-row text-center">
                                <div class="table-cell p-2"><?php echo e($i++); ?></div>
                                <div class="table-cell p-2"><a class="hover:text-blue-600" href="<?php echo e(url("admin/$user->id")); ?>"><?php echo e($user->name); ?></a></div>
                                <div class="table-cell p-2"><a href="mailto:<?php echo e($user->email); ?>" class="hover:text-blue-600"><?php echo e($user->email); ?></a></div>
                                <div class="table-cell p-2">
                                    
                                    <?php echo Form::open(['action' => ['App\Http\Controllers\AdminController@update', $user->id], 'method' => 'PUT', 'class' => 'grid grid-col-2']); ?>

                                        <div>
                                            <select name="user_type" class="focus:ring-blue-100 focus:ring-4 rounded">
                                                <?php if($user->user_type == 'admin'): ?>
                                                    <option>admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                <?php elseif($user->user_type == 'employee'): ?>{
                                                    <option>employee</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                }<?php elseif($user->user_type == 'seller'): ?>{
                                                    <option>seller</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="user">User</option>
                                                    <option value="block">block</option>
                                                }<?php elseif($user->user_type == 'user'): ?>{
                                                    <option>user</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="block">block</option>
                                                }<?php else: ?>{
                                                    <option>block</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                    <option value="seller">Seller</option>
                                                    <option value="user">User</option>
                                                }                                                
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit" class="bg-blue-500 text-white mt-2 px-9 py-2 rounded hover:bg-blue-600">Change</button>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\xampp\htdocs\graduation\resources\views/admin/users/index.blade.php ENDPATH**/ ?>