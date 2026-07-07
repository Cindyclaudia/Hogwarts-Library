@extends('layouts.app')

@section('content')

<h2>Tambah Buku</h2>

<form
    action="{{ route('books.store') }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="mb-3">

        <label>Judul</label>

        <input
            type="text"
            name="judul"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <select
            name="category_id"
            class="form-control">

            @foreach($categories as $category)

            <option value="{{ $category->id }}">
                {{ $category->nama_kategori }}
            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text"
               name="penulis"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text"
               name="penerbit"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number"
               name="tahun_terbit"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number"
               name="stok"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Cover Buku</label>
        <input type="file"
               name="cover"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>

</form>

@endsection