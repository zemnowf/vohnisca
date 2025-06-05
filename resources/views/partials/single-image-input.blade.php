@isset($field)
    <div class="form-group">
        <label for="{{ $field }}">
            @isset($label)
                {{ $label }}
            @endisset
        </label>
        <div class="file-upload-wrapper">
            <input id="{{ $field }}-input" type="file"
                   class="file-upload-input @error($field) is-invalid @enderror"
                   name="{{ $field }}" accept="image/*">
            <label for="{{ $field }}" class="file-upload-label">
                <i class="fas fa-cloud-upload-alt"></i>
                @isset($placeholder)
                    {{ $placeholder }}
                @endisset
            </label>
            <div class="file-upload-preview" id="{{ $field }}-preview">
            </div>
        </div>

        @error($field)
        <span class="form-error" role="alert">
                        <i class="fas fa-exclamation-circle"></i> {{ $message }}
                    </span>
        @enderror
    </div>
@endisset
