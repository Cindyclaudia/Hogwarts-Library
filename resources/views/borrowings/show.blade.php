@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header">

            Detail Peminjaman

        </div>

        <div class="card-body">

            <p>
                <strong>ID :</strong>
                {{ $borrowing->id }}
            </p>

            <p>
                <strong>Nama Anggota :</strong>
                {{ $borrowing->member->nama }}
            </p>

            <p>
                <strong>Tanggal Pinjam :</strong>
                {{ $borrowing->tanggal_pinjam }}
            </p>

            <p>
                <strong>Tanggal Kembali :</strong>
                {{ $borrowing->tanggal_kembali }}
            </p>

            <p>
                <strong>Status :</strong>
                {{ $borrowing->status }}
            </p>

            <hr>

            <h5>Buku Dipinjam</h5>

            <ul>

                @foreach(
                    $borrowing->books
                    as
                    $book
                )

                    <li>

                        {{ $book->judul }}

                        (Qty:
                        {{ $book->pivot->qty }}
                        )

                    </li>

                @endforeach

            </ul>

            <a href="{{ route('borrowings.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection