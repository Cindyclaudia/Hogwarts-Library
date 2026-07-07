@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="page-title">

            Data Peminjaman

        </h1>

        <div class="d-flex align-items-center gap-2">

            <input
                type="text"
                id="search"
                class="form-control"
                placeholder="🔍 Cari anggota, buku atau status..."
                style="width:330px;">

            <a href="{{ route('borrowings.create') }}"
               class="btn btn-primary">

                + Tambah Peminjaman

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
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody id="borrowingTable">

                    @include('borrowings.table')

                </tbody>

            </table>

        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function(){

    $('#search').keyup(function(){

        let search = $(this).val();

        $.ajax({

            url:"{{ route('borrowings.index') }}",

            type:"GET",

            data:{
                search:search
            },

            success:function(data){

                $('#borrowingTable').html(data);

            }

        });

    });

});

</script>

@endsection