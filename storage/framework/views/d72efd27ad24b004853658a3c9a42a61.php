
 
<?php $__env->startSection('title', 'Home Product List'); ?>
 
<?php $__env->startSection('contents'); ?>
<div>
    <h1 class="font-bold text-2xl ml-3">Home Product List</h1>
    <a href="<?php echo e(route('admin/products/create')); ?>" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Product</a>
    <hr />
    <?php if(Session::has('success')): ?>
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <?php echo e(Session::get('success')); ?>

    </div>
    <?php endif; ?>
 
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Product Code</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($product->count() > 0): ?>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo e($loop->iteration); ?>

                </th>
                <td>
                    <?php echo e($rs->title); ?>

                </td>
                <td>
                    <?php echo e($rs->price); ?>

                </td>
                <td>
                    <?php echo e($rs->product_code); ?>

                </td>
                <td>
                    <?php echo e($rs->description); ?>

                </td>
                <td class="w-36">
                    <div class="h-14 pt-5">
                        <a href="<?php echo e(route('admin/products/show', $rs->id)); ?>" class="text-blue-800">Detail</a> |
                        <a href="<?php echo e(route('admin/products/edit', $rs->id)); ?>" class="text-green-800 pl-2">Edit</a> |
                        <form action="<?php echo e(route('admin/products/destroy', $rs->id)); ?>" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-800">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td class="text-center" colspan="5">Product not found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\laptopstore-app\resources\views/products/index.blade.php ENDPATH**/ ?>