@extends('layouts.app')
@section('head')

<h1 class='app-title'>Intern Manager</h1>
<a href="/programs" class="site-title">予定一覧</a>
@endsection()
@section('content')
<form method="GET" action="{{ route('programs.search') }}">
    <input type="search" placeholder="企業名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('programs.index') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>
<input type="button" onclick="location.href='/articles'" value="完了済み">
<p><a href="{{ route('programs.create') }}">予定を書く</a></p>
        @foreach ($programs as $program)
        <program class="program-item">
            <div class="program-title">
            <a href="{{ route('programs.show', $program) }}">{{ $program->title }}</a>   
            </div>
            <div class="program-date">{{ $program->date }}</div>
            <div class="program-time">{{ $program->time }}</div>
        </program>
        @endforeach
@endsection()