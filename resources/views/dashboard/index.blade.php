@extends('layouts.app')

@section('content')

<div class="dashboard-wrapper">

    <div class="page-header">

        <h1>
            Dashboard Hogwarts Library
        </h1>

        <div class="divider"></div>

    </div>

    <div class="row g-4">

        <div class="col-md-3">

            <div class="hog-card">

                <div class="card-content">

                    <h5>Total Buku</h5>

                    <h2>{{ $totalBooks }}</h2>

                </div>

                <div class="card-icon">

                    <i class="fas fa-book-open"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="hog-card">

                <div class="card-content">

                    <h5>Total Anggota</h5>

                    <h2>{{ $totalMembers }}</h2>

                </div>

                <div class="card-icon">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="hog-card">

                <div class="card-content">

                    <h5>Total Peminjaman</h5>

                    <h2>{{ $totalBorrowings }}</h2>

                </div>

                <div class="card-icon">

                    <i class="fas fa-right-left"></i>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="hog-card">

                <div class="card-content">

                    <h5>Total Denda</h5>

                    <h2>

                        Rp {{ number_format($totalFines,0,',','.') }}

                    </h2>

                </div>

                <div class="card-icon">

                    <i class="fas fa-sack-dollar"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="welcome-box mt-5">

        <div class="row align-items-center">

            <div class="col-md-4 text-center">

                <i class="fas fa-feather-pointed feather-icon"></i>

            </div>

            <div class="col-md-8">

                <h3>Selamat Datang di</h3>

                <h1>Hogwarts Library</h1>

                <p>

                    Kelola data buku, anggota,
                    peminjaman dan denda
                    dengan lebih mudah
                    dan terorganisir.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection