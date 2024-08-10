<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryProducts = [
            ['name' => 'Electronics'],
            ['name' => 'Books'],
            ['name' => 'Clothing'],
            ['name' => 'Home & Garden'],
            ['name' => 'Toys'],
        ];

        DB::table('category_products')->insert($categoryProducts);
    }
}
