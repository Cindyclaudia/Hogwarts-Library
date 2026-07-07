<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'category_id' => 1,
            'judul' => 'Advanced Potion Making',
            'penulis' => 'Libatius Borage',
            'penerbit' => 'Hogwarts Press',
            'tahun_terbit' => 2020,
            'stok' => 10
        ]);

        Book::create([
            'category_id' => 2,
            'judul' => 'Defensive Magical Theory',
            'penulis' => 'Wilbert Slinkhard',
            'penerbit' => 'Hogwarts Press',
            'tahun_terbit' => 2021,
            'stok' => 15
        ]);
    }
}