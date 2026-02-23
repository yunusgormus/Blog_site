<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 4; $i++) {
            $title=$faker->sentence(6);
            DB::table("articles")->insert([
                'category'=>rand(1,7),
                'title'=>$title,
                'image' => 'https://picsum.photos/640/480?random=' . $i,
                'content'=>$faker->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at'=>$faker->dateTime('now'), 
                'updated_at'=>now()
            ]);
        }
    }
}
