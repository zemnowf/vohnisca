@extends('layouts.app')

@section('title', 'Campaigns')

@section('content')

    @isset($campaigns)
        @include('campaigns.partials.campaigns-grid', ['campaigns' => $campaigns])
    @endisset

@endsection
