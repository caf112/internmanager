@extends('layouts.app')
@section('head')

<h1 class='app-title'>Intern Manager</h1>

@endsection()

@section('aside')<!--サイドバーーーーーーーーーーーーーーーー-->

<!--新規作成ボタン-->

<a href="{{ route('articles.create') }}">
<button class="create-button" >
  <span>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg> New Data
  </span>
</button>
</a>
<br>
<a href="/programs" class="intern-index">参加予定インターン</a>
<br>
<a href="/articles" class="intern-index">参加済みインターン</a>

 <!--検索欄-->

 <form method="GET" action="{{ route('articles.search') }}">
   <!--<input type="search" placeholder="企業名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">-->
    <div class="group">
     <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
     <input type="search" placeholder="企業名を入力" class="serch-input" name="search" value="@if (isset($search)) {{ $search }} @endif">
    </div>

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

    <p>業種別に検索</p>
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
    <button type="submit" class="filter-button">絞り込み</button>
</form>
<form action="{{ route('periodFilter') }}" method="POST">
    @csrf

    <p>期間別に検索</p>
    <select name="period" id="periodFilter">
        <option value="all">全て</option>
        <option value="P1">1Day</option>
                <option value="P2">1週間未満</option>
                <option value="P3">短期</option>
                <option value="P4">長期</option>
    </select>
    <button type="submit" class="filter-button">絞り込み</button>
</form>
<a href="{{ route('selectionFilter', ['selection' => 'all']) }}">全て</a>
<a href="{{ route('selectionFilter', ['selection' => 'S1']) }}">選考なし</a>
<a href="{{ route('selectionFilter', ['selection' => 'S2']) }}">選考あり</a>
<a href="{{ route('selectionFilter', ['selection' => 'S3']) }}">選考落ち</a>







@endsection<!--サイドバーここまでーーーーーーーーーーーーーーーー-->




@section('content')<!--一覧ーーーーーーーーーーーーーーーーーーー-->
<h2>参加予定インターン一覧</h2>
        @foreach ($programs as $program)
        <program class="program-item">
            <div class="program-title">
            <a href="{{ route('programs.show', $program) }}">{{ $program->title }}</a>   
            </div>
            <div class="program-date">{{ $program->date }}</div>
            <div class="program-time">{{ $program->time }}</div>
        </program>
        @endforeach

        
@endsection()<!--一覧ここまでーーーーーーーーーーーーーーーーーーー-->

