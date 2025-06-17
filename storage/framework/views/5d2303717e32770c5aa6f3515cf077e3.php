<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tambah Akun</title>
</head>

<body>
  <h1>Register</h1>
  <br><br>

  <a href="<?php echo e(route('akun.index')); ?>">Kembali</a><br><br>

  <?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <?php endif; ?>

  <form action="<?php echo e(route('akun.store')); ?>" method="GET">

    <?php echo csrf_field(); ?>
    <label>Nama Lengkap</label><br>
    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>"><br>

    <br>
    <label>Email Address</label><br>
    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>"><br>

    <br>
    <label>Password</label><br>
    <input type="password" id="password" name="password"><br>

    <br>
    <label for="password_confirmation" class="col-md-4 col-fom-label text-md-end text-start">Confirm Password</label>
    <div class="col-md-6">
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <label>Hak Akses</label><br>
    <select name="usertype" required>
      <option value="">Pilih Hak Akses</option>
      <option value="admin">Admin</option>
      <option value="ptk">PTK</option>
    </select>
    <br><br>

    <input type="submit" value="Register">
  </form>
</body>

</html><?php /**PATH C:\laragon\www\E-poin_nidakhoiriyah\resources\views/admin/akun/create.blade.php ENDPATH**/ ?>