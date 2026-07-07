<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fines', function (Blueprint $table) {

            $table->id();

            $table->foreignId('borrowing_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->decimal('jumlah_denda',12,2);

            $table->enum('status_bayar',[
                'Belum Bayar',
                'Sudah Bayar'
            ])->default('Belum Bayar');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};