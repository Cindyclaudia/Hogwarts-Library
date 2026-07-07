@extends('layouts.app')

@section('content')

<h2>Tambah Denda</h2>

<form action="{{ route('fines.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">

        <label>Peminjaman</label>

        <select
            name="borrowing_id"
            class="form-control">

            @foreach($borrowings as $borrowing)

                <option value="{{ $borrowing->id }}">

                    {{ $borrowing->member->nama }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Jumlah Denda</label>

        <input
            type="number"
            name="jumlah_denda"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Status Bayar</label>

        <select
            name="status_bayar"
            class="form-control">

            <option value="Belum Bayar">
                Belum Bayar
            </option>

            <option value="Sudah Bayar">
                Sudah Bayar
            </option>

        </select>

    </div>

    <button class="btn btn-success">

        Simpan

    </button>

</form>

@endsection