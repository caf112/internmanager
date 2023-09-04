<?php

namespace App\Console\Commands;
use App\Models\Article;
use App\Models\Program;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MoveArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'move:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '日付が過ぎたデータを終了済みの方に送る';

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
     * @return int
     */
    public function handle()
{
    $articles = Program::whereDate('date', '<', now())->get();

    DB::beginTransaction(); 
    try {
        foreach ($articles as $article) {
            Article::create([
                'title' => $article->title,
                'date' => $article->date,
                'content' => $article->content,
            ]);
            $article->forceDelete();
        }
        DB::commit();
    } catch (Exception $e) {
        DB::rollback();
    }
}

}