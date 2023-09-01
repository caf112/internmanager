@extends('layouts.app')
@section('head')
    <a href="/articles" class="site-title">活動内容</a>
@endsection()
@section('content')
<article class="article-detail">
    <h1 class="article-title">{{ $article->title }}</h1>
    <h1 class="article-date">{{ $article->date }}</h1>
    <div class="article-info">{{ $article->created_at }}</div>
    <div class="article-content">{!! nl2br(e($article->content)) !!}</div>
    <div class="article-body">{!! nl2br(e($article->body)) !!}</div>
    <div class="article-evaluation">{!! nl2br(e($article->evaluation)) !!}</div>
    <div class="article-control">
        <a href="{{ route('articles.edit', $article) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('articles.destroy', $article) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</article>
@endsection