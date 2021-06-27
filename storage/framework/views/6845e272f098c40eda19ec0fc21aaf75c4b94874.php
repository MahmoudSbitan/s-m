<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            <?php echo e(__('show')); ?> | <?php echo e($item->title); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col md:flex-row -mx-4">
          <div class="md:flex-1 px-4">
            <div x-data="{ image: 1 }" x-cloak>
              <div class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4">
                <div x-show="image === 1" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                  <img class="w-auto max-h-60" src="<?php echo e(asset("/storage/photos/$item->img")); ?>" alt="">
                </div>
                <?php if($item->img2 != '--'): ?>
                <div x-show="image === 2" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                  <img class="w-auto max-h-60" src="<?php echo e(asset("/storage/photos/$item->img2")); ?>" alt="">
                </div>
                <?php endif; ?>
                
                <?php if($item->img3 != '--'): ?>
                <div x-show="image === 3" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                  <img class="w-auto max-h-60" src="<?php echo e(asset("/storage/photos/$item->img3")); ?>" alt="">
                </div>
                <?php endif; ?>

                <?php if($item->img4 != '--'): ?>
                <div x-show="image === 4" class="h-64 md:h-80 rounded-lg bg-gray-100 mb-4 flex items-center justify-center">
                  <img class="w-auto max-h-60" src="<?php echo e(asset("/storage/photos/$item->img4")); ?>" alt="">
                </div>
                <?php endif; ?>
              </div>
    
              <div class="flex -mx-2 mb-4">
                <?php if($item->img2 != '--' && $item->img3 != '--' && $item->img4 != '--'): ?>
                <template x-for="i in 4">
                  <div class="flex-1 px-2">
                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                      <span x-text="i" class="text-2xl"></span>
                    </button>
                  </div>
                </template>
                <?php elseif($item->img2 == '--' &&$item->img3 == '--' && $item->img4 == '--'): ?>
                <template x-for="i in 1">
                  <div class="flex-1 px-2">
                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                      <span x-text="i" class="text-2xl"></span>
                    </button>
                  </div>
                </template>
                <?php elseif($item->img3 == '--' && $item->img4 == '--'): ?>
                <template x-for="i in 2">
                  <div class="flex-1 px-2">
                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                      <span x-text="i" class="text-2xl"></span>
                    </button>
                  </div>
                </template>
                <?php else: ?>
                <template x-for="i in 1">
                  <div class="flex-1 px-2">
                    <button x-on:click="image = i" :class="{ 'ring-2 ring-indigo-300 ring-inset': image === i }" class="focus:outline-none w-full rounded-lg h-24 md:h-32 bg-gray-100 flex items-center justify-center">
                      <span x-text="i" class="text-2xl"></span>
                    </button>
                  </div>
                </template>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="md:flex-1 px-4">
            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl dark:text-white"><?php echo e($item->title); ?></h2>
            <p class="text-gray-500 text-sm dark:text-gray-300">By <a href="<?php echo e(url("/home/seller/$item->user_id")); ?>" class="text-indigo-600 hover:underline"><?php echo e($item->user_id); ?></a></p>

            <?php if($item->discount > 0): ?>
            <div class="flex items-center space-x-4 my-4">
              <div>
                <div class="rounded-lg bg-gray-100 flex py-2 px-3 dark:bg-gray-800">
                  <span class="text-indigo-400 mr-1 mt-1 dark:text-white">$</span>
                  <span class="font-bold text-indigo-600 text-3xl dark:text-white"><?php echo e($item->price - $item->price * ($item->discount / 100)); ?></span>
                  <p class="line-through dark:text-gray-200"><?php echo e($item->price); ?> $</p>
                </div>
              </div>
              <div class="flex-1">
                <p class="text-green-500 text-xl font-semibold">Save <?php echo e($item->discount); ?>%</p>
              </div>
            </div>
            <?php else: ?> 
            <div class="flex items-center space-x-4 my-4">
              <div>
                <div class="rounded-lg bg-gray-100 flex py-2 px-3 dark:bg-gray-800">
                  <span class="text-indigo-400 mr-1 mt-1 dark:text-white">$</span>
                  <span class="font-bold text-indigo-600 text-3xl dark:text-white"><?php echo e($item->price); ?></span>
                </div>
              </div>
              <div class="flex-1">
              </div>
            </div>
            <?php endif; ?>
    
            <p class="text-gray-500 dark:text-white"><?php echo e($item->title); ?></p>
    
            <div class="flex py-4 space-x-4">
              <div class="relative">
                <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>
                <select class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
    
                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
              </div>
    
              <button type="button" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php /**PATH C:\xampp\htdocs\graduation\resources\views/home/show.blade.php ENDPATH**/ ?>