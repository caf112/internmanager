@extends('layouts.app')
@section('head')
<a href="/articles" class="site-title">企業一覧</a>
@endsection()
@section('content')
<form method="GET" action="{{ route('articles.search') }}">
    <input type="search" placeholder="企業名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('articles.index') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>
<input type="button" onclick="location.href='/programs'" value="スケジュール">
<p><a href="{{ route('articles.create') }}">記録を書く</a></p>
        @foreach ($articles as $article)
        <article class="article-item">
            <div class="article-title">
            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>   
            </div>
            <div class="article-date">{{ $article->date }}</div>
        </article>
        @endforeach
@endsection()