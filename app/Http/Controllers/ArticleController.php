<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{

    public function index()
    {
        return Article::orderBy('publication_date','desc')->get();
    }

    public function store(Request $request)
    {
        try {
            return \DB::transaction(function()use($request){
                Article::createArticle($request->all());
                return response(['mensaje' => 'created successfully'],201);
            });
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
