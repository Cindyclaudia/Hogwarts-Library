<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::create([
            'nama' => 'Harry Potter',
            'alamat' => 'Gryffindor',
            'telepon' => '0811111111',
            'email' => 'harry@hogwarts.com'
        ]);

        Member::create([
            'nama' => 'Hermione Granger',
            'alamat' => 'Gryffindor',
            'telepon' => '0822222222',
            'email' => 'hermione@hogwarts.com'
        ]);
    }
}