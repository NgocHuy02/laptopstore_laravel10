
 
<?php $__env->startSection('title', 'Show Product'); ?>
 
<?php $__env->startSection('contents'); ?>
<h1 class="font-bold text-2xl ml-3">Detail Product</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Title</label>
            <div class="mt-2">
                <?php echo e($product->title); ?>

            </div>
        </div>
 
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Price</label>
            <div class="mt-2">
                <?php echo e($product->price); ?>

            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Product Code</label>
            <div class="mt-2">
                <?php echo e($product->product_code); ?>

            </div>
        </div>
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Description</label>
            <div class="mt-2">
                <?php echo e($product->description); ?>

            </div>
        </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\laptopstore-app\resources\views/products/show.blade.php ENDPATH**/ ?>