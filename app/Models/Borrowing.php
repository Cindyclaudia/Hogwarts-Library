<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrowing extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_pengembalian',
        'status'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function books()
    {
        return $this->belongsToMany(
            Book::class,
            'borrowing_details'
        )->withPivot('qty');
    }

    public function fine()
    {
        return $this->hasOne(Fine::class);
    }
}