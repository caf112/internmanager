@extends('layouts.app')
@section('head')
    <h1 class='app-title'>Intern Manager</h1>
    <a href="/articles" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
<program class="program-detail">
    <h1 class="program-title">{{ $program->title }}</h1>
    <dev class="program-date">{{ $program->date }}</dev>
    <div class="program-time">{{ $program->time }}</dev>
    <div class="program-info">作成日{{ $program->created_at }}</div>
    <div class="program-content">{!! nl2br(e($program->content)) !!}</div>
    <div class="program-control">
        <a href="{{ route('programs.edit', $program) }}">編集</a>
        <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('programs.destroy', $program) }}" method="post">
            @csrf 
            @method('delete')
            <button type="submit">削除</button>
        </form>
    </div>
</program>
@endsection