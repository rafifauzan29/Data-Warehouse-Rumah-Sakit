@extends('layouts.app')

@section('content')
    <h2>Data Ruang</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Tipe Ruang</th>
                <th>Lantai</th>
                <th>Biaya</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($ruang as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->nama_ruang }}</td>
                    <td>{{ $r->tipe_ruang }}</td>
                    <td>{{ $r->lantai }}</td>
                    <td>Rp {{ number_format($r->biaya, 0, ',', '.') }}</td> {{-- 🆕 --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
