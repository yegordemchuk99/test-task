<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article();
        $article->title = 'About PHP';
        $article->text = 'Best language!';
        $article->category_id = 1;
        $article->save();

        $article = new Article();
        $article->title = 'About PHP 2';
        $article->text = 'Some information about PHP';
        $article->category_id = 1;
        $article->save();

        $article = new Article();
        $article->title = 'About fishing';
        $article->text = 'Some information about fishing)';
        $article->category_id = 2;
        $article->save();
    }
}
