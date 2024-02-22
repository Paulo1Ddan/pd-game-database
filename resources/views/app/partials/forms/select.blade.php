<div class="gd-select-field flex-column fs-4 text-white my-3">
    <label for="{{ $name }}" class="select-label">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="px-2">
        <option class="option" value="">Selecione</option>
        @foreach ($options as $option)
            <option class="option" value="{{ $option->id }}" {{ $selected == $option->id ? 'selected' : '' }}>
                 {{ $option->$name_type }} {{ (isset($option->description)) ? ' - '.$option->description : '' }}
            </option>
        @endforeach
    </select>
    @if ($errors)
        <label class="gd-label-error">{{ $errors }}</label>
    @endif
</div>