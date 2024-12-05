<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->foreignId('poli_id')->constrained();
            $table->date('tanggal');
            $table->integer('nomor_antrian');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('antrians');
    }
};
