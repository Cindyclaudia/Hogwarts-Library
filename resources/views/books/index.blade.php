@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="page-title">
            Data Buku
        </h1>

        <div class="d-flex align-items-center gap-2">

            <input
                type="text"
                id="search"
                class="form-control"
                placeholder="🔍 Cari judul, penulis, penerbit, kategori..."
                style="width:320px;">

            <a href="{{ route('books.create') }}"
               class="btn btn-primary">

                + Tambah Buku

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>ID</th>
                        <th>Cover</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody id="bookTable">

                    @include('books.table')

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function(){

    $('#search').on('keyup', function(){

        let search = $(this).val();

        $.ajax({

            url: "{{ route('books.index') }}",

            type: "GET",

            data: {

                search: search

            },

            success: function(data){

                $('#bookTable').html(data);

            }

        });

    });

});

</script>

@endsection