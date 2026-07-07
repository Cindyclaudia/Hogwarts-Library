<?php

namespace App\Exports;

use App\Models\Borrowing;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BorrowingsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Borrowing::with('member')->get()->map(function ($item) {

            return [

                'ID' => $item->id,

                'Anggota' => $item->member->nama,

                'Tanggal Pinjam' => $item->tanggal_pinjam,

                'Tanggal Kembali' => $item->tanggal_kembali,

                'Status' => $item->status,

            ];

        });
    }

    public function headings(): array
    {
        return [

            'ID',

            'Nama Anggota',

            'Tanggal Pinjam',

            'Tanggal Kembali',

            'Status'

        ];
    }
}