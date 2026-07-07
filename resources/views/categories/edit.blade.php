@extends('layouts.app')

@section('content')

<h2>Edit Kategori</h2>

<form
    action="{{ route('categories.update',$category->id) }}"
    method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Nama Kategori</label>

        <input
            type="text"
            name="nama_kategori"
            value="{{ $category->nama_kategori }}"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            class="form-control">{{ $category->deskripsi }}</textarea>

    </div>

    <button class="btn btn-primary">

        Update

    </button>

</form>

@endsection