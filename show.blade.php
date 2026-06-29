<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Transaksi
        </h2>
    </x-slot>
    @if($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
    <div class="alert alert-danger mb-4">
        <h5 class="mb-2">
            ⚠ Buku Terlambat
        </h5>
        Buku ini sudah terlambat
        <strong>
            {{ $transaksi->terlambat }} hari
        </strong>
        dari batas pengembalian.
    </div>
    @endif

    <div class="py-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow rounded-lg p-6">
                <table class="table table-bordered w-100">
                    <tr>
                        <th width="30%">Kode Transaksi</th>
                        <td>{{ $transaksi->kode_transaksi }}</td>
                    </tr>

                    <tr>
                        <th>Nama Anggota</th>
                        <td>{{ $transaksi->anggota->nama }}</td>
                    </tr>

                    <tr>
                        <th>Judul Buku</th>
                        <td>{{ $transaksi->buku->judul_buku }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Pinjam</th>
                        <td>{{ $transaksi->tanggal_pinjam->format('d-m-Y') }}</td>
                    </tr>

                    <tr>
                        <th>Batas Pengembalian</th>
                        <td>{{ $transaksi->tanggal_kembali->format('d-m-Y') }}</td>
                    </tr>

                    <tr>
                        <th>Tanggal Dikembalikan</th>
                        <td>
                            @if($transaksi->tanggal_dikembalikan)
                            {{ $transaksi->tanggal_dikembalikan->format('d-m-Y') }}
                            @else
                            -
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Denda</th>
                        <td>
                            <strong class="text-danger">
                                Rp {{ number_format($transaksi->denda_berjalan, 0, ',', '.') }}
                            </strong>

                            @if($transaksi->status == 'Dipinjam' && $transaksi->terlambat > 0)
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($transaksi->status=='Dipinjam')
                            <span class="badge bg-warning">
                                Dipinjam
                            </span>
                            @if($transaksi->terlambat > 0)
                            <span class="badge bg-danger">
                                Terlambat {{ $transaksi->terlambat }} Hari
                            </span>
                            @endif
                            @else
                            <span class="badge bg-success">
                                Dikembalikan
                            </span>
                            @endif
                        </td>
                    </tr>
                </table>
                <div class="mt-4 d-flex gap-2">
                    @if($transaksi->status=='Dipinjam')
                    <form action="{{ route('transaksi.kembalikan',$transaksi->id) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-success"
                            onclick="return confirm('Yakin buku dikembalikan?')">
                            Kembalikan Buku
                        </button>
                    </form>

                    @endif

                    <a href="{{ route('transaksi.index') }}"
                        class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>