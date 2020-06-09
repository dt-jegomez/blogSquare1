<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Article;
use Illuminate\Support\Facades\Http;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Insertar los post de la ultima hora';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
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
    }
}
