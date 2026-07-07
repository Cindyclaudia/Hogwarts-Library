<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrowing_id',
        'jumlah_denda',
        'status_bayar'
    ];

    public function borrowing()
    {
        return $this->belongsTo(Borrowing::class);
    }
}