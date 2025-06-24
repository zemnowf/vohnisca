@extends('layouts.app')

@section('title', 'Create New Campaign')

@section('content')
<div id="campaign-form">
    <campaign-form
        cancel-url="{{ route('campaigns.index') }}"
    ></campaign-form>
</div>
@endsection
