@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="mb-4 d-flex justify-content-between align-items-center">

        <h1 class="page-title">
            Edit Peminjaman
        </h1>

        <a href="{{ route('borrowings.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <form action="{{ route('borrowings.update',$borrowing->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                {{-- Anggota --}}
                <div class="mb-3">

                    <label class="form-label">

                        Anggota

                    </label>

                    <select
                        name="member_id"
                        class="form-control">

                        @foreach($members as $member)

                            <option
                                value="{{ $member->id }}"
                                {{ $borrowing->member_id == $member->id ? 'selected' : '' }}>

                                {{ $member->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Tanggal Pinjam --}}
                <div class="mb-3">

                    <label class="form-label">

                        Tanggal Pinjam

                    </label>

                    <input
                        type="date"
                        class="form-control"
                        value="{{ \Carbon\Carbon::parse($borrowing->tanggal_pinjam)->format('Y-m-d') }}"
                        readonly>

                </div>

                {{-- Batas Pengembalian --}}
                <div class="mb-3">

                    <label class="form-label">

                        Batas Pengembalian

                    </label>

                    <input
                        type="date"
                        name="tanggal_kembali"
                        class="form-control"
                        value="{{ \Carbon\Carbon::parse($borrowing->tanggal_kembali)->format('Y-m-d') }}">

                </div>

                {{-- Status --}}
                <div class="mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select
                        name="status"
                        class="form-control">

                        <option value="Dipinjam"
                            {{ $borrowing->status == 'Dipinjam' ? 'selected' : '' }}>

                            Dipinjam

                        </option>

                        <option value="Dikembalikan"
                            {{ $borrowing->status == 'Dikembalikan' ? 'selected' : '' }}>

                            Dikembalikan

                        </option>

                    </select>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Update Peminjaman

                </button>

            </form>

        </div>

    </div>

</div>

@endsection