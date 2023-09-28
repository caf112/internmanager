@extends('layouts.app')
@section('head')
    <h1><a href = "/articles"class='app-title'>Intern Manager</a></h1>
    <a href="/articles" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <h1 class="article-date">{{ $article->date }}</h1>
    <div class="article-info">作成日{{ $article->created_at }}</div>
    <div class="article-period">{!! nl2br(e($article->period)) !!}</div>
    <div class="article-selection">{!! nl2br(e($article->selection)) !!}</div>
    <div class="article-industry">{!! nl2br(e($article->industry)) !!}</div>
    <div class="article-explanation">{!! nl2br(e($article->explanation)) !!}</div>
    <div class="article-content">{!! nl2br(e($article->content)) !!}</div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    <div class="article-evaluation">{!! nl2br(e($article->evaluation)) !!}</div>
    <div class="article-control">
        <form method="GET" action="{{ route('articles.edit', $article) }}">
            @csrf
            <button type="submit">編集</button>
        </form>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</article>
@endsection

@section('aside')

@php
use App\Models\Article;

$articles = Article::orderBy('date', 'asc')->get(); 
$data = ['articles' => $articles]; 
@endphp

@foreach ($articles as $article)
    <div class="contents-body">
    <article class="program-item">
        <div class="program-title">
        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>   
        </div>
        <div class="program-date">{{ $article->date }}</div>
    </article>
    </div>
    @endforeach

@endsection