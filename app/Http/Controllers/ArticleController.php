<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\Article\ArticleRepositoryInterface;

class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->all();

        return response()->json([
            'status' => 'success',
            'data' => $articles
        ]);
    }

    public function delete($id)
    {
        if ($this->articleRepository->delete($id)) {
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

    public function get($id)
    {
        $article = $this->articleRepository->get($id);

        if ($article) {
            return response()->json([
                'status' => 'success',
                'data' => $article
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'data' => ''
        ], 404);
    }

    public function getArticlesByCategoryId($categoryId)
    {
        $articles = $this->articleRepository->getByCategory($categoryId);

        return response()->json([
            'status' => 'success',
            'data' => $articles
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        if ($this->articleRepository->create($request)) {
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
            'text' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        if ($this->articleRepository->update($request, $id)) {
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
}