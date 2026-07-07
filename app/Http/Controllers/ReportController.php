<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Fine;

use App\Exports\BorrowingsExport;
use App\Exports\FinesExport;

use Maatwebsite\Excel\Facades\Excel;

use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Halaman Laporan Peminjaman
    |--------------------------------------------------------------------------
    */

    public function borrowings()
    {
        $borrowings = Borrowing::with('member')
            ->latest()
            ->get();

        return view(
            'reports.borrowings',
            compact('borrowings')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Halaman Laporan Denda
    |--------------------------------------------------------------------------
    */

    public function fines()
    {
        $fines = Fine::with('borrowing.member')
            ->latest()
            ->get();

        return view(
            'reports.fines',
            compact('fines')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Export PDF Peminjaman
    |--------------------------------------------------------------------------
    */

    public function borrowingsPdf()
    {
        $borrowings = Borrowing::with('member')->get();

        $pdf = Pdf::loadView(
            'reports.pdf.borrowings',
            compact('borrowings')
        );

        return $pdf->download('Laporan_Peminjaman.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | Export PDF Denda
    |--------------------------------------------------------------------------
    */

    public function finesPdf()
    {
        $fines = Fine::with('borrowing.member')->get();

        $pdf = Pdf::loadView(
            'reports.pdf.fines',
            compact('fines')
        );

        return $pdf->download('Laporan_Denda.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | Export Excel Peminjaman
    |--------------------------------------------------------------------------
    */

    public function borrowingsExcel()
    {
        return Excel::download(
            new BorrowingsExport,
            'Laporan_Peminjaman.xlsx'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Export Excel Denda
    |--------------------------------------------------------------------------
    */

    public function finesExcel()
    {
        return Excel::download(
            new FinesExport,
            'Laporan_Denda.xlsx'
        );
    }
}