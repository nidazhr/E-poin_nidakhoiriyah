<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a class="nav-link" href="<?php echo e(route('siswa.index')); ?>">Data Siswa</a>
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); documen.getElementById('logout-from').submit();">Logout</a>
    <from id="logout-from" action="<?php echo e(route('logout')); ?>" method="POST">
        <?php echo csrf_field(); ?>
    </from>
    <h1>Dashboard Admin</h1>
    <?php if($message = Session::get('succes')): ?>
    <p><?php echo e($message); ?></p>
    <?php else: ?>
    <p>You are logged in!</p>
    <?php endif; ?>

  </body>

  <footer>

 </footer>
 </html><?php /**PATH C:\laragon\www\nida\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>