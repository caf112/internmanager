@extends('layouts.app')
@include('commons.errors')
@section('head')
    <a href="/programs" class="site-title">記録入力</a>
@endsection()
@section('content')
<form action="{{ route('programs.store') }}" method="post">
           @include('programs.form')
            <button type="submit">記録する</button>
            <a href="{{ route('programs.index') }}">キャンセル</a>
        </form>
@endsection()