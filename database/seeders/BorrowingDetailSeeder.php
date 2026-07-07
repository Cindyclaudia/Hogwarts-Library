<?php

namespace Database\Seeders;

use App\Models\BorrowingDetail;
use Illuminate\Database\Seeder;

class BorrowingDetailSeeder extends Seeder
{
    public function run(): void
    {
        BorrowingDetail::create([
            'borrowing_id' => 1,
            'book_id' => 1,
            'qty' => 1
        ]);

        BorrowingDetail::create([
            'borrowing_id' => 1,
            'book_id' => 2,
            'qty' => 1
        ]);

        BorrowingDetail::create([
            'borrowing_id' => 2,
            'book_id' => 1,
            'qty' => 2
        ]);
    }
}