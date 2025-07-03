@extends('layouts.app')

@section('content')
    <h2>Data Diagnosa</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Penyakit</th>
                <th>Kategori Penyakit</th>
                <th>Kode ICD</th>
                <th>Biaya</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($diagnosa as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_penyakit }}</td>
                    <td>{{ $d->kategori_penyakit }}</td>
                    <td>{{ $d->kode_icd ?? '-' }}</td>
                    <td>Rp {{ number_format($d->biaya, 0, ',', '.') }}</td> {{-- 🆕 --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
