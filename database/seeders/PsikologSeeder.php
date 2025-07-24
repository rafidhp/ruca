<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Psikolog;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $psikologs = [
            [
                'no_hp' => '081234567890',
                'spesialisasi' => 'remaja',
                'str_doc' => 'default_str.pdf',
                'sip_doc' => 'default_sip.pdf',
                'education' => 'Intitut Teknolog Bandung',
                'photo' => 'default_photo.webp',
                'description' => 'dummy psikolog data',
                'user_id' => 3,
            ],
        ];

        foreach ($psikologs as $psikolog) {
            Psikolog::create($psikolog);
        }
    }
}