@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

       <h1 class="page-title">
    Laporan Peminjaman Buku
</h1>

        <div class="d-flex gap-2">

    <button
        onclick="window.print()"
        class="btn btn-warning btn-print">

        <i class="fas fa-print"></i>
        Cetak

    </button>

    <a href="{{ route('reports.borrowings.pdf') }}"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>
        Export PDF

    </a>

    <a href="{{ route('reports.borrowings.excel') }}"
       class="btn btn-success">

        <i class="fas fa-file-excel"></i>
        Export Excel

    </a>

</div>

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Anggota</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($borrowings as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->member->nama }}
                        </td>

                        <td>
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td>
                            {{ $item->tanggal_kembali }}
                        </td>

                        <td>

                            @if($item->status == 'Dipinjam')

                                <span class="badge bg-warning">
                                    Dipinjam
                                </span>

                            @else

                                <span class="badge bg-success">
                                    Dikembalikan
                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<style>

@media print {

    .btn-print,
    .navbar,
    .sidebar,
    footer {
        display: none !important;
    }

    .col-md-2 {
        display:none !important;
    }

    .col-md-10 {
        width:100% !important;
    }

}

</style>

@endsection