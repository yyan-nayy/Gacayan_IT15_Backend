<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // GET /api/posts
    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $postsQuery = Post::with('category')->orderBy('created_at', 'desc');

        if ($categoryId) {
            $postsQuery->where('category_id', $categoryId);
        }

        $posts = $postsQuery->get();

        return response()->json([
            'data' => $posts
        ]);
    }

    // POST /api/posts
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $post = Post::create($request->only('category_id', 'title', 'description'));

        return response()->json($post, 201);
    }
}