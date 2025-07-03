@extends('layouts.app')

@section('content')
<h2>Data Pasien</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Golongan Darah</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $p)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->umur }}</td>
            <td>
                @if ($p->jenis_kelamin == 'L')
                    Laki-laki
                @elseif ($p->jenis_kelamin == 'P')
                    Perempuan
                @else
                    -
                @endif
            </td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->golongan_darah ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
