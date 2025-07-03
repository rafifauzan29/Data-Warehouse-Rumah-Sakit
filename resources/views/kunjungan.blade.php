@extends('layouts.app')

@section('content')

<style>
    .pagination {
        justify-content: center !important;
    }

    .pagination .page-link {
        color: #000000;
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .pagination .page-link:hover {
        background-color: #0d6efd;
        color: white;
        text-decoration: none;
    }

    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        background-color: transparent;
        border-color: transparent;
    }
</style>

<h2>Data Kunjungan Pasien</h2>

<form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <label for="tanggal_awal">Tanggal Awal</label>
        <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
            value="{{ request('tanggal_awal') }}">
    </div>
    <div class="col-md-3">
        <label for="tanggal_akhir">Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
            value="{{ request('tanggal_akhir') }}">
    </div>
    <div class="col-md-3">
        <label for="dokter_id">Dokter</label>
        <select name="dokter_id" id="dokter_id" class="form-control">
            <option value="" {{ request('dokter_id') == '' ? 'selected' : '' }}>- Semua Dokter -</option>
            @foreach ($dokterList as $d)
                <option value="{{ $d->dokter_id }}"
                    {{ (string) request('dokter_id') === (string) $d->dokter_id ? 'selected' : '' }}>
                    {{ $d->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 d-flex align-items-end">
        <button type="submit" class="btn btn-primary me-2">Tampilkan</button>
        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">Reset</a>
    </div>
</form>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Pasien</th>
            <th>Dokter</th>
            <th>Diagnosa</th>
            <th>Ruang</th>
            <th>Tanggal</th>
            <th>Biaya Total</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kunjungan as $item)
            <tr>
                <td>{{ ($kunjungan->currentPage() - 1) * $kunjungan->perPage() + $loop->iteration }}</td>
                <td>{{ $item->pasien?->nama ?? '-' }}</td>
                <td>{{ $item->dokter?->nama ?? '-' }}</td>
                <td>{{ $item->diagnosa?->nama_penyakit ?? '-' }}</td>
                <td>{{ $item->ruang?->nama_ruang ?? '-' }}</td>
                <td>
                    {{ $item->waktu?->tanggal ? \Carbon\Carbon::parse($item->waktu->tanggal)->translatedFormat('d F Y') : '-' }}
                </td>
                <td>
                    Rp
                    {{ number_format(
                        ($item->dokter->biaya ?? 0) +
                            ($item->diagnosa->biaya ?? 0) +
                            ($item->ruang->biaya ?? 0),
                        0,
                        ',',
                        '.'
                    ) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Data belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        Menampilkan {{ $kunjungan->firstItem() ?? 0 }} - {{ $kunjungan->lastItem() ?? 0 }} dari total
        {{ $kunjungan->total() }} data
    </div>
    <div>
        {{ $kunjungan->links() }}
    </div>
</div>

@endsection
