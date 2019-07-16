<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.07.19
 * Time: 13:02
 */

namespace App\Repositories\Category;
use App\Category;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function update($title, $id)
    {
        $category = Category::find($id);
        $category->title = $title;
        return $category->save();
    }

    public function create($title)
    {
        $category = new Category();
        $category->title = $title;
        return $category->save();
    }

    public function delete($id)
    {
        return Category::find($id)->delete(0);
    }

    public function get($id)
    {
        return Category::find($id);
    }
}