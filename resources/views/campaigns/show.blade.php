@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
    <campaign-element :campaign-id={{ $campaign->id }}></campaign-element>
@endsection
