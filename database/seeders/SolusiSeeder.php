<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SolusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori' => 'Tinggi',
                'solusi' => 'Tingkat Fear of Missing Out Anda rendah. Anda mengambil inisiatif dan memutuskan hal-hal yang penting bagi Anda. Anda sangat tahu apa yang Anda inginkan, dan Anda berusaha untuk mendapatkannya. Anda berpikir sebelum melakukan sesuatu dan itu membantu Anda dalam hidup Anda. Jangan lupa bahwa Anda bisa meminta bantuan ketika Anda membutuhkannya.',
            ],
            [
                'kategori' => 'Sedang',
                'solusi' => 'Tingkat Fear of Missing Out Anda sedang. Anda memutuskan hal-hal yang penting bagi Anda tetapi terkadang Anda perlu mengambil inisiatif. Meskipun Anda tahu apa yang Anda inginkan, Anda memiliki beberapa keraguan tentang bagaimana cara mendapatkannya. Banyak hal dalam hidup Anda akan menjadi jauh lebih mudah jika Anda berhenti sejenak untuk memikirkan sebelum melakukannya. Jangan lupa bahwa Anda bisa meminta bantuan untuk mencoba meningkatkan hal-hal ini.',
            ],
            [
                'kategori' => 'Rendah',
                'solusi' => 'Tingkat Fear of Missing Out Anda tinggi. Tampaknya Anda membutuhkan bantuan dalam membuat keputusan. Pikirkan bagaimana atau siapa yang bisa membantu Anda. Anda kesulitan mengetahui hal-hal yang Anda sukai. Anda bisa membuat daftar hal-hal penting bagi Anda. Terkadang Anda melakukan hal-hal tanpa terlalu memikirkan konsekuensinya. Penting bagi Anda untuk memikirkan apa yang bisa terjadi ketika Anda melakukan sesuatu.',
            ],
        ];
        DB::table('solusis')->insert($data);
    }
}
