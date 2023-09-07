@extends('layouts.app')
@section('head')

<h1 class='app-title'>Intern Manager</h1>
<a href="/articles" class="site-title">企業一覧</a>
@endsection()

@section('aside')<!--サイドバー-->


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
<form action="{{ route('industryFilter') }}" method="POST">
    @csrf
    <select name="industry" id="industryFilter">
        <option value="all">全て</option>
        <option value="農林・水産">農林・水産</option>
                <option value="林業">林業</option>
                <option value="漁業">漁業</option>
                <option value="鉱業">鉱業</option>
                <option value="建設業">建設業</option>
                <option value="建築業">建築業</option>
                <option value="製造業">製造業</option>
                <option value="電気・ガス">電気・ガス</option>
                <option value="卸売・小売・飲食業">卸売・小売・飲食業</option>
                <option value="金融・保険業">金融・保険業</option>
                <option value="不動産業">不動産業</option>
                <option value="サービス業">サービス業</option>
                <option value="分類不能産業">分類不能産業</option>
    </select>
    <button type="submit">絞り込み</button>
</form>
<form action="{{ route('periodFilter') }}" method="POST">
    @csrf
    <select name="period" id="periodFilter">
        <option value="all">全て</option>
        <option value="1DAY">1DAY</option>
                <option value="1週間未満">1週間未満</option>
                <option value="短期">短期</option>
                <option value="長期">長期</option>
    </select>
    <button type="submit">絞り込み</button>
</form>
<a href="{{ route('selectionFilter', ['selection' => 'all']) }}">全て</a>
<a href="{{ route('selectionFilter', ['selection' => '選考なし']) }}">選考なし</a>
<a href="{{ route('selectionFilter', ['selection' => '選考あり']) }}">選考あり</a>
<a href="{{ route('selectionFilter', ['selection' => '選考落ち']) }}">選考落ち</a>
@endsection()
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