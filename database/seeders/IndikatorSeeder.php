<?php

namespace Database\Seeders;

use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria1 = Kriteria::where('kode_kriteria', 'K1')->first();
        $kriteria2 = Kriteria::where('kode_kriteria', 'K2')->first();
        $kriteria3 = Kriteria::where('kode_kriteria', 'K3')->first();
        $kriteria4 = Kriteria::where('kode_kriteria', 'K4')->first();
        
        $data = [
            [
                'nama' => 'Membuat Pilihan',
                'kode_Indikator' => 'I1',
                'kriteria_id' => $kriteria1->id,
            ],
            [
                'nama' => 'Pengambilan Keputusan',
                'kode_Indikator' => 'I2',
                'kriteria_id' => $kriteria1->id,
            ],
            [
                'nama' => 'Pemecahan Masalah',
                'kode_Indikator' => 'I3',
                'kriteria_id' => $kriteria1->id,
            ],
            [
                'nama' => 'Pengetahuan Diri',
                'kode_Indikator' => 'I4',
                'kriteria_id' => $kriteria2->id,
            ],
            [
                'nama' => 'Penetapan Tujuan',
                'kode_Indikator' => 'I5',
                'kriteria_id' => $kriteria2->id,
            ],
            [
                'nama' => 'Instruksi Diri',
                'kode_Indikator' => 'I6',
                'kriteria_id' => $kriteria3->id,
            ],
            [
                'nama' => 'Evaluasi Diri',
                'kode_Indikator' => 'I7',
                'kriteria_id' => $kriteria3->id,
            ],
            [
                'nama' => 'Penetapan Tujuan',
                'kode_Indikator' => 'I8',
                'kriteria_id' => $kriteria3->id,
            ],
            [
                'nama' => 'Advokasi Diri',
                'kode_Indikator' => 'I9',
                'kriteria_id' => $kriteria4->id,
            ],
            [
                'nama' => 'Kontrol Diri',
                'kode_Indikator' => 'I10',
                'kriteria_id' => $kriteria4->id,
            ],
            [
                'nama' => 'Harapan Kesuksesan',
                'kode_Indikator' => 'I11',
                'kriteria_id' => $kriteria4->id,
            ],
            [
                'nama' => 'Kompetensi Diri',
                'kode_Indikator' => 'I12',
                'kriteria_id' => $kriteria4->id,
            ],
        ];
        DB::table('indikators')->insert($data);
    }

}
