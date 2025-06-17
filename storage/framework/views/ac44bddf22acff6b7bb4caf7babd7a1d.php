<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <style>
        .nav-link {
            margin-right: 15px;
            text-decoration: none;
            color: blue;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        img {
            object-fit: cover;
        }
        .btn {
            padding: 5px 10px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn-sm {
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <nav>
        <a class="nav-link" href="<?php echo e(route('siswa.index')); ?>">Data Siswa</a>
        <a class="nav-link" href="<?php echo e(route('akun.index')); ?>">Data Akun</a>
        <a class="nav-link" href="<?php echo e(route('pelanggaran.index')); ?>">Data Pelanggaran</a>
        <a class="nav-link" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </nav>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>

    <h1>Dashboard Admin</h1>

    <?php if($message = Session::get('success')): ?>
        <p><?php echo e($message); ?></p>
    <?php else: ?>
        <p>You are logged in!</p>
    <?php endif; ?>

    <h3>Jumlah Siswa: <?php echo e($jmlSiswas); ?></h3>
    <h3>Jumlah Pelanggar: <?php echo e($jmlPelanggars); ?></h3>

    <h2>Top 10 Siswa dengan Poin Pelanggaran Tertinggi</h2>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th> 
                <th>No HP</th> 
                <th>Poin</th> 
                <th>Aksi</th> 
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $pelanggars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td>
                    <img src="<?php echo e(asset('storage/siswas/'.$pelanggar->image)); ?>" width="120" height="120" alt="Foto Siswa">
                </td>
                <td><?php echo e($pelanggar->nis); ?></td>
                <td><?php echo e($pelanggar->name); ?></td>
                <td><?php echo e($pelanggar->tingkatan); ?> <?php echo e($pelanggar->jurusan); ?> <?php echo e($pelanggar->kelas); ?></td>
                <td><?php echo e($pelanggar->hp); ?></td>
                <td><?php echo e($pelanggar->poin_pelanggar); ?></td>
                <td>
                    <a href="<?php echo e(route('pelanggar.show', $pelanggar->id)); ?>" class="btn btn-sm">Data Pelanggaran</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
            <tr>
                <td colspan="7">
                    Data tidak ditemukan. <a href="<?php echo e(route('pelanggar.index')); ?>">Kembali</a>
                </td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <h2>Top 10 Pelanggaran yang Sering Dilakukan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggaran</th>
                <th>Konsekuensi</th>
                <th>Poin</th>
                <th>Total Pelanggaran</th>
            </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $hitung; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($hit->jenis); ?></td>
                <td><?php echo e($hit->konsekuensi); ?></td>
                <td><?php echo e($hit->poin); ?></td> 
                <td><?php echo e($hit->totals); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
            <tr>
                <td colspan="4">Data tidak ditemukan.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
<?php /**PATH C:\laragon\www\E-poin_nidakhoiriyah\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>