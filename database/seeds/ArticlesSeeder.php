<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('img_products')->insert([
           'key'=> '1',
            'name'=> 'test',
            'type'=> 'jpeg',
            'size'=> '1024',
        ]);
        DB::table('products')->insert([
            'article' => Str::random(5),
            'category_id' => '2',
            'name' => Str::random(5),
            'description'=>Str::random(100),
            'price' =>'10000',
            'user_id'=>'1',
        ]);
    }
}
