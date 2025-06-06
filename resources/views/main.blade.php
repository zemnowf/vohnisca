@extends('layouts.app')

@section('title', 'Vohnisca')

@section('content')
    <campaign-grid-no-pag-component
        :guest="{{ json_encode(auth()->guest()) }}"
        :elements-per-page="2"
    ></campaign-grid-no-pag-component>
@endsection
