<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Laravel 11</title>
    <style type="text/css">
       table {
        border-collapse: collapse;
        margin: 20px 0px;
        text-align: left;
    }

       table,
       th,
       td {
            border: 1px solid;
            text-align: left;
            padding-right: 20px;
       }
     </style>
</head>

<body>

    <h1>Detail siswa</h1>
    <a href="<?php echo e(route('siswa.index')); ?>">Kembali!</a>

    <table>
        <tr>
            <td colspan="4" style="text-align: center;"><img src="<?php echo e(asset('storage/siswas/'.$siswa->image)); ?>" width="120px" hight="120px" alt=""></td>
        </tr>
        <tr>
            <th colspan="2">Akun Siswa</th>
            <th colspan="2">Data Siswa</th>
        </tr>
        <tr>
            <th>Nama</th>
            <td>: <?php echo e($siswa->name); ?></td>
            <th>Nis</th>
            <td>: <?php echo e($siswa->nis); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td>: <?php echo e($siswa->email); ?></td>
            <th>Kelas</th>
            <td>: <?php echo e($siswa->tingkatan); ?> <?php echo e($siswa->jurusan); ?> <?php echo e($siswa->kelas); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <th>No Hp</th>
            <td>: <?php echo e($siswa->hp); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <th>Status</th>
            <?php if($siswa->status == 1): ?> :
            <td>: Aktif</td>
            <?php else: ?>
            <td>: Tidak aktif</td>
            <?php endif; ?>
        </tr>
    </table>


</body>
</head>
</html><?php /**PATH C:\laragon\www\nida\resources\views/admin/siswa/show.blade.php ENDPATH**/ ?>