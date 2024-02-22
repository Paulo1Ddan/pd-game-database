<div class="gd-textarea-field flex-column fs-4 text-white my-3">
    <label for="{{ $name }}" class="textarea-label">{{ $label }}</label>
    <textarea name="{{ $name }}" class="px-2 py-1" id="{{ $name }}" cols="30" rows="10"
        placeholder="{{ $placeholder }}" value="{{ $value }}"></textarea>

    @if ($errors)
        <label class="gd-label-error">{{ $errors }}</label>
    @endif
</div>