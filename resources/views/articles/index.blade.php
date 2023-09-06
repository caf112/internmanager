@extends('layouts.app')
@section('head')

<h1 class='app-title'>Intern Manager</h1>
<a href="/articles" class="site-title">企業一覧</a>
@endsection()

@section('aside')<!--サイドバー-->

あいうえお
@endsection

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
        <article class="program-item">
            <div class="program-title">
            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>   
            </div>
            <div class="program-date">{{ $article->date }}</div>
        </article>
        @endforeach
        @if (count($articles) === 0)
            <p>No results found for "{{ $search }}"</p>
        @endif
@endsection()