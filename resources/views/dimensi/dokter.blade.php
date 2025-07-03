@extends('layouts.app')

@section('content')
    <h2>Data Dokter</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Spesialisasi</th>
                <th>Poli</th>
                <th>Tingkat</th>
                <th>Biaya</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($dokter as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->spesialisasi }}</td>
                    <td>{{ $d->poli }}</td>
                    <td>{{ $d->tingkat ?? '-' }}</td>
                    <td>Rp {{ number_format($d->biaya, 0, ',', '.') }}</td> {{-- 🆕 --}}
                </tr>
            @endforeach
        </tbody>

    </table>
@endsection
