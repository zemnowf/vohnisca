@extends('layouts.app')

@section('title', 'Campaigns')

@section('content')
    @auth
        @include('campaigns.partials.start-new-campaign')
    @endauth
    <campaign-grid-component :guest={{ json_encode(auth()->guest()) }}></campaign-grid-component>
@endsection
