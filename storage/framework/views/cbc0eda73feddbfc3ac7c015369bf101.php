<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
   <h1>Tambah Siswa</h1>
   <a href="<?php echo e(route('siswa.index')); ?>">Kembali</a><br><br>

   <?php if($errors->any()): ?>
   <div class="alert alert-danger">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
   </div>
   <?php endif; ?>

   <form action="<?php echo e(route('siswa.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?> <!-- <! <?php echo e(csrf_field()); ?>   -->
    <h2>Akun Siswa</h2>
    <label>Nama Lengkap</label><br>
    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>">
    <br><br>

    <label>Email Address</label><br>
    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
    <br><br>

    <label>Password</label><br>
    <input type="password" id="password" name="password">
    <br><br>
    
     <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
     <div class="col-mid-6">
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
     </div>
     <br><br>

     <h2>Data Siswa</h2>
     <label>Foto Siswa</label><br>
     <input type="file" name="image" accept="image/*" required>
     <br><br>

     <label>Nis Siswa</label><br>
     <input type="text" name="nis" value="<?php echo e(old('nis')); ?>" required>
     <br><br>

     <label>Tingkatan</label><br>
     <select name="tingkatan" required>
      <option value="">Pilih Tingkatan</option>
      <option value="X">X</option>
      <option value="XI">XI</option>
      <option value="XII">XII</option>
     </select>
     <br><br>

     <label>Jurusan</label><br>
     <select name="jurusan" required>
      <option value="">Pilih Jurusan</option>
      <option value="TBSM">TBSM</option>
      <option value="TJKT">TJKT</option>
      <option value="PPLG">PPLG</option>
      <option value="DKV">DKV</option>
      <option value="TOI">TOI</option>
     </select>
     <br><br>

     <label>Kelas</label><br>
     <select name="kelas" required>
      <option value="">Pilih Kelas</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
     </select>
     <br><br>

     <label>No Hp</label><br>
     <input type="text" name="hp" value="<?php echo e(old('hp')); ?>" required>
     <br><br>

     <button type="submit">SIMPAN DATA</button>
     <button type="reset">RESET FORM</button>
   </form>
</body>
</html><?php /**PATH C:\laragon\www\E-poin_nidakhoiriyah\resources\views/admin/siswa/create.blade.php ENDPATH**/ ?>