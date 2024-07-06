<?php

namespace Database\Seeders;

use App\Models\Indikator;
use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanyaanSeeder extends Seeder
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

        $indikator1 = Indikator::where('kode_indikator', 'I1')->first();
        $indikator2 = Indikator::where('kode_indikator', 'I2')->first();
        $indikator3 = Indikator::where('kode_indikator', 'I3')->first();
        $indikator4 = Indikator::where('kode_indikator', 'I4')->first();
        $indikator5 = Indikator::where('kode_indikator', 'I5')->first();
        $indikator6 = Indikator::where('kode_indikator', 'I6')->first();
        $indikator7 = Indikator::where('kode_indikator', 'I7')->first();
        $indikator8 = Indikator::where('kode_indikator', 'I8')->first();
        $indikator9 = Indikator::where('kode_indikator', 'I9')->first();
        $indikator10 = Indikator::where('kode_indikator', 'I10')->first();
        $indikator11 = Indikator::where('kode_indikator', 'I11')->first();
        $indikator12 = Indikator::where('kode_indikator', 'I12')->first();

        $data = [
            [
                'pertanyaan' => 'Saya memilih kegiatan organisasi dalam kehidupan perkuliahan saya.',
                'kode_pertanyaan' => 'G1',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator1->id,
            ],
            [
                'pertanyaan' => 'Saya tahu bagaimana memilih pekerjaan yang saya sukai.',
                'kode_pertanyaan' => 'G2',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator1->id,
            ],
            [
                'pertanyaan' => 'Saya melakukan pekerjaan yang saya pilih untuk dilakukan.',
                'kode_pertanyaan' => 'G3',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator1->id,
            ],
            [
                'pertanyaan' => 'Saya memberikan suara dalam pemilihan presiden di negara saya.',
                'kode_pertanyaan' => 'G4',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator1->id,
            ],
            [
                'pertanyaan' => 'Saya membuat keputusan untuk memilih jurusan kuliah untuk diri saya sendiri.',
                'kode_pertanyaan' => 'G5',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator2->id,
            ],
            [
                'pertanyaan' => 'Saya mampu memutuskan bagaimana menghabiskan uang saya.',
                'kode_pertanyaan' => 'G6',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator2->id,
            ],
            [
                'pertanyaan' => 'Saya memutuskan dengan siapa saya akan berteman dalam kehidupan saya.',
                'kode_pertanyaan' => 'G7',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator2->id,
            ],
            [
                'pertanyaan' => 'Saya menggunakan uang saya kapan pun saya mau.',
                'kode_pertanyaan' => 'G8',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator2->id,
            ],
            [
                'pertanyaan' => 'Saya memecahkan masalah akademik dalam perkuliahan saya.',
                'kode_pertanyaan' => 'G9',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator3->id,
            ],
            [
                'pertanyaan' => 'Saya tahu bagaimana cara meminta bantuan pada orang lain.',
                'kode_pertanyaan' => 'G10',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator3->id,
            ],
            [
                'pertanyaan' => 'Jika saya salah, saya tahu bagaimana menyelesaikan masalah.',
                'kode_pertanyaan' => 'G11',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator3->id,
            ],
            [
                'pertanyaan' => 'Saya mudah beradaptasi di lingkungan baru.',
                'kode_pertanyaan' => 'G12',
                'kriteria_id' => $kriteria1->id,
                'indikator_id' => $indikator3->id,
            ],
            [
                'pertanyaan' => 'Saya mampu menjadi diri saya sendiri di lingkungan pertemanan.',
                'kode_pertanyaan' => 'G13',
                'kriteria_id' => $kriteria2->id,
                'indikator_id' => $indikator4->id,
            ],
            [
                'pertanyaan' => 'Saya tahu apa yang membuat saya merasa tidak nyaman.',
                'kode_pertanyaan' => 'G14',
                'kriteria_id' => $kriteria2->id,
                'indikator_id' => $indikator4->id,
            ],
            [
                'pertanyaan' => 'Saya tahu batasan diri saya dalam melakukan pekerjaan.',
                'kode_pertanyaan' => 'G15',
                'kriteria_id' => $kriteria2->id,
                'indikator_id' => $indikator4->id,
            ],
            [
                'pertanyaan' => 'Saya tahu cara mengenali teman yang sedang sedih.',
                'kode_pertanyaan' => 'G16',
                'kriteria_id' => $kriteria2->id,
                'indikator_id' => $indikator4->id,
            ],
            [
                'pertanyaan' => 'Saya menetapkan dan melaksanakan berbagai tujuan akademik secara mandiri dalam kehidupan kampus.',
                'kode_pertanyaan' => 'G17',
                'kriteria_id' => $kriteria2->id,
                'indikator_id' => $indikator5->id,
            ],
            [
                'pertanyaan' => 'Saya mengambil tindakan nyata untuk mencapai tujuan saya.',
                'kode_pertanyaan' => 'G18',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator6->id,
            ],
            [
                'pertanyaan' => 'Saya selalu berusaha untuk melakukan pekerjaan sampai selesai.',
                'kode_pertanyaan' => 'G19',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator6->id,
            ],
            [
                'pertanyaan' => 'Saya semangat untuk belajar hal baru yang menarik perhatian saya.',
                'kode_pertanyaan' => 'G20',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator6->id,
            ],
            [
                'pertanyaan' => 'Saya mudah bekerja sama dengan orang lain.',
                'kode_pertanyaan' => 'G21',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator6->id,
            ],
            [
                'pertanyaan' => 'Saya mempertimbangkan berbagai kemungkinan hasil dari tindakan yang saya lakukan.',
                'kode_pertanyaan' => 'G22',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator7->id,
            ],
            [
                'pertanyaan' => 'Saya bangkit dan mencoba lagi setelah mengalami kegagalan.',
                'kode_pertanyaan' => 'G23',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator7->id,
            ],
            [
                'pertanyaan' => 'Saya memikirkan dengan cermat dampak dari setiap tindakan yang saya ambil.',
                'kode_pertanyaan' => 'G24',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator7->id,
            ],
            [
                'pertanyaan' => 'Saya sadar jika perkataan saya dapat membuat orang lain merasa kesal.',
                'kode_pertanyaan' => 'G25',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator7->id,
            ],
            [
                'pertanyaan' => 'Saya tahu cara menetapkan tujuan yang ingin saya capai.',
                'kode_pertanyaan' => 'G26',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator8->id,
            ],
            [
                'pertanyaan' => 'Saya hidup seperti yang saya rencanakan.',
                'kode_pertanyaan' => 'G27',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator8->id,
            ],
            [
                'pertanyaan' => 'Saya merencanakan waktu luang saya.',
                'kode_pertanyaan' => 'G28',
                'kriteria_id' => $kriteria3->id,
                'indikator_id' => $indikator8->id,
            ],
            [
                'pertanyaan' => 'Saya menyampaikan pikiran dan pendapat saya dalam organisasi yang saya ikuti.',
                'kode_pertanyaan' => 'G29',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator9->id,
            ],
            [
                'pertanyaan' => 'Saya tidak ragu untuk mengungkapkan pendapat kepada orang lain.',
                'kode_pertanyaan' => 'G30',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator9->id,
            ],
            [
                'pertanyaan' => 'Saya menyampaikan ketidaknyamanan dengan kondisi yang terjadi disekitar saya.',
                'kode_pertanyaan' => 'G31',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator9->id,
            ],
            [
                'pertanyaan' => 'Saya tahu hak-hak saya.',
                'kode_pertanyaan' => 'G32',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator9->id,
            ],
            [
                'pertanyaan' => 'Saya merasa memiliki hak untuk memilih tindakan saya lakukan.',
                'kode_pertanyaan' => 'G33',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator10->id,
            ],
            [
                'pertanyaan' => 'Saya memiliki kepercayaan diri untuk mencapai sesuatu.',
                'kode_pertanyaan' => 'G34',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator10->id,
            ],
            [
                'pertanyaan' => 'Saya pergi ke mana pun saya mau dengan bebas.',
                'kode_pertanyaan' => 'G35',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator10->id,
            ],
            [
                'pertanyaan' => 'Saya mengatur jadwal saya.',
                'kode_pertanyaan' => 'G36',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator10->id,
            ],
            [
                'pertanyaan' => 'Saya yakin dengan kemampuan yang saya miliki.',
                'kode_pertanyaan' => 'G37',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator11->id,
            ],
            [
                'pertanyaan' => 'Saya tahu bagaimana menyelesaikan pekerjaan saya dengan efisien.',
                'kode_pertanyaan' => 'G38',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator11->id,
            ],
            [
                'pertanyaan' => 'Saya memberikan saran jika diminta.',
                'kode_pertanyaan' => 'G39',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator11->id,
            ],
            [
                'pertanyaan' => 'Saya mengatur barang-barang saya dengan baik.',
                'kode_pertanyaan' => 'G40',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator11->id,
            ],
            [
                'pertanyaan' => 'Saya tahu usaha yang saya lakukan berjalan dengan baik dan sesuai dengan tujuan.',
                'kode_pertanyaan' => 'G41',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator12->id,
            ],
            [
                'pertanyaan' => 'Saya menyadari dan yakin bahwa saya berkompeten.',
                'kode_pertanyaan' => 'G42',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator12->id,
            ],
            [
                'pertanyaan' => 'Saya tahu bahwa orang lain merasa terbantu berkat usaha saya.',
                'kode_pertanyaan' => 'G43',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator12->id,
            ],
            [
                'pertanyaan' => 'Saya memberi selamat pada diri saya sendiri ketika saya melakukan sesuatu dengan baik.',
                'kode_pertanyaan' => 'G44',
                'kriteria_id' => $kriteria4->id,
                'indikator_id' => $indikator12->id,
            ],

        ];
        DB::table('pertanyaans')->insert($data);


    }
}
