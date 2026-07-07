@extends('layouts.app')

@section('content')

<h2>Tambah Anggota</h2>

<form action="{{ route('members.store') }}"
      method="POST">

    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input type="text"
               name="nama"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat"
                  class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Telepon</label>
        <input type="text"
               name="telepon"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control">
    </div>

    <button class="btn btn-success">
        Simpan
    </button>

</form>

@endsection