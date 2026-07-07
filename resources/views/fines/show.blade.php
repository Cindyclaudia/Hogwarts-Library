@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header">

            Detail Denda

        </div>

        <div class="card-body">

            <p>
                <strong>ID :</strong>
                {{ $fine->id }}
            </p>

            <p>
                <strong>Nama Anggota :</strong>
                {{ $fine->borrowing->member->nama }}
            </p>

            <p>
                <strong>Jumlah Denda :</strong>

                Rp
                {{ number_format(
                    $fine->jumlah_denda,
                    0,
                    ',',
                    '.'
                ) }}

            </p>

            <p>
                <strong>Status Bayar :</strong>

                {{ $fine->status_bayar }}

            </p>

            <a href="{{ route('fines.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection