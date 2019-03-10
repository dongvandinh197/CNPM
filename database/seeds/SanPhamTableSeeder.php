<?php

use Illuminate\Database\Seeder;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i <100 ; $i++) { 
    		DB::table('sanpham')->insert([
        	'tensp'=> 'iphone 7 plus'.$i,
        	'mota'=>'dang cap doanh nhan',
        	'hinhanh'=>'link anh',
        ]);
    	}
        
    }
}
