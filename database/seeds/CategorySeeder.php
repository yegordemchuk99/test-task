<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->title = 'IT';
        $category->save();

        $category = new Category();
        $category->title = 'fishing';
        $category->save();
    }
}
