<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'description',
        'publication_date',
        'created_by'
    ];
    public $timestamps = false;

    static function createArticle($data){
        Article::create([
            'title' => $data['title'],
            'description'=> $data['description'],
            'publication_date' => Carbon::now()->toDateTimeString(),
            'created_by' => auth()->user()->id
        ]);
    }

}
