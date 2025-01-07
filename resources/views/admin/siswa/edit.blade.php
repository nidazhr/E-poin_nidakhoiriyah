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
    <a href="{{ route('siswa.index') }}">Kembali</a><br><br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $errors}}</li>
            @endforeach
        </ul>
          </div>
         @endif
       <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h2>Data siswa</h2>
        <label>Foto siswa</label><br>
        <img scr="{{ asset('stroge/siswas/'.$siswa->image) }}" width="120px" hight="120px" alt="">
        <input type="file" name="image" accept="image/*">
        <br><br>

        <label>NIS Siswa</label><br>
        <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" required>
        <br><br>

        <label>Nama Lengkap</label><br>
        <input type="text" id="name" name="name" value="{{ old('name', $siswa->name) }}" required>
        <br><br>
        <label>Tingkatan</label><br>
        <select name="tingkatan" required>
            <option {{ 'X' == $siswa->tingkatan ? 'selected' : '' }} value="X">X</option>
            <option {{ 'XI' == $siswa->tingkatan ? 'selected' : '' }} value="XI">X</option>
            <option {{ 'XII' == $siswa->tingkatan ? 'selected' : '' }} value="XII">X</option>
        </select>
        <br><br>
        <label>Jurusan</label><br>
        <select name="jurusan" required>
            <option {{ 'TBSM' == $siswa->tingkatan ? 'selected' : '' }} value="TBSM">TBSM</option>
            <option {{ 'TJKT' == $siswa->tingkatan ? 'selected' : '' }} value="TJKT">TJKT</option>
            <option {{ 'PPLG' == $siswa->tingkatan ? 'selected' : '' }} value="PPLG">PPLG</option>
            <option {{ 'DKV' == $siswa->tingkatan ? 'selected' : '' }} value="DKV">DKV</option>
            <option {{ 'TOI' == $siswa->tingkatan ? 'selected' : '' }} value="PPLG">TOI</option>
        </select>
        <br><br>
        <label>Kelas</label><br>
        <select name="kelas" required>
            <option {{ '1' == $siswa->tingkatan ? 'selected' : '' }} value="1">1</option>
            <option {{ '2' == $siswa->tingkatan ? 'selected' : '' }} value="2">2</option>
            <option {{ '3' == $siswa->tingkatan ? 'selected' : '' }} value="3">3</option>
            <option {{ '4' == $siswa->tingkatan ? 'selected' : '' }} value="4">4</option>
          </select>
          <br><br>
          <label>No hp</label><br>
          <input type="text" name="hp" value="{{ old('hp', $siswa->hp) }}" required>
          <br><br>
          <label>Status</label><br>
          <select name="status" required>
            <option {{ '1' == $siswa->status ? 'selected' : '' }} value="1">Aktif</option>
            <option {{ '0' == $siswa->status ? 'selected' : '' }} value="0">Tidak Aktif</option>
          </select>
          <br><br>
          <button type="submit">SIMPAN DATA</button>
          <button type="reset">RESET FORM</button>
       </form>



</body>

</html>