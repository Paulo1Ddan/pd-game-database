<div class="gd-input-field flex-column fs-4 text-white my-3">
    <label for="{{ $name }}" class="input-text">{{ $label }}</label>
    @if($input_type === 'file')
        <input type="{{ $input_type }}" id="{{ $name }}" class='px-2' name="{{ $name }}" accept="{{ $accept }}">
    @else
        <input type="{{ $input_type }}" id="{{ $name }}" class='px-2' placeholder="{{ $placeholder }}" name="{{ $name }}" value="{{ $value }}" {{ isset($autofocus) ? 'autofocus' : '' }}>
    @endif

    @if ($errors)
        <label class="gd-label-error">{{ $errors }}</label>
    @endif
</div>