<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $articles = Article::orderBy('date', 'asc')->get(); // データをソートして取得
    $data = ['articles' => $articles]; // データをビューに渡す
    return view('articles.index', $data);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $article = new Article();
        $data = ['article' => $article];
        return view('articles.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'content' => 'required',
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->date = $request->date;
        $article->period = $request->period;
        $article->selection = $request->selection;
        $article->industry = $request->industry;
        $article->explanation = $request->explanation;
        $article->content = $request->content;
        $article->body = $request->body;
        $article->evaluation = $request->evaluation;
        $article->save();

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = ['article' => $article];
        return view('articles.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $data = ['article' => $article];
        return view('articles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'date' => 'required',
            'content' => 'required',
            'body' => 'required',
            'evaluation' => 'required'
        ]);
        $article->title = $request->title;
        $article->date = $request->date;
        $article->period = $request->period;
        $article->selection = $request->selection;
        $article->industry = $request->industry;
        $article->explanation = $request->explanation;
        $article->content = $request->content;
        $article->body = $request->body;
        $article->evaluation = $request->evaluation;
        $article->save();
        return redirect(route('articles.show', $article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }

    public function sort(Article $article)
    {
        $article = Article::orderBy('date', 'asc')->get();
    }

    public function search(Request $request)
    {
        Log::debug('test2');

         $articles = Article::paginate(20);

        $search = $request->input('search');

        $query = Article::query();
        
        if ($search) {
            $spaceConversion = mb_convert_kana($search, 's');
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            foreach($wordArraySearched as $value) {
                $query->where('title', 'like', '%'.$value.'%');
            }
            $articles = $query->paginate(20);
        }

        return view('articles.index')
            ->with([
                'articles' => $articles,
                'search' => $search,
            ]);
        }

    public function industryFilter(Request $request){
        $industry = $request->input('industry');

        if ($industry === 'all') {
            // カテゴリが「全て」の場合はすべてのアイテムを取得
            $articles = Article::all();
        } else {
            // 指定されたカテゴリで絞り込み
            $articles = Article::where('industry', $industry)->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function periodFilter(Request $request){
        $period = $request->input('period');

        if ($period === 'all') {
            // カテゴリが「全て」の場合はすべてのアイテムを取得
            $articles = Article::all();
        } else {
            // 指定されたカテゴリで絞り込み
            $articles = Article::where('period', $period)->get();
        }

        return view('articles.index', compact('articles'));
    }

    public function selectionFilter(Request $request){
        $selection = $request->input('selection_value'); // ボタンのvalueを取得
    
        if ($selection === 'all') {
            // カテゴリが「全て」の場合はすべてのアイテムを取得
            $articles = Article::all();
        } else {
            // 指定されたカテゴリで絞り込み
            $articles = Article::where('selection', $selection)->get();
        }
    
        return view('articles.index', compact('articles'));
    }

}
