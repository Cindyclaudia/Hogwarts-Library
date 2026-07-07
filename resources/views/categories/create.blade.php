@extends('layouts.app')

@section('content')

<h2>Tambah Kategori</h2>

<form
    action="{{ route('categories.store') }}"
    method="POST">

    @csrf

    <div class="mb-3">

        <label>Nama Kategori</label>

        <input
            type="text"
            name="nama_kategori"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            class="form-control"></textarea>

    </div>

    <button class="btn btn-success">

        Simpan

    </button>

</form>

@endsection