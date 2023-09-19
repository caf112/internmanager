@extends('layouts.app')
@section('head')
    <h1><a herf="/programs" class='app-title'>Intern Manager</a></h1>
    <a href="/articles" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
@include('commons.errors')
<form action="{{ route('programs.update', $program) }}" method="post">
    @method('patch')
    @include('programs.form')
    <button type="submit">更新する</button>
    <a href="{{ route('programs.show', $program) }}">キャンセル</a>
</form>
@endsection()