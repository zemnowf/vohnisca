@isset($field)
    <div class="form-group">
        @isset($label)
            <label for="{{ $field }}">{{ $label }}</label>
        @endisset
        <textarea id="{{ $field  }}" class="form-input @error($field) is-invalid @enderror"
                  name="{{ $field }}"
                  @isset($rows) rows="{{ $rows }}" @endisset
                  @isset($required) required @endisset
                  @isset($placeholder) placeholder="{{ $placeholder }} @endisset">
            {{ old($field) }}
        </textarea>

        @error($field)
        <span class="form-error" role="alert">
    <i class="fas fa-exclamation-circle"></i> {{ $message }}
</span>
        @enderror
    </div>
@endisset
