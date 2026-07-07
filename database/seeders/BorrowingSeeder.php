<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    public function run(): void
    {
        Borrowing::create([
            'member_id' => 1,
            'tanggal_pinjam' => now()->subDays(5),
            'tanggal_kembali' => now()->addDays(2),
            'status' => 'Dipinjam'
        ]);

        Borrowing::create([
            'member_id' => 2,
            'tanggal_pinjam' => now()->subDays(10),
            'tanggal_kembali' => now()->subDays(3),
            'status' => 'Dikembalikan'
        ]);
    }
}