@extends('layouts.app')
@include('commons.errors')
@section('head')
    <h1><a href="/programs" class='app-title'>Intern Manager</a></h1>
    <a href="/programs" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
<form action="{{ route('programs.store') }}" method="post">
    @include('programs.form')
    <button type="submit">記録する</button>
    <a href="{{ route('programs.index') }}">キャンセル</a>
</form>
@endsection()