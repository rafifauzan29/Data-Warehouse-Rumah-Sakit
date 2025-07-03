@extends('layouts.app')

@section('content')
<h2>Data Waktu</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Bulan</th>
            <th>Kuartal</th>
            <th>Tahun</th>
        </tr>
    </thead>
    <tbody>
        @foreach($waktu as $w)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ \Carbon\Carbon::parse($w->tanggal)->format('d-m-Y') }}</td>
            <td>{{ $w->bulan }}</td>
            <td>{{ $w->kuartal }}</td>
            <td>{{ $w->tahun }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
