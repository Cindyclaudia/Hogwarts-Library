<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'Ramuan',
            'Mantra',
            'Pertahanan Sihir',
            'Makhluk Gaib',
            'Sejarah Sihir'
        ];

        foreach ($data as $item) {
            Category::create([
                'nama_kategori' => $item
            ]);
        }
    }
}