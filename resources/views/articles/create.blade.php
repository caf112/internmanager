@extends('layouts.app')
@include('commons.errors')
@section('head')
    <h1><a herf="/articles" class='app-title'>Intern Manager</a></h1>
    <a href="/articles" class="site-title">トップへ戻る</a>
@endsection()
@section('content')
<form action="{{ route('articles.store') }}" method="post">
    @include('articles.form')
    <button type="submit">記録する</button>
    <a href="{{ route('articles.index') }}">キャンセル</a>
</form>
@endsection()