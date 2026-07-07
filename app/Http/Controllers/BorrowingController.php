<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\BorrowingDetail;
use App\Models\Book;
use App\Models\Member;
use App\Models\Fine;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $borrowings = Borrowing::with([
            'member',
            'books'
        ])

        ->when($search, function ($query) use ($search) {

            $query->whereHas('member', function ($q) use ($search) {

                $q->where('nama', 'LIKE', "%{$search}%");

            })

            ->orWhereHas('books', function ($q) use ($search) {

                $q->where('judul', 'LIKE', "%{$search}%");

            })

            ->orWhere('status', 'LIKE', "%{$search}%");

        })

        ->latest()

        ->get();


        if ($request->ajax()) {

            return view(
                'borrowings.table',
                compact('borrowings')
            )->render();

        }


        return view(
            'borrowings.index',
            compact('borrowings')
        );
    }


    public function create()
    {
        $members = Member::all();

        $books = Book::all();

        return view(
            'borrowings.create',
            compact(
                'members',
                'books'
            )
        );
    }


    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required',
            'book_id' => 'required',
            'qty' => 'required|integer|min:1'
        ]);


        $book = Book::findOrFail(
            $request->book_id
        );


        if($book->stok < $request->qty){

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Stok buku tidak cukup'
                );
        }


        $borrowing = Borrowing::create([

            'member_id' => $request->member_id,

            'tanggal_pinjam' => now(),

            'tanggal_kembali' => now()
                ->addDays(7),

            'tanggal_pengembalian' => null,

            'status' => 'Dipinjam'

        ]);


        BorrowingDetail::create([

            'borrowing_id' => $borrowing->id,

            'book_id' => $request->book_id,

            'qty' => $request->qty

        ]);


        $book->decrement(
            'stok',
            $request->qty
        );


        return redirect()
            ->route('borrowings.index')
            ->with(
                'success',
                'Peminjaman berhasil ditambahkan'
            );
    }


    public function show(Borrowing $borrowing)
    {
        $borrowing->load([
            'member',
            'books'
        ]);


        return view(
            'borrowings.show',
            compact('borrowing')
        );
    }


    public function edit(Borrowing $borrowing)
    {
        $members = Member::all();


        return view(
            'borrowings.edit',
            compact(
                'borrowing',
                'members'
            )
        );
    }


    public function update(
        Request $request,
        Borrowing $borrowing
    )
    {
        $request->validate([

            'member_id' => 'required',

            'tanggal_kembali' => 'required',

            'status' => 'required'

        ]);


        $borrowing->update([

            'member_id' => $request->member_id,

            'tanggal_kembali' => $request->tanggal_kembali,

            'status' => $request->status,

            'tanggal_pengembalian' => $request->status == "Dikembalikan"
                                    ? now()
                                    : null

        ]);


        if($request->status == "Dikembalikan"){


            $terlambat = now()->diffInDays(
                $borrowing->tanggal_kembali,
                false
            );


            if($terlambat < 0){


                $hari = abs($terlambat);


                Fine::updateOrCreate(

                    [

                        'borrowing_id' => $borrowing->id

                    ],

                    [

                        'jumlah_denda' => $hari * 2000,

                        'status_bayar' => 'Belum Bayar'

                    ]

                );

            }

        }


        return redirect()
            ->route('borrowings.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }


    public function destroy(
        Borrowing $borrowing
    )
    {

        foreach(
            $borrowing->books
            as
            $book
        ){

            $book->increment(
                'stok',
                $book->pivot->qty
            );

        }


        $borrowing->delete();


        return redirect()
            ->route('borrowings.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}