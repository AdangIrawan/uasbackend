<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poli;

class PoliSeeder extends Seeder {
    public function run(): void {
        $polis = [
            ['nama' => 'Poli Umum'],
            ['nama' => 'Poli Gigi'],
            ['nama' => 'Poli Jantung'],
        ];

        foreach ($polis as $poli) {
            Poli::create($poli);
        }
    }
}

