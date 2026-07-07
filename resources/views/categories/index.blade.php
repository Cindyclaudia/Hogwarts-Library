@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1 class="page-title">

            Data Kategori

        </h1>

        <div class="d-flex align-items-center gap-2">

            <input
                type="text"
                id="search"
                class="form-control"
                placeholder="🔍 Cari kategori..."
                style="width:300px;">

            <a href="{{ route('categories.create') }}"
               class="btn btn-primary">

                + Tambah Kategori

            </a>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th width="80">ID</th>

                        <th>Nama Kategori</th>

                        <th width="180">Aksi</th>

                    </tr>

                </thead>

                <tbody id="categoryTable">

                    @include('categories.table')

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

            url:"{{ route('categories.index') }}",

            type:"GET",

            data:{
                search:search
            },

            success:function(data){

                $('#categoryTable').html(data);

            }

        });

    });

});

</script>

@endsection