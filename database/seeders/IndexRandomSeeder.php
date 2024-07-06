<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IndexRandom;


class IndexRandomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['jumlah' => 1, 'nilai' => 0.00],
            ['jumlah' => 2, 'nilai' => 0.00],
            ['jumlah' => 3, 'nilai' => 0.58],
            ['jumlah' => 4, 'nilai' => 0.90],
            ['jumlah' => 5, 'nilai' => 1.12],
            ['jumlah' => 6, 'nilai' => 1.24],
            ['jumlah' => 7, 'nilai' => 1.32],
            ['jumlah' => 8, 'nilai' => 1.41],
            ['jumlah' => 9, 'nilai' => 1.45],
            ['jumlah' => 10, 'nilai' => 1.49],
            ['jumlah' => 11, 'nilai' => 1.51],
            ['jumlah' => 12, 'nilai' => 1.48],
        ];

        foreach ($data as $item) {
            IndexRandom::create($item);
        }
    }
}
