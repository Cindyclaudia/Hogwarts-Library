<?php

namespace App\Exports;

use App\Models\Fine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FinesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Fine::with('borrowing.member')->get()->map(function ($item) {

            return [

                'ID' => $item->id,

                'Anggota' => $item->borrowing->member->nama,

                'Jumlah Denda' => $item->jumlah_denda,

                'Status Bayar' => $item->status_bayar,

            ];

        });
    }

    public function headings(): array
    {
        return [

            'ID',

            'Nama Anggota',

            'Jumlah Denda',

            'Status Bayar'

        ];
    }
}