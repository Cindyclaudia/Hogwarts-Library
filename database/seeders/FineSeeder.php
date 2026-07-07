<?php

namespace Database\Seeders;

use App\Models\Fine;
use Illuminate\Database\Seeder;

class FineSeeder extends Seeder
{
    public function run(): void
    {
        Fine::create([
            'borrowing_id' => 2,
            'jumlah_denda' => 15000,
            'status_bayar' => 'Belum Bayar'
        ]);
    }
}