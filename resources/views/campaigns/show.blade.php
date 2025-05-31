@extends('layouts.app')

@section('title', $campaign->title)

@section('content')
    <div class="campaign-detail">
        <div class="campaign-hero">
            @if($campaign->preview_image)
                <div class="campaign-hero-image">
                    <img src="{{ asset($campaign->preview_image) }}" alt="{{ $campaign->title }}" class="hero-img">
                    <div class="hero-overlay"></div>
                </div>
            @endif

            <div class="campaign-hero-content">
                <div class="container">
                    @isset( $campaign->created_at)
                    <div class="campaign-meta-badge">
                        <span class="meta-date">{{ $campaign->created_at->format('d M Y') }}</span>
                    </div>
                    @endisset
                    <h1 class="campaign-title">{{ $campaign->title }}</h1>

                    @if($campaign->short_description)
                        <div class="campaign-excerpt">
                            {{ $campaign->short_description }}
                        </div>
                    @endif

                    <div class="campaign-actions">
                        @guest
                            <a href="/login" class="campaign-btn primary">Start Campaign</a>
                        @else
                            <a href="#" class="campaign-btn primary">Start Campaign</a>
                        @endguest
                        <a href="/campaigns" class="campaign-btn outline">Back to Campaigns</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="campaign-main container">
            <article class="campaign-content">
                {!! $campaign->description !!}
            </article>

            <aside class="campaign-sidebar">
                <div class="sidebar-card">
                    <h3 class="sidebar-title">Campaign Details</h3>
                    <ul class="sidebar-meta">
                        @isset( $campaign->created_at )
                        <li>
                            <i class="fas fa-calendar-alt"></i>
                            <span>Created: {{ $campaign->created_at->format('d M Y') }}</span>
                        </li>
                        @endisset
                        @isset( $campaign->updated_at )
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Last updated: {{ $campaign->updated_at->format('d M Y') }}</span>
                        </li>
                        @endisset
                    </ul>
                </div>

                <div class="sidebar-card">
                    <h3 class="sidebar-title">Share This Campaign</h3>
                    <div class="social-share">
                        <a href="#" class="social-link"><i class="fas fa-link"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
