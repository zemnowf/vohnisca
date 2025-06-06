@extends('layouts.app')

@section('title', 'Vohnisca')

@section('content')
    <campaign-grid-component
        :guest={{ json_encode(auth()->guest()) }}
    ></campaign-grid-component>
@endsection
