<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EduVid;

class EduVidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $eduvids = [
            [
                'title' => 'Test video 1',
                'vid_link' => 'https://youtu.be/vMADTUm7BbU?si=1iikSyPW2Lsg5xZQ',
                'description' => 'This is a test video description',
                'user_id' => 3,
                'category_id' => 2,
            ],
        ];

        foreach ($eduvids as $eduvid) {
            Eduvid::create($eduvid);
        }
    }
}
