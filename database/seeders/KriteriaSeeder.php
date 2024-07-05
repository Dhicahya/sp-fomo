<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Autonomy',
                'kode_kriteria' => 'K1',
                'deskripsi' => 'Kemampuan individu untuk membuat keputusan dan mengambil tindakan yang sesuai dengan keinginan dan nilai-nilai mereka sendiri.'
            ],
            [
                'nama' => 'Self-realization',
                'kode_kriteria' => 'K2',
                'deskripsi' => 'Kemampuan individu untuk mengatur perilaku, emosi, dan pikiran mereka sendiri.'
            ],
            [
                'nama' => 'Self-regulation',
                'kode_kriteria' => 'K3',
                'deskripsi' => 'Kemampuan mengembangkan pemahaman yang lebih dalam tentang siapa mereka, apa yang mereka inginkan, dan potensi mereka.'
            ],
            [
                'nama' => 'Empowerment',
                'kode_kriteria' => 'K4',
                'deskripsi' => 'Pemberian individu dengan keterampilan, pengetahuan, dan sumber daya yang mereka butuhkan untuk mengambil kendali atas kehidupan mereka sendiri dan berpartisipasi secara aktif dalam masyarakat.'
            ]
        ];
        DB::table('kriterias')->insert($data);
    }
}
