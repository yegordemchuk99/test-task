<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        if ($this->categoryRepository->create($request->title)) {
            return response()->json([
                'status' => 'success',
                'data' => ''
            ], 201);
        }

        return response()->json([
            'status' => 'error',
            'data' => ''
        ], 422);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
        ]);

        if ($this->categoryRepository->update($request->title,$id)) {
            return response()->json([
                'status' => 'success',
                'data' => ''
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'data' => ''
        ], 422);
    }

    public function delete($id)
    {
        if ($this->categoryRepository->delete($id)) {
            return response()->json([
                'status' => 'success',
                'data' => ''
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'data' => ''
        ], 422);
    }

    public function index()
    {
        $categories = $this->categoryRepository->all();

        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    public function get($id)
    {
        $category = $this->categoryRepository->get($id);

        if ($category) {
            return response()->json([
                'status' => 'success',
                'data' => $category
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'data' => ''
        ], 404);
    }

}
