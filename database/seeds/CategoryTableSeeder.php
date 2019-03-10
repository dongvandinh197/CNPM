<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        		['name' => 'Adidas shoe','slug' => 'adidas-shoe'],
        		['name' => 'Nike shoe','slug' => 'nike-shoe'],
        		['name' => 'Converse shoe','slug' => 'converse-shoe'],
        		['name' => 'Thượng đình shoe','slug' => 'thuong-dinh-shoe'],
        		['name' => 'Vans shoe','slug' => 'van-shoe'],
        		['name' => 'Balenciaga shoe','slug' => 'balenciaga-shoe'],
        		['name' => 'Bitis shoe','slug' => 'bitis-shoe'],
        		['name' => 'Kid shoe','slug' => 'kid-shoe'],
        ];
        DB::table('categories')->insert($categories);
    }
}
