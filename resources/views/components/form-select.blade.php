@props(['name', 'label', 'required' => false, 'options'])

<div class="form-group">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span style="color:red;cursor:pointer" title="Ce champ est obligatoire">*</span>
        @endif
    </label>
    <select class="form-control" id="{{ $name }}" name="{{ $name }}" required="{{ $required }}">
        @foreach($options as $option)
            <option value="{{ $option->value }}">{{ $option->label }}</option>
        @endforeach
    </select>
</div>
