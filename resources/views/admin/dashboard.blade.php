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
        <a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a>
        <a class="nav-link" href="{{ route('akun.index') }}">Data Akun</a>
        <a class="nav-link" href="{{ route('pelanggaran.index') }}">Data Pelanggaran</a>
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <h1>Dashboard Admin</h1>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @else
        <p>You are logged in!</p>
    @endif

    <h3>Jumlah Siswa: {{ $jmlSiswas }}</h3>
    <h3>Jumlah Pelanggar: {{ $jmlPelanggars }}</h3>

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
        @forelse ($pelanggars as $pelanggar)
            <tr>
                <td>
                    <img src="{{ asset('storage/siswas/'.$pelanggar->image) }}" width="120" height="120" alt="Foto Siswa">
                </td>
                <td>{{ $pelanggar->nis }}</td>
                <td>{{ $pelanggar->name }}</td>
                <td>{{ $pelanggar->tingkatan }} {{ $pelanggar->jurusan }} {{ $pelanggar->kelas }}</td>
                <td>{{ $pelanggar->hp }}</td>
                <td>{{ $pelanggar->poin_pelanggar }}</td>
                <td>
                    <a href="{{ route('pelanggar.show', $pelanggar->id) }}" class="btn btn-sm">Data Pelanggaran</a>
                </td>
            </tr>
        @empty 
            <tr>
                <td colspan="7">
                    Data tidak ditemukan. <a href="{{ route('pelanggar.index') }}">Kembali</a>
                </td>
            </tr>
        @endforelse
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
        @forelse ($hitung as $hit)
            <tr>
                <td>{{ $hit->jenis }}</td>
                <td>{{ $hit->konsekuensi }}</td>
                <td>{{ $hit->poin }}</td> 
                <td>{{ $hit->totals }}</td>
            </tr>
        @empty 
            <tr>
                <td colspan="4">Data tidak ditemukan.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</body>
</html>
