<div class="main-campaign-info">
    <div class="main-campaign-text">
        <h3>{{ $campaign->title }}</h3>
        <img src="{{ asset($campaign->preview_image) }}" alt="{{ $campaign->title }}">
        <p>{{ $campaign->short_description }}</p>
        {{ $campaign->description }}
    </div>
    <div class="campaign-info-actions">
        <div class="campaign-link">
            @guest()
                <a href="/login">Start campaign</a>
            @else
                <a href="#">Start campaign</a>
            @endguest
        </div>
        <div class="campaign-link">
            <a href=" {{ route('campaigns.show', $campaign->id) }}">Learn more</a>
        </div>
    </div>
</div>
