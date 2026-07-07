@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="page-title">
    Laporan Denda
</h1>

      <div class="d-flex gap-2">

    <button
        onclick="window.print()"
        class="btn btn-warning btn-print">

        <i class="fas fa-print"></i>
        Cetak

    </button>

    <a href="{{ route('reports.fines.pdf') }}"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>
        Export PDF

    </a>

    <a href="{{ route('reports.fines.excel') }}"
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
                        <th>Denda</th>
                        <th>Status Bayar</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($fines as $fine)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $fine->borrowing->member->nama }}
                        </td>

                        <td>
                            Rp {{ number_format($fine->jumlah_denda,0,',','.') }}
                        </td>

                        <td>

                            @if($fine->status_bayar == 'Sudah Bayar')

                                <span class="badge bg-success">
                                    Sudah Bayar
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Belum Bayar
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
        display:none !important;
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