<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>latihan laravel 10</title>
    <style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0px;

    }
    
    table,
    th,
    td {
        border: 1px solid;
    }
    </style>
</head>
<body>
    <h1>Edit siswa</h1>
    <a href="<?php echo e(route('siswa.index')); ?>">Kembali</a><br><br>
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($errors); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
          </div>
         <?php endif; ?>
       <form action="<?php echo e(route('siswa.update', $siswa->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <h2>Data siswa</h2>
        <label>Foto siswa</label><br>
        <img scr="<?php echo e(asset('stroge/siswas/'.$siswa->image)); ?>" width="120px" hight="120px" alt="">
        <input type="file" name="image" accept="image/*">
        <br><br>

        <label>NIS Siswa</label><br>
        <input type="text" name="nis" value="<?php echo e(old('nis', $siswa->nis)); ?>" required>
        <br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" id="name" name="name" value="<?php echo e(old('name', $siswa->name)); ?>" required>
        <br><br>
        <label>Tingkatan</label><br>
        <select name="tingkatan" required>
            <option <?php echo e('X' == $siswa->tingkatan ? 'selected' : ''); ?> value="X">X</option>
            <option <?php echo e('XI' == $siswa->tingkatan ? 'selected' : ''); ?> value="XI">X</option>
            <option <?php echo e('XII' == $siswa->tingkatan ? 'selected' : ''); ?> value="XII">X</option>
        </select>
        <br><br>
        <label>Jurusan</label><br>
        <select name="jurusan" required>
            <option <?php echo e('TBSM' == $siswa->tingkatan ? 'selected' : ''); ?> value="TBSM">TBSM</option>
            <option <?php echo e('TJKT' == $siswa->tingkatan ? 'selected' : ''); ?> value="TJKT">TJKT</option>
            <option <?php echo e('PPLG' == $siswa->tingkatan ? 'selected' : ''); ?> value="PPLG">PPLG</option>
            <option <?php echo e('DKV' == $siswa->tingkatan ? 'selected' : ''); ?> value="DKV">DKV</option>
            <option <?php echo e('TOI' == $siswa->tingkatan ? 'selected' : ''); ?> value="PPLG">TOI</option>
        </select>
        <br><br>
        <label>Kelas</label><br>
        <select name="kelas" required>
            <option <?php echo e('1' == $siswa->tingkatan ? 'selected' : ''); ?> value="1">1</option>
            <option <?php echo e('2' == $siswa->tingkatan ? 'selected' : ''); ?> value="2">2</option>
            <option <?php echo e('3' == $siswa->tingkatan ? 'selected' : ''); ?> value="3">3</option>
            <option <?php echo e('4' == $siswa->tingkatan ? 'selected' : ''); ?> value="4">4</option>
          </select>
          <br><br>
          <label>No hp</label><br>
          <input type="text" name="hp" value="<?php echo e(old('hp', $siswa->hp)); ?>" required>
          <br><br>
          <label>Status</label><br>
          <select name="status" required>
            <option <?php echo e('1' == $siswa->status ? 'selected' : ''); ?> value="1">Aktif</option>
            <option <?php echo e('0' == $siswa->status ? 'selected' : ''); ?> value="0">Tidak Aktif</option>
          </select>
          <br><br>
          <button type="submit">SIMPAN DATA</button>
          <button type="reset">RESET FORM</button>
       </form>



</body>

</html><?php /**PATH C:\laragon\www\E-poin_nidakhoiriyah\resources\views/admin/siswa/edit.blade.php ENDPATH**/ ?>