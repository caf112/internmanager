@extends('layouts.app')
@include('commons.errors')
@section('head')
    <a href="/articles" class="site-title">記録入力</a>
@endsection()
@section('content')
<form action="{{ route('articles.store') }}" method="post">
           @include('articles.form')
            <button type="submit">記録する</button>
            <a href="{{ route('articles.index') }}">キャンセル</a>
        </form>
@endsection()