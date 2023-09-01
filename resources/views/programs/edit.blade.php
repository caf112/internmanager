@extends('layouts.app')
@section('content')
@include('commons.errors')
<form action="{{ route('programs.update', $program) }}" method="post">
    @method('patch')
    @include('programs.form')
    <button type="submit">更新する</button>
    <a href="{{ route('programs.show', $program) }}">キャンセル</a>
</form>
@endsection()