<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12.07.19
 * Time: 13:03
 */

namespace App\Repositories\Interfaces\Category;


interface CategoryRepositoryInterface
{
    public function all();

    public function create($title);

    public function delete($id);

    public function get($id);

    public function update($title, $id);
}