<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Borrowing;
use App\Models\Fine;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks = Book::count();

        $totalMembers = Member::count();

        $totalBorrowings = Borrowing::count();

        $totalFines = Fine::sum('jumlah_denda');

        return view('dashboard.index', compact(
            'totalBooks',
            'totalMembers',
            'totalBorrowings',
            'totalFines'
        ));
    }
}