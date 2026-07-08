<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Cek Login
|--------------------------------------------------------------------------
*/

Route::get('/cek-login', function () {
    return Auth::check()
        ? 'SUDAH LOGIN'
        : 'BELUM LOGIN';
});

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (Harus Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Master Data - Bisa diakses Admin & Petugas
    |--------------------------------------------------------------------------
    */

    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);

    /*
    |--------------------------------------------------------------------------
    | Transaksi - Bisa diakses Admin & Petugas
    |--------------------------------------------------------------------------
    */

    Route::resource('borrowings', BorrowingController::class);
    Route::resource('fines', FineController::class);

    /*
    |--------------------------------------------------------------------------
    | Khusus Admin
    |--------------------------------------------------------------------------
    | Kategori dan Laporan hanya boleh diakses oleh role 'admin'.
    | Jika Petugas mencoba mengakses langsung lewat URL, akan menerima 403.
    */

    Route::middleware(['admin'])->group(function () {

        Route::resource('categories', CategoryController::class);

        /*
        |--------------------------------------------------------------------------
        | Laporan (Halaman)
        |--------------------------------------------------------------------------
        */

        Route::get('/reports/borrowings', [ReportController::class, 'borrowings'])
            ->name('reports.borrowings');

        Route::get('/reports/fines', [ReportController::class, 'fines'])
            ->name('reports.fines');

        /*
        |--------------------------------------------------------------------------
        | Export PDF
        |--------------------------------------------------------------------------
        */

        Route::get('/reports/borrowings/pdf', [ReportController::class, 'borrowingsPdf'])
            ->name('reports.borrowings.pdf');

        Route::get('/reports/fines/pdf', [ReportController::class, 'finesPdf'])
            ->name('reports.fines.pdf');

        /*
        |--------------------------------------------------------------------------
        | Export Excel
        |--------------------------------------------------------------------------
        */

        Route::get('/reports/borrowings/excel', [ReportController::class, 'borrowingsExcel'])
            ->name('reports.borrowings.excel');

        Route::get('/reports/fines/excel', [ReportController::class, 'finesExcel'])
            ->name('reports.fines.excel');
    });
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';