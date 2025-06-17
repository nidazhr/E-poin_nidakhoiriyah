<?php $__env->startSection('content'); ?>

<h1 class="text-white text-center mb-4">Login</h1>

<form action="<?php echo e(route('authenticate')); ?>" method="post" class="bg-white p-4 rounded shadow">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="d-grid">
        <input type="submit" value="Login" class="btn text-white" style="background-color: #5F52D3;">
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\E-poin_nidakhoiriyah\resources\views/auth/login.blade.php ENDPATH**/ ?>