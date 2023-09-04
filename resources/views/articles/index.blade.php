@extends('layouts.app')
@section('head')
<a href="/articles" class="site-title">企業一覧</a>
@endsection()
@section('content')
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