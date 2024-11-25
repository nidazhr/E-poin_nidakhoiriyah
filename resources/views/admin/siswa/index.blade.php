<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Data Siswa</title>
</head>

<body>
     <h1>Data Siswa</h1>
     <a href="{{ route('admin/dashboard') }}">Menu Utama</a><br>
     <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementByid('logout-form').submit();">Logout</a>
     <br><br>
     <form id="logout-form" action="{{ route('logout') }}" method="POST">
     @csrf
</form>
<br><br>
<form action="" method="get">
      <label>Cari :</label>
      <input type="text" name="cari">
      <input type="submit" value="Cari">
</form>
<br><br>
<a href="{{ route('siswa.create') }}">Tambah Siswa</a>

@if(Session::get('success'))
<div class="alert alert-success" role="alert">
      {{ Session::get('success') }}
</div>
@endif


<table class="tabel">
      <tr>
            <th>Foto</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>No Hp</th>
            <th>Status</th>
            <th>Aksi</th>
</tr>
@forelse ($siswas as $siswa)
<tr>
      <td>
            <img src="{{ asset('storage/siswas/'.$siswa->image) }}" width=


            





</body>
</html>