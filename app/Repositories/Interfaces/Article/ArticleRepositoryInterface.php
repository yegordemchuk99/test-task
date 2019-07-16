<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.07.19
 * Time: 14:52
 */

namespace App\Repositories\Interfaces\Article;


use Illuminate\Http\Request;

interface ArticleRepositoryInterface
{
    public function all();

    public function create(Request $request);

    public function delete($id);

    public function get($id);

    public function update(Request $request, $id);

    public function getByCategory($categoryId);
}