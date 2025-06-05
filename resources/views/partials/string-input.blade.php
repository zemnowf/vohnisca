<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <input id="{{ $field }}" type="text" class="form-input @error('title') is-invalid @enderror"
           name="{{ $field }}" value="{{ old($field) }}" @isset($required) required @endisset  autofocus
           @isset($placeholder) placeholder="{{ $placeholder }} @endisset">
    @error($field)
    <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
    @enderror
</div>
