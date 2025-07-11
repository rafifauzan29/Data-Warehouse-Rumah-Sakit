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
        <label>Tanggal Awal</label>
        <input type="date" name="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
    </div>
    <div class="col-md-3">
        <label>Tanggal Akhir</label>
        <input type="date" name="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
    </div>
    <div class="col-md-3">
        <label>Dokter</label>
        <select name="dokter_id" class="form-control">
            <option value="">- Semua Dokter -</option>
            @foreach ($dokterList as $d)
                <option value="{{ $d->dokter_id }}" {{ request('dokter_id') == $d->dokter_id ? 'selected' : '' }}>
                    {{ $d->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Diagnosa</label>
        <select name="diagnosa_id" class="form-control">
            <option value="">- Semua Diagnosa -</option>
            @foreach ($diagnosaList as $d)
                <option value="{{ $d->diagnosa_id }}" {{ request('diagnosa_id') == $d->diagnosa_id ? 'selected' : '' }}>
                    {{ $d->nama_penyakit }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Ruang</label>
        <select name="ruang_id" class="form-control">
            <option value="">- Semua Ruang -</option>
            @foreach ($ruangList as $r)
                <option value="{{ $r->ruang_id }}" {{ request('ruang_id') == $r->ruang_id ? 'selected' : '' }}>
                    {{ $r->nama_ruang }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="">- Semua -</option>
            <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>
    <div class="col-md-3">
        <label>Umur Min</label>
        <input type="number" name="umur_min" class="form-control" value="{{ request('umur_min') }}">
    </div>
    <div class="col-md-3">
        <label>Umur Max</label>
        <input type="number" name="umur_max" class="form-control" value="{{ request('umur_max') }}">
    </div>
    <div class="col-md-3">
        <label>Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control" value="{{ request('nama_pasien') }}">
    </div>
    <div class="col-md-3">
        <label>Tahun Kunjungan</label>
        <select name="tahun" class="form-control">
            <option value="">- Semua Tahun -</option>
            @foreach ($tahunList as $tahun)
                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                    {{ $tahun }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 d-flex align-items-end">
        <button type="submit" class="btn btn-primary me-2">Tampilkan</button>
        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary me-2">Reset</a>
        <button type="submit" name="show_all" value="1" class="btn btn-warning me-2">Show All</button>
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
                <td>
                    {{ ($kunjungan instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        ? ($kunjungan->currentPage() - 1) * $kunjungan->perPage() + $loop->iteration
                        : $loop->iteration }}
                </td>
                <td>{{ $item->pasien?->nama ?? '-' }}</td>
                <td>{{ $item->dokter?->nama ?? '-' }}</td>
                <td>{{ $item->diagnosa?->nama_penyakit ?? '-' }}</td>
                <td>{{ $item->ruang?->nama_ruang ?? '-' }}</td>
                <td>
                    {{ $item->waktu?->tanggal ? \Carbon\Carbon::parse($item->waktu->tanggal)->translatedFormat('d F Y') : '-' }}
                </td>
                <td>
                    Rp {{ number_format(
                        ($item->dokter->biaya ?? 0) +
                        ($item->diagnosa->biaya ?? 0) +
                        ($item->ruang->biaya ?? 0),
                        0, ',', '.'
                    ) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Data belum tersedia.</td>
            </tr>
        @endforelse
    </tbody>

    @if($kunjungan->count() > 0)
        <tfoot>
            <tr class="table-secondary fw-bold">
                <td colspan="6" class="text-end">Total Biaya Keseluruhan:</td>
                <td>
                    Rp {{ number_format($totalBiaya, 0, ',', '.') }}
                </td>
            </tr>
        </tfoot>
    @endif
</table>

@if($kunjungan instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Menampilkan {{ $kunjungan->firstItem() ?? 0 }} - {{ $kunjungan->lastItem() ?? 0 }} dari total {{ $kunjungan->total() }} data
        </div>
        <div>
            {{ $kunjungan->links() }}
        </div>
    </div>
@else
    <div class="mt-3 alert alert-info">
        Menampilkan seluruh data ({{ count($kunjungan) }} baris).
    </div>
@endif

<hr>
<h4 class="mt-5">Pivot Table (OLAP)</h4>
<div id="pivot-table-container" style="height: 500px;"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const pivotData = @json($pivotData);

        new WebDataRocks({
            container: "#pivot-table-container",
            toolbar: true,
            height: 500,
            report: {
                dataSource: {
                    data: pivotData
                },
                formats: [
                    {
                        name: "currency",
                        currencySymbol: "Rp ",
                        thousandsSeparator: ".",
                        decimalSeparator: ",",
                        decimalPlaces: 0,
                        maxDecimalPlaces: 0
                    }
                ]
            }
        });
    });
</script>

@endsection
