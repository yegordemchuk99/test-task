<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.07.19
 * Time: 11:44
 */

namespace App\Repositories\Article;
use App\Repositories\Interfaces\Article\ArticleRepositoryInterface;
use App\Article;

use Illuminate\Http\Request;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function get($id)
    {
        return Article::find($id);
    }

    public function getByCategory($categoryId)
    {
        return Article::where('category_id', $categoryId)->get();
    }

    public function create(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->text = $request->text;
        return $article->save();
    }

    public function delete($id)
    {
        return Article::find($id)->delete();
    }

    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->text = $request->text;
        return $article->save();
    }
}