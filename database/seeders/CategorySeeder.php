<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Bullying',
            ],
            [
                'category_name' => 'Kesepian',
            ],
            [
                'category_name' => 'Sex Education',
            ],
            [
                'category_name' => 'Self Harming',
            ],
            [
                'category_name' => 'Pubertas',
            ],
            [
                'category_name' => 'Penyakit Alat Kelamin',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
