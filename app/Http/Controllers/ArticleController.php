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

    public function setArticles(){
        try {
            $response = Http::get('https://sq1-api-test.herokuapp.com/posts');
            $jsonData = $response->json();
            $temp = collect($jsonData['data'])->map(function($value,$key){
                $a = Article::where([['title',$value['title']],['description',$value['description']]])->doesntExist();
                if ($a) {
                    $value['created_by'] = 1;
                    return $value;
                }
            })->filter();
            if ($temp->isNotEmpty()) {
                Article::insert($temp->toArray());
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

}
