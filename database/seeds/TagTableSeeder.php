<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
        	['name' => 'adidas stan smith','slug' => 'adidas-stan-smith'],
        	['name' => 'nike football','slug' => 'nike-football'],
        	['name' => 'thượng đỉnh','slug' => 'thuong-dinh'],
        	['name' => 'balenciaga triple s','slug' => 'balenciaga-triple-s'],
        	['name' => 'converse classic','slug' => 'converse-classic'],
        ];
        DB::table('tags')->insert($tags);
    }
}
