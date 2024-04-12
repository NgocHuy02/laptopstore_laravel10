
 
<?php $__env->startSection('title', 'Profile Settings'); ?>
 
<?php $__env->startSection('contents'); ?>
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Profile
        </h1>
    </div>
</header>
<hr />
<form method="POST" enctype="multipart/form-data" action="">
    <div>
        <label class="label">
            <span class="text-base label-text">Name</span>
        </label>
        <input name="name" type="text" value="<?php echo e(auth()->user()->name); ?>" class="w-full input input-bordered" />
    </div>
    <div>
        <label class="label">
            <span class="text-base label-text">Email</span>
        </label>
        <input name="email" type="text" value="<?php echo e(auth()->user()->email); ?>" class="w-full input input-bordered" />
    </div>
    <div class="mt-6">
        <button type="submit" class="btn btn-block">Save Profile</button>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\laptopstore-app\resources\views/userprofile.blade.php ENDPATH**/ ?>