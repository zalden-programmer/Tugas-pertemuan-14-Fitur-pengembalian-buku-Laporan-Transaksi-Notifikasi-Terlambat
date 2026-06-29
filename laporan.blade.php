<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Transaksi
        </h2>
    </x-slot>
    <div class="container py-4">
        {{-- Filter --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Filter Laporan
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('transaksi.laporan') }}">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>Dari Tanggal</label>
                            <input type="date"
                                name="tanggal_dari"
                                class="form-control"
                                value="{{ request('tanggal_dari') }}">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Sampai Tanggal</label>
                            <input type="date"
                                name="tanggal_sampai"
                                class="form-control"
                                value="{{ request('tanggal_sampai') }}">
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">

                                <option value="">Semua</option>
                                <option value="Dipinjam"
                                    {{ request('status')=='Dipinjam'?'selected':'' }}>
                                    Dipinjam
                                </option>
                                <option value="Dikembalikan"
                                    {{ request('status')=='Dikembalikan'?'selected':'' }}>
                                    Dikembalikan
                                </option>
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label>Anggota</label>
                            <select name="anggota_id" class="form-select">
                                <option value="">Semua</option>
                                @foreach($anggotas as $anggota)
                                <option value="{{ $anggota->id }}"
                                    {{ request('anggota_id')==$anggota->id?'selected':'' }}>
                                    {{ $anggota->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="d-block">&nbsp;</label> {{-- ← tambahkan ini --}}
                            <div class="d-flex gap-2">
                                <button type="submit"
                                    class="btn btn-primary"
                                    title="Filter">
                                    <i class="bi bi-search"></i>
                                </button>

                                <a href="{{ route('transaksi.laporan.pdf', request()->query()) }}"
                                    class="btn btn-danger"
                                    title="Export PDF">
                                    <i class="bi bi-file-earmark-pdf-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-success">
                    <div class="card-body">
                        <h6>Total Transaksi</h6>
                        <h2>{{ $totalTransaksi }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-body">
                        <h6>Total Denda</h6>
                        <h2>
                            <h2 class="text-danger">
                                Rp {{ number_format($totalDenda,0,',','.') }}
                            </h2>
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabel --}}
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Transaksi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Anggota</th>
                                <th>Buku</th>
                                <th>Tgl Pinjam</th>
                                <th>Status</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transaksis as $transaksi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaksi->kode_transaksi }}</td>
                                <td>{{ $transaksi->anggota->nama }}</td>
                                <td>{{ $transaksi->buku->judul_buku }}</td>
                                <td>
                                    {{ $transaksi->tanggal_pinjam->format('d-m-Y') }}
                                </td>
                                <td>
                                    @if($transaksi->status=='Dipinjam')
                                    <span class="badge bg-warning">
                                        Dipinjam
                                    </span>
                                    @else
                                    <span class="badge bg-success">
                                        Dikembalikan
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-danger">
                                        Rp {{ number_format($transaksi->denda_berjalan,0,',','.') }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    Tidak ada data
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>