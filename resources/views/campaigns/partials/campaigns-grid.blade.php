<div class="main-campaigns container">
    @isset($campaigns)
        @foreach($campaigns as $campaign)
            @include('campaigns.partials.campaign-card', ['campaign' => $campaign])
        @endforeach
    @endisset
</div>

@if($pagination && $campaigns->hasPages())
    {{ $campaigns->links('layouts.pagination.default-pagination') }}
@endif
