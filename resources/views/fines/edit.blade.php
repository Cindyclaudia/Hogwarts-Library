@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Edit Status Denda
    </h2>

    <div class="card">

        <div class="card-body">

            <form action="{{ route('fines.update', $fine->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Status Pembayaran
                    </label>

                    <select name="status_bayar"
                            class="form-control">

                        <option value="Belum Bayar"
                            {{ $fine->status_bayar == 'Belum Bayar' ? 'selected' : '' }}>
                            Belum Bayar
                        </option>

                        <option value="Sudah Bayar"
                            {{ $fine->status_bayar == 'Sudah Bayar' ? 'selected' : '' }}>
                            Sudah Bayar
                        </option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Simpan
                </button>

                <a href="{{ route('fines.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection