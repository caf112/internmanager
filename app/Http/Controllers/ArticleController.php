<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $sort = Article::orderBy('date', 'asc')->get();
        $data = ['articles' => $sort];
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
        $article->body = $request->body;
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
}
