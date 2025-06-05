@extends('layouts.app')

@section('title', 'Create New Campaign')

@section('content')
    <div class="campaign-create-container">
        <div class="campaign-create-card">
            <div class="campaign-create-header">
                <h2>Create New Campaign</h2>
                <p>Fill out the form below to launch your new campaign</p>
            </div>

            <form method="POST" action="{{ route('campaigns.store') }}" enctype="multipart/form-data"
                  class="campaign-create-form">
                @csrf

                @include('partials.string-input',
                    ['label' => 'Campaign Title',
                    'field' => 'title',
                    'placeholder' => 'Enter campaign title',
                    'required' => 'true'
                    ])

                @include('partials.textarea-input',
                    ['label' => 'Short Description',
                    'field' => 'short_description',
                    'placeholder' => 'Brief summary of your campaign',
                    'rows' => 3,
                    ])

                @include('partials.textarea-input',
                    ['label' => 'Full Description',
                    'field' => 'description',
                    'placeholder' => 'Detailed description of your campaign',
                    'rows' => 6
                    ])

                @include('partials.single-image-input',
                    ['label' => 'Preview Image',
                    'field' => 'preview_image',
                    'placeholder' => 'Choose an image file'
                    ])

                <div class="form-actions">
                    <button type="submit" class="campaign-submit-btn">
                        Create Campaign
                    </button>
                    <a href="{{ route('campaigns.index') }}" class="campaign-cancel-btn">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
