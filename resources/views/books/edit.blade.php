@extends('layouts.app')

@section('content')

<h2>Edit Buku</h2>

<form
    action="{{ route('books.update',$book->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Judul</label>

        <input
            type="text"
            name="judul"
            value="{{ $book->judul }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Kategori</label>

        <select
            name="category_id"
            class="form-control">

            @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                {{ $book->category_id == $category->id ? 'selected' : '' }}>

                {{ $category->nama_kategori }}

            </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input type="text"
               name="penulis"
               value="{{ $book->penulis }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Penerbit</label>
        <input type="text"
               name="penerbit"
               value="{{ $book->penerbit }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Tahun Terbit</label>
        <input type="number"
               name="tahun_terbit"
               value="{{ $book->tahun_terbit }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number"
               name="stok"
               value="{{ $book->stok }}"
               class="form-control">
    </div>

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection