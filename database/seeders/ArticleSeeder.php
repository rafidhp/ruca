<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Understanding Mental Health',
                'content' => 'Mental health is a crucial aspect of our overall well being. It encompasses our emotional, psychological and social well being. Mental health affects how we think, feel and act. It also helps determine how we handle stress, relate to others and make choices.',
                'upload_date' => '2025-07-31',
                'category_id' => 7,
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}
