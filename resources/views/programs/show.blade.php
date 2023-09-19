@extends('layouts.app')
@section('head')
    <h1><a href="/programs" class='app-title'>Intern Manager</a></h1>
    <a href="/programs" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
<program class="program-detail">
    <h1 class="program-title">{{ $program->title }}</h1>
    <dev class="program-date">{{ $program->date }}</dev>
    <div class="program-time">{{ $program->time }}</dev>
    <div class="program-info">作成日{{ $program->created_at }}</div>
    <div class="program-period">{!! nl2br(e($program->period)) !!}</div>
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

@section('aside')

@php
use App\Models\Program;

$programs = Program::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
$data = ['programs' => $programs];
@endphp

@foreach ($programs as $program)
    <div class="contents-body">
    <program class="program-item">
        <div class="program-title">
        <a href="{{ route('programs.show', $program) }}">{{ $program->title }}</a>   
        </div>
        <div class="program-date">{{ $program->date }}</div>
    </program>
    </div>
    @endforeach

@endsection