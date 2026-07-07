@extends('layouts.app')

@section('content')

<h2>Edit Anggota</h2>

<form action="{{ route('members.update',$member->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nama</label>
        <input type="text"
               name="nama"
               value="{{ $member->nama }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="alamat"
                  class="form-control">{{ $member->alamat }}</textarea>
    </div>

    <div class="mb-3">
        <label>Telepon</label>
        <input type="text"
               name="telepon"
               value="{{ $member->telepon }}"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               value="{{ $member->email }}"
               class="form-control">
    </div>

    <button class="btn btn-primary">
        Update
    </button>

</form>

@endsection