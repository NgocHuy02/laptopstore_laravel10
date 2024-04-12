

<?php $__env->startSection('title', 'Home Brand List'); ?>

<?php $__env->startSection('contents'); ?>
<div>
    <h1 class="font-bold text-2xl ml-3">Home Brand List</h1>
    <a href="<?php echo e(route('admin/brands/create')); ?>" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Brand</a>
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
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if($brand->count() > 0): ?>
            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo e($loop->iteration); ?>

                </th>
                <td class="px-6 py-4">
                    <?php echo e($rs->name); ?>

                </td>
                <td class="px-6 py-4">
                    <div class="w-20 h-20">
                        <img class="w-full h-full object-cover" src="<?php echo e(asset($rs->image)); ?>" alt="<?php echo e($rs->name); ?>">
                    </div>
                </td>
                <td class="w-36 px-6 py-4">
                    <div class="flex items-center">
                        <a href="<?php echo e(route('admin/brands/show', $rs->id)); ?>" class="text-blue-800 hover:underline">Detail</a>
                        <a href="<?php echo e(route('admin/brands/edit', $rs->id)); ?>" class="text-green-800 ml-2 hover:underline">Edit</a>
                        <form action="<?php echo e(route('admin/brands/destroy', $rs->id)); ?>" method="POST" onsubmit="return confirm('Delete?')" class="ml-2">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-800 hover:underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <tr>
                <td class="text-center py-4" colspan="5">Brand not found</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\laptopstore-app\resources\views/brands/index.blade.php ENDPATH**/ ?>