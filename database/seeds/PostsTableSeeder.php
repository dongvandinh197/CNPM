<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
       for ($i=0; $i <200 ; $i++) { 
       	$title = $faker->realText($maxNbChars = 100, $indexSize = 1);
       		$post=[
       			'title' => $title,
       			'slug' => str_slug($title),
       			'feature' => $faker->imageUrl($width = 640, $height = 480),
       			'content' => $faker->realText($maxNbChars = 500, $indexSize = 4),
       			'category_id' => rand(1,8)
       		];
       		DB::table('posts')->insert($post);
       }
    }
}
