@extends('layouts.app')

@section('title', 'Campaigns')

@section('content')
    @auth
        @include('campaigns.partials.start-new-campaign')
    @endauth
    @isset($campaigns)
        @include('campaigns.partials.campaigns-grid', ['campaigns' => $campaigns])
    @endisset

@endsection
