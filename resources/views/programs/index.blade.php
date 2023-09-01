@extends('layouts.app')
@section('head')
<a href="/programs" class="site-title">予定一覧</a>
@endsection()
@section('content')
<input type="button" onclick="location.href='/articles'" value="完了済み">
<p><a href="{{ route('programs.create') }}">予定を入れる</a></p>
        @foreach ($program as $program)
        <program class="program-item">
            <div class="program-title">
            <a href="{{ route('programs.show', $program) }}">{{ $program->title }}</a>   
            </div>
            <div class="program-date">{{ $program->date }}</div>
            <div class="program-time">{{ $program->time }}</div>
            <!--<div class="program-info">{{ $program->created_at }}</div>-->
        </program>
        @endforeach
@endsection()