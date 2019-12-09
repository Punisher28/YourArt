<?php

namespace App\Http\Controllers\API;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiArticleController extends Controller
{
    public function store(Request $request)
    {
        $article = Products::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Products $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Products $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }

    public function searchApi(Request $request)
    {
        if ($request->has('queryApp')) {
            $result = Products::where('name', 'LIKE', '%' . $request->queryApp . '%')->get();

            return response()->json($result);

        }else{
            return 'Упппс щось пішло не так';
        }
    }
    public function showArt()
    {
        $articles = Products::all();
        return $articles;
    }

    public function showIDAPI($id)
    {
        $article = Products::find($id);
        return response()->json($article);
    }
}
