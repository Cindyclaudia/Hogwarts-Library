<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class FineController extends Controller
{
    /**
     * Menampilkan daftar denda
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $fines = Fine::with('borrowing.member')

            ->when($search, function ($query) use ($search) {

                $query->whereHas('borrowing.member', function ($q) use ($search) {

                    $q->where('nama', 'LIKE', "%{$search}%");

                })

                ->orWhere('status_bayar', 'LIKE', "%{$search}%")

                ->orWhere('jumlah_denda', 'LIKE', "%{$search}%");

            })

            ->latest()

            ->get();

        if ($request->ajax()) {

            return view(
                'fines.table',
                compact('fines')
            )->render();

        }

        return view(
            'fines.index',
            compact('fines')
        );
    }

    /**
     * Form tambah denda
     */
    public function create()
    {
        $borrowings = Borrowing::with('member')->get();

        return view('fines.create', compact('borrowings'));
    }

    /**
     * Simpan denda baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'borrowing_id' => 'required',
            'jumlah_denda' => 'required|numeric',
            'status_bayar' => 'required'
        ]);

        Fine::create([
            'borrowing_id' => $request->borrowing_id,
            'jumlah_denda' => $request->jumlah_denda,
            'status_bayar' => $request->status_bayar
        ]);

        return redirect()
            ->route('fines.index')
            ->with(
                'success',
                'Data denda berhasil ditambahkan'
            );
    }

    /**
     * Detail denda
     */
    public function show(Fine $fine)
    {
        $fine->load('borrowing.member');

        return view('fines.show', compact('fine'));
    }

    /**
     * Form edit denda
     */
    public function edit(Fine $fine)
    {
        return view('fines.edit', compact('fine'));
    }

    /**
     * Update denda
     */
    public function update(Request $request, Fine $fine)
    {
        $request->validate([
            'status_bayar' => 'required'
        ]);

        $fine->update([
            'status_bayar' => $request->status_bayar
        ]);

        return redirect()
            ->route('fines.index')
            ->with(
                'success',
                'Status pembayaran berhasil diperbarui'
            );
    }

    /**
     * Hapus denda
     */
    public function destroy(Fine $fine)
    {
        $fine->delete();

        return redirect()
            ->route('fines.index')
            ->with(
                'success',
                'Data denda berhasil dihapus'
            );
    }
}