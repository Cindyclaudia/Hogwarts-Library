@extends('layouts.app')

@section('content')

<h2>Tambah Peminjaman</h2>

<div class="card shadow">

    <div class="card-body">

        <form action="{{ route('borrowings.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Anggota</label>

                <select
                    name="member_id"
                    class="form-control">

                    <option value="">
                        Pilih Anggota
                    </option>

                    @foreach($members as $member)

                        <option value="{{ $member->id }}">

                            {{ $member->nama }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Buku</label>

                <select
                    name="book_id"
                    class="form-control">

                    <option value="">
                        Pilih Buku
                    </option>

                    @foreach($books as $book)

                        <option value="{{ $book->id }}">

                            {{ $book->judul }}
                            (Stok: {{ $book->stok }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Jumlah</label>

                <input
                    type="number"
                    name="qty"
                    value="1"
                    class="form-control">

            </div>

            <button class="btn btn-success">

                Simpan

            </button>

        </form>

    </div>

</div>

@endsection